# Pattern CSS/JS Splitting Plan - Automated Approach

## Overview

**Status:** Planning Phase (To be implemented after Bootstrap splitting)

Automatically split PatternLab pattern CSS and JavaScript into separate files that are conditionally loaded based on which patterns are used on a page. This is achieved through:

1. **Patterns have their own CSS/JS** - Each pattern (atoms, molecules, organisms) gets extracted
2. **Webpack automatically extracts** pattern assets into separate CSS and JS files
3. **Webpack plugin generates manifest** mapping patterns → nested patterns → templates → PHP files
4. **PHP dynamically loads** only required pattern CSS and JS based on page content

**Zero manual maintenance required** - the system analyzes your templates and handles everything automatically.

### What This Plan Covers
- ⏳ Pattern CSS splitting and conditional loading
- ⏳ Pattern JavaScript splitting and conditional loading
- ⏳ Webpack configuration for pattern extraction
- ⏳ PHP loader for dynamic pattern asset enqueuing
- ⏳ Manifest generation for pattern dependency tracking

### Implementation Status
- ⏳ **Pattern CSS:** Planning phase
- ⏳ **Pattern JavaScript:** Planning phase
- ⏳ **PHP Dynamic Loader:** Planning phase
- ⏳ **Webpack Manifest:** Planning phase

---

## Current Implementation Analysis

### File Structure
```
src/patternlab/source/_patterns/
├── 00-protons/              # Variables, mixins, base styles (STAYS IN DREAM.CSS)
│   ├── non-printing/        # Variables, functions, mixins
│   └── printing/            # Critical base styles
├── 01-atoms/                # ~19 atomic patterns (SPLIT)
├── 02-molecules/            # ~20 molecular patterns (SPLIT)
├── 03-organisms/            # ~4 organism patterns (SPLIT)
├── 04-templates/            # Page templates (SPLIT)
└── 05-pages/                # Page examples (SPLIT)
```

### Current Build Chain
```
webpack entry: dream → index.js
  └── require.context imports all pattern index.js files automatically
      └── Each pattern imports its own SCSS
          └── All bundled into dream.css (~300-500KB)
```

**Current Output:**
- **dream.css:** 300-500KB (all patterns included)
- **dream.bundle.js:** All pattern JS bundled together
- All pattern assets loaded on every page globally
- No conditional loading
- ~80% unused CSS/JS on most pages

---

## Proposed Solution: Automated Pattern Splitting

### Key Concepts

#### 1. **Patterns Import Their Own Styles**
Patterns already import their SCSS - we just need to extract them:

```js
// 02-molecules/card/index.js (already exists)
import './_card.scss';           // Pattern's own styles
import '../../00-protons/printing/libs/bootstrap-components/card.scss'; // Bootstrap

// Module logic...
```

#### 2. **Webpack Extraction**
Webpack's `splitChunks` extracts pattern assets:
- Pattern SCSS → `pattern-card.css`
- Pattern JS → `pattern-card.bundle.js`
- Both extracted automatically from imports

#### 3. **Manifest Generation**
Webpack plugin analyzes templates and creates a manifest:

```json
{
  "version": 1234567890,
  "patterns": {
    "atoms/button": [],
    "molecules/card": ["atoms/button"],
    "organisms/header": ["molecules/nav", "atoms/button"]
  },
  "templates": {
    "page.twig": ["organisms/header", "organisms/footer"],
    "single.twig": ["organisms/header", "molecules/card"]
  },
  "php": {
    "index.php": ["page.twig"],
    "single.php": ["single.twig", "partials/content.twig"]
  }
}
```

#### 4. **PHP Dynamic Loading**
On page load, PHP:
1. Detects current template being rendered
2. Looks up which patterns that template uses
3. Recursively loads pattern dependencies
4. Enqueues only required CSS/JS

---

## Implementation Phases

### Phase 1: Webpack Configuration Updates

**Goal:** Configure webpack to extract pattern assets separately

#### Step 1.1: Update webpack.config.js - Add Pattern SplitChunks

**File:** `webpack.config.js`

Add pattern extraction configuration:

```js
// webpack.config.js

optimization: {
  splitChunks: {
    cacheGroups: {
      // Existing Bootstrap config...

      // Pattern CSS/JS extraction
      patternStyles: {
        test: /[\\/]src[\\/]patternlab[\\/]source[\\/]_patterns[\\/](01-atoms|02-molecules|03-organisms|04-templates|05-pages)[\\/]/,
        name(module) {
          // Extract pattern name from path
          // src/patternlab/source/_patterns/02-molecules/card/_card.scss
          // → pattern-card

          const match = module.resource.match(/_patterns[\\/](\d+-\w+)[\\/]([^/]+)[\\/]/);
          if (match) {
            const [, type, pattern] = match;
            // Exclude _demo.scss files
            if (module.resource.includes('_demo.scss')) {
              return false;
            }
            return `pattern-${pattern}`;
          }
          return false;
        },
        chunks: 'all',
        enforce: true,
        priority: 20 // Higher than Bootstrap (10)
      }
    }
  }
}
```

**Key Points:**
- ✅ Only extracts from atoms/molecules/organisms/templates/pages
- ✅ Excludes `00-protons` (stays in dream.css)
- ✅ Excludes `_demo.scss` (PatternLab only)
- ✅ Higher priority than Bootstrap splitting
- ✅ Pattern name extracted from folder name

#### Step 1.2: Ensure Protons Stay in Main Bundle

**File:** `src/patternlab/source/_patterns/00-protons/index.js`

Verify protons are imported in main bundle:

```js
// 00-protons/index.js

// This ensures all proton styles stay in dream.css
import './printing/libs/_all.scss';
import './printing/libs/_bootstrap-critical.scss';

// Variables/mixins available via webpack additionalData (already configured)
```

**File:** `webpack.config.js` - Verify additionalData

```js
// webpack.config.js - sass-loader configuration

{
  loader: 'sass-loader',
  options: {
    additionalData: `
      @import "~bootstrap/scss/functions";
      @import "~bootstrap/scss/variables";
      @import "~bootstrap/scss/mixins";
      @import "./src/patternlab/source/_patterns/00-protons/non-printing/libs/_bootstrap.scss";
    `,
    sassOptions: {
      includePaths: [
        path.resolve(__dirname, 'src/patternlab/source/_patterns/00-protons/non-printing'),
      ]
    }
  }
}
```

**CRITICAL:** This ensures all patterns can access proton variables/mixins without importing them.

#### Step 1.3: Test Build

```bash
npm run build
```

**Expected Output:**
```
dist/wp/css/
├── dream.css                    # Main bundle (protons + critical)
├── bootstrap-*.css              # Bootstrap components (existing)
├── pattern-button.css           # NEW: Atom pattern
├── pattern-card.css             # NEW: Molecule pattern
├── pattern-header.css           # NEW: Organism pattern
└── ...

dist/wp/js/
├── dream.bundle.js              # Main bundle
├── bootstrap-*.bundle.js        # Bootstrap components (existing)
├── pattern-button.bundle.js     # NEW: Atom pattern JS
├── pattern-card.bundle.js       # NEW: Molecule pattern JS
└── ...
```

---

### Phase 2: Webpack Pattern Manifest Plugin

**Goal:** Create plugin to scan templates and build pattern dependency manifest

#### Step 2.1: Create Pattern Manifest Plugin

**File:** `webpack-plugins/PatternManifestPlugin.js` (new file)

```js
/**
 * Pattern Manifest Plugin
 *
 * Scans Twig templates and PHP files to build a manifest of:
 * - Which patterns depend on other patterns
 * - Which templates use which patterns
 * - Which PHP files render which templates
 *
 * Similar to BootstrapManifestPlugin but for PatternLab patterns
 */

const fs = require('fs');
const path = require('path');
const glob = require('glob');

class PatternManifestPlugin {
  constructor(options = {}) {
    this.options = {
      outputPath: options.outputPath || 'dist/wp/pattern-manifest.json',
      patternsPath: options.patternsPath || 'src/patternlab/source/_patterns',
      templatesPath: options.templatesPath || 'src/templates',
      phpPaths: options.phpPaths || [
        '*.php',                    // Theme root
        'src/functions/**/*.php',   // Functions
        'src/templates/**/*.php'    // Template PHP files
      ],
      verbose: options.verbose || false
    };

    this.manifest = {
      version: Date.now(),
      patterns: {},      // pattern -> [dependencies]
      templates: {},     // template.twig -> [patterns]
      php: {},          // file.php -> [templates]
      components: {}    // For future use (blocks, etc.)
    };
  }

  apply(compiler) {
    compiler.hooks.emit.tapAsync('PatternManifestPlugin', (compilation, callback) => {
      if (this.options.verbose) {
        console.log('\n🔍 Scanning patterns and templates...\n');
      }

      try {
        // Step 1: Scan pattern files for dependencies
        this.scanPatterns();

        // Step 2: Scan Twig templates for pattern usage
        this.scanTemplates();

        // Step 3: Scan PHP files for template rendering
        this.scanPhpFiles();

        // Step 4: Write manifest
        const manifestJson = JSON.stringify(this.manifest, null, 2);

        compilation.assets[this.options.outputPath] = {
          source: () => manifestJson,
          size: () => manifestJson.length
        };

        if (this.options.verbose) {
          console.log(`✅ Pattern manifest generated: ${this.options.outputPath}`);
          console.log(`   Patterns: ${Object.keys(this.manifest.patterns).length}`);
          console.log(`   Templates: ${Object.keys(this.manifest.templates).length}`);
          console.log(`   PHP Files: ${Object.keys(this.manifest.php).length}\n`);
        }

        callback();
      } catch (error) {
        console.error('❌ Pattern manifest generation failed:', error);
        callback(error);
      }
    });
  }

  /**
   * Scan pattern files to find dependencies on other patterns
   */
  scanPatterns() {
    const patternDirs = [
      '01-atoms',
      '02-molecules',
      '03-organisms',
      '04-templates',
      '05-pages'
    ];

    patternDirs.forEach(dir => {
      const dirPath = path.join(this.options.patternsPath, dir);
      if (!fs.existsSync(dirPath)) return;

      const patterns = fs.readdirSync(dirPath).filter(item => {
        const itemPath = path.join(dirPath, item);
        return fs.statSync(itemPath).isDirectory();
      });

      patterns.forEach(pattern => {
        const patternKey = `${dir.replace(/^\d+-/, '')}/${pattern}`;
        const twigFile = path.join(dirPath, pattern, `_${pattern}.tpl.twig`);

        if (fs.existsSync(twigFile)) {
          const dependencies = this.extractPatternDependencies(twigFile);
          this.manifest.patterns[patternKey] = dependencies;

          if (this.options.verbose && dependencies.length > 0) {
            console.log(`   ${patternKey} → [${dependencies.join(', ')}]`);
          }
        }
      });
    });
  }

  /**
   * Extract pattern dependencies from a Twig file
   */
  extractPatternDependencies(filePath) {
    const content = fs.readFileSync(filePath, 'utf8');
    const dependencies = new Set();

    // Match: {% include '@atoms/button' %}
    // Match: {% embed '@molecules/card' %}
    // Match: {% extends '@templates/base' %}
    const includeRegex = /{%\s*(?:include|embed|extends)\s+['"]@(\w+)\/([^'"]+)['"]/g;

    let match;
    while ((match = includeRegex.exec(content)) !== null) {
      const [, namespace, patternPath] = match;

      // Extract pattern name (remove .twig, _prefix, etc.)
      const patternName = patternPath
        .replace(/\/_[^/]+\.twig$/, '')  // Remove /_pattern.tpl.twig
        .replace(/\.twig$/, '')           // Remove .twig
        .replace(/^_/, '')                // Remove leading underscore
        .split('/').pop();                // Get last part

      const dependencyKey = `${namespace}/${patternName}`;
      dependencies.add(dependencyKey);
    }

    return Array.from(dependencies).sort();
  }

  /**
   * Scan Twig template files to find pattern usage
   */
  scanTemplates() {
    const templateFiles = glob.sync(`${this.options.templatesPath}/**/*.twig`);

    templateFiles.forEach(templateFile => {
      const relativePath = path.relative(this.options.templatesPath, templateFile);
      const patterns = this.extractPatternDependencies(templateFile);

      if (patterns.length > 0) {
        this.manifest.templates[relativePath] = patterns;

        if (this.options.verbose) {
          console.log(`   ${relativePath} → [${patterns.join(', ')}]`);
        }
      }
    });
  }

  /**
   * Scan PHP files for Timber template rendering
   */
  scanPhpFiles() {
    this.options.phpPaths.forEach(pattern => {
      const phpFiles = glob.sync(pattern);

      phpFiles.forEach(phpFile => {
        const content = fs.readFileSync(phpFile, 'utf8');
        const templates = this.extractTimberTemplates(content);

        if (templates.length > 0) {
          const relativePath = path.relative(process.cwd(), phpFile);
          this.manifest.php[relativePath] = templates;

          if (this.options.verbose) {
            console.log(`   ${relativePath} → [${templates.join(', ')}]`);
          }
        }
      });
    });
  }

  /**
   * Extract Timber template calls from PHP content
   */
  extractTimberTemplates(content) {
    const templates = new Set();

    // Match various Timber rendering methods:
    // Timber::render('template.twig')
    // Timber::compile('template.twig')
    // Timber::fetch('template.twig')
    // Timber::compile_string($template)
    // $timber->render(['page.twig', 'index.twig'])

    const patterns = [
      /Timber::(?:render|compile|fetch)\s*\(\s*['"]([^'"]+\.twig)['"]/g,
      /Timber::(?:render|compile|fetch)\s*\(\s*\[([^\]]+)\]/g,
      /\$timber->(?:render|compile|fetch)\s*\(\s*['"]([^'"]+\.twig)['"]/g
    ];

    patterns.forEach(regex => {
      let match;
      while ((match = regex.exec(content)) !== null) {
        if (match[1].includes('[')) {
          // Array of templates
          const arrayContent = match[1];
          const templateMatches = arrayContent.matchAll(/['"]([^'"]+\.twig)['"]/g);
          for (const tmpl of templateMatches) {
            templates.add(tmpl[1]);
          }
        } else {
          templates.add(match[1]);
        }
      }
    });

    return Array.from(templates).sort();
  }
}

module.exports = PatternManifestPlugin;
```

#### Step 2.2: Register Plugin in webpack.config.js

**File:** `webpack.config.js`

```js
const PatternManifestPlugin = require('./webpack-plugins/PatternManifestPlugin');

module.exports = {
  // ... existing config

  plugins: [
    // ... existing plugins

    // Bootstrap manifest (existing)
    new BootstrapManifestPlugin({
      outputPath: 'dist/wp/bootstrap-manifest.json',
      verbose: true
    }),

    // Pattern manifest (NEW)
    new PatternManifestPlugin({
      outputPath: 'dist/wp/pattern-manifest.json',
      patternsPath: 'src/patternlab/source/_patterns',
      templatesPath: 'src/templates',
      phpPaths: [
        '*.php',
        'src/functions/**/*.php',
        'src/templates/**/*.php'
      ],
      verbose: true
    })
  ]
};
```

#### Step 2.3: Test Plugin

```bash
npm run build
```

**Verify:**
1. Check `dist/wp/pattern-manifest.json` exists
2. Verify manifest structure:
   ```json
   {
     "version": 1234567890,
     "patterns": {
       "atoms/button": [],
       "molecules/card": ["atoms/button"]
     },
     "templates": {
       "page.twig": ["organisms/header"]
     },
     "php": {
       "index.php": ["page.twig"]
     }
   }
   ```
3. No webpack errors

---

### Phase 3: PHP Pattern Loader

**Goal:** Create PHP class to dynamically load pattern assets based on manifest

#### Step 3.1: Create Pattern Loader Class

**File:** `src/functions/pattern-loader.php` (new file)

```php
<?php
/**
 * Pattern Component Loader
 *
 * Dynamically loads PatternLab pattern CSS/JS based on page content and manifest
 *
 * Similar to Bootstrap Loader but for PatternLab patterns
 * Separation of concerns - handles patterns only
 */

class Dream_Pattern_Loader {
  private $manifest = null;
  private $enqueued_patterns = [];

  public function __construct() {
    add_action('wp_enqueue_scripts', [$this, 'enqueue_patterns'], 10); // After Bootstrap (5)
    add_action('save_post', [$this, 'clear_post_cache']);
  }

  /**
   * Load manifest from JSON file with mtime-based caching
   */
  private function load_manifest() {
    if ($this->manifest !== null) {
      return $this->manifest;
    }

    $manifest_path = get_template_directory() . '/dist/wp/pattern-manifest.json';

    if (!file_exists($manifest_path)) {
      error_log('Pattern manifest not found: ' . $manifest_path);
      return [];
    }

    // Cache key includes file modification time for auto-invalidation
    $mtime = filemtime($manifest_path);
    $cache_key = 'pattern_manifest_' . $mtime;

    // Disable caching in debug mode
    if (defined('WP_DEBUG') && WP_DEBUG) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
      return $this->manifest;
    }

    $cached = get_transient($cache_key);

    if (false === $cached) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
      set_transient($cache_key, $this->manifest, WEEK_IN_SECONDS);
    } else {
      $this->manifest = $cached;
    }

    return $this->manifest;
  }

  /**
   * Main enqueue function - called on wp_enqueue_scripts
   */
  public function enqueue_patterns() {
    $manifest = $this->load_manifest();

    if (empty($manifest)) {
      return;
    }

    // Get patterns needed for current page
    $patterns = $this->get_page_patterns();

    // Enqueue each pattern (with dependencies)
    foreach ($patterns as $pattern) {
      $this->enqueue_pattern($pattern);
    }
  }

  /**
   * Get all patterns needed for current page
   */
  private function get_page_patterns() {
    $post_id = get_the_ID();

    if (!$post_id) {
      return [];
    }

    // Cache per post
    $cache_key = 'pattern_page_patterns_' . $post_id;

    // Disable caching in debug mode
    if (defined('WP_DEBUG') && WP_DEBUG) {
      return $this->detect_page_patterns();
    }

    $cached = get_transient($cache_key);

    if (false === $cached) {
      $cached = $this->detect_page_patterns();
      set_transient($cache_key, $cached, DAY_IN_SECONDS);
    }

    return $cached;
  }

  /**
   * Detect which patterns are used on current page
   */
  private function detect_page_patterns() {
    $patterns = [];
    $manifest = $this->load_manifest();

    // Method 1: Detect from current template
    $template_patterns = $this->get_template_patterns();
    $patterns = array_merge($patterns, $template_patterns);

    // Method 2: Detect from blocks (ACF blocks render templates which use patterns)
    // Note: We don't scan block content directly, blocks → templates → patterns

    return array_unique($patterns);
  }

  /**
   * Get patterns used by current template
   */
  private function get_template_patterns() {
    $manifest = $this->load_manifest();
    $patterns = [];

    // Get current template file
    $template = get_page_template();

    if (!$template) {
      $template = get_template();
    }

    // Get relative path
    $template_file = str_replace(get_template_directory() . '/', '', $template);

    // Check if template is in manifest
    if (isset($manifest['php'][$template_file])) {
      $twig_templates = $manifest['php'][$template_file];

      // For each Twig template, get its patterns
      foreach ($twig_templates as $twig_template) {
        if (isset($manifest['templates'][$twig_template])) {
          $patterns = array_merge($patterns, $manifest['templates'][$twig_template]);
        }
      }
    }

    return $patterns;
  }

  /**
   * Enqueue a pattern and its dependencies recursively
   */
  public function enqueue_pattern($pattern_name) {
    // Normalize pattern name
    $pattern_name = $this->normalize_pattern_name($pattern_name);

    // Prevent duplicate enqueues
    if (in_array($pattern_name, $this->enqueued_patterns)) {
      return;
    }

    $this->enqueued_patterns[] = $pattern_name;
    $manifest = $this->load_manifest();

    // Enqueue dependencies first (recursive)
    if (isset($manifest['patterns'][$pattern_name])) {
      foreach ($manifest['patterns'][$pattern_name] as $dependency) {
        $this->enqueue_pattern($dependency);
      }
    }

    // Enqueue this pattern's assets
    $this->enqueue_pattern_assets($pattern_name);
  }

  /**
   * Enqueue CSS and JS for a specific pattern
   */
  private function enqueue_pattern_assets($pattern_name) {
    $manifest = $this->load_manifest();
    $version = $manifest['version'] ?? time();

    // Extract just the pattern name (without namespace)
    $pattern_slug = basename($pattern_name);

    // Enqueue CSS
    $css_handle = "pattern-{$pattern_slug}";
    $css_file = get_template_directory() . "/dist/wp/css/pattern-{$pattern_slug}.css";

    if (file_exists($css_file)) {
      wp_enqueue_style(
        $css_handle,
        get_template_directory_uri() . "/dist/wp/css/pattern-{$pattern_slug}.css",
        ['dream-styles'], // Depend on main bundle (protons)
        $version
      );
    }

    // Enqueue JS if exists
    $js_handle = "pattern-{$pattern_slug}-js";
    $js_file = get_template_directory() . "/dist/wp/js/pattern-{$pattern_slug}.bundle.js";

    if (file_exists($js_file)) {
      wp_enqueue_script(
        $js_handle,
        get_template_directory_uri() . "/dist/wp/js/pattern-{$pattern_slug}.bundle.js",
        ['jquery'],
        $version,
        true // Load in footer
      );
    }
  }

  /**
   * Normalize pattern name (handle with/without namespace)
   */
  private function normalize_pattern_name($name) {
    // If already has namespace (atoms/button), return as-is
    if (strpos($name, '/') !== false) {
      return $name;
    }

    // Otherwise, try to find it in manifest
    $manifest = $this->load_manifest();

    foreach ($manifest['patterns'] as $key => $deps) {
      if (basename($key) === $name) {
        return $key;
      }
    }

    return $name;
  }

  /**
   * Clear cache when post is saved
   */
  public function clear_post_cache($post_id) {
    delete_transient('pattern_page_patterns_' . $post_id);
  }
}

// Initialize
new Dream_Pattern_Loader();

/**
 * Helper function to manually enqueue a pattern
 *
 * Usage in PHP:
 *   enqueue_pattern('card');
 *   enqueue_pattern('molecules/card');
 *
 * Usage in Twig:
 *   {{ function('enqueue_pattern', 'card') }}
 */
function enqueue_pattern($pattern_name) {
  global $dream_pattern_loader;

  if (!isset($dream_pattern_loader)) {
    $dream_pattern_loader = new Dream_Pattern_Loader();
  }

  $dream_pattern_loader->enqueue_pattern($pattern_name);
}
```

#### Step 3.2: Register Pattern Loader

**File:** `functions.php`

```php
// Pattern Loader (after Bootstrap loader)
if (file_exists(dirname(__FILE__) . '/src/functions/pattern-loader.php')) {
  require_once dirname(__FILE__) . '/src/functions/pattern-loader.php';
}
```

#### Step 3.3: Test Pattern Loader

**Test Page:**
1. Create test page with known template
2. Check Network tab for loaded pattern CSS/JS
3. Verify only patterns used in template are loaded
4. Verify dependencies load recursively

**Manual Enqueue Test:**

In `index.php`:
```php
// Manual enqueue test
enqueue_pattern('card');
```

In Twig:
```twig
{# Manual enqueue test #}
{{ function('enqueue_pattern', 'hero') }}
```

---

### Phase 4: Cache Integration

**Goal:** Integrate with existing cache clearing system

#### Step 4.1: Update Cache Clear Functions

**File:** `src/functions/cache.php`

Add pattern cache clearing:

```php
// Existing cache clear function
function dream_clear_all_caches() {
  // ... existing cache clearing ...

  // Clear Bootstrap caches (existing)
  delete_transient('bootstrap_manifest_*');

  // Clear pattern caches (NEW)
  global $wpdb;
  $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_pattern_manifest_%'");
  $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_pattern_page_patterns_%'");

  error_log('Pattern caches cleared');
}
```

#### Step 4.2: Auto-Clear on Post Save

Already handled in `pattern-loader.php`:
```php
add_action('save_post', [$this, 'clear_post_cache']);
```

#### Step 4.3: Auto-Clear on Build

Pattern manifest version changes on each build, automatically invalidating cache.

---

### Phase 5: Testing & Validation

**Goal:** Verify pattern splitting works correctly

#### Build Testing
- [ ] `npm run build` completes without errors
- [ ] Pattern CSS files generated in `dist/wp/css/pattern-*.css`
- [ ] Pattern JS files generated in `dist/wp/js/pattern-*.bundle.js`
- [ ] `pattern-manifest.json` generated correctly
- [ ] Proton styles remain in `dream.css`
- [ ] Demo styles excluded from WordPress bundles

#### Manifest Testing
- [ ] Manifest contains all atoms/molecules/organisms/templates/pages
- [ ] Pattern dependencies correctly detected
- [ ] Template → pattern mapping accurate
- [ ] PHP → template mapping accurate
- [ ] No `00-protons` in manifest

#### Front-End Testing
- [ ] Pattern CSS loads only when pattern used
- [ ] Pattern JS loads only when pattern used
- [ ] Pattern dependencies load recursively
- [ ] Manual `enqueue_pattern()` works
- [ ] No visual regressions
- [ ] No console errors

#### Performance Testing
- [ ] CSS bundle size reduced significantly
- [ ] Unused CSS percentage decreased
- [ ] Page load time improved
- [ ] Network waterfall shows conditional loading

#### Cache Testing
- [ ] Manifest cached correctly
- [ ] Per-page detection cached
- [ ] Cache cleared on post save
- [ ] Cache cleared on build
- [ ] WP_DEBUG disables caching

---

## Protons Handling - CRITICAL

### Extremely Important Requirements

**00-protons MUST:**
1. ✅ Stay in `dream.css` (never extracted)
2. ✅ Be available globally (every page)
3. ✅ Provide variables/mixins to all patterns via webpack `additionalData`
4. ✅ NOT appear in pattern-manifest.json
5. ✅ Be loaded BEFORE any pattern assets

**Webpack Configuration:**

```js
// webpack.config.js

// SplitChunks - Explicitly exclude protons
optimization: {
  splitChunks: {
    cacheGroups: {
      patternStyles: {
        test: (module) => {
          // Exclude protons
          if (module.resource && module.resource.includes('00-protons')) {
            return false;
          }

          // Include atoms/molecules/organisms/templates/pages
          return /[\\/]_patterns[\\/](01-atoms|02-molecules|03-organisms|04-templates|05-pages)[\\/]/.test(module.resource);
        },
        // ... rest of config
      }
    }
  }
}

// Sass-loader - Make proton variables globally available
{
  loader: 'sass-loader',
  options: {
    additionalData: `
      @import "~bootstrap/scss/functions";
      @import "~bootstrap/scss/variables";
      @import "~bootstrap/scss/mixins";
      @import "./src/patternlab/source/_patterns/00-protons/non-printing/libs/_bootstrap.scss";
    `
  }
}
```

**What This Means:**
- All patterns can use proton variables without importing
- Protons loaded on every page (foundational styles)
- No duplication (variables don't output CSS)
- Consistent with current architecture

---

## Demo Styles Exclusion

**Goal:** Exclude `_demo.scss` from WordPress bundles (PatternLab only)

### Webpack Configuration

```js
// Pattern extraction - exclude demo files
optimization: {
  splitChunks: {
    cacheGroups: {
      patternStyles: {
        test: (module) => {
          // Exclude _demo.scss files
          if (module.resource && module.resource.includes('_demo.scss')) {
            return false;
          }

          // ... rest of pattern matching
        }
      }
    }
  }
}
```

### PatternLab Build

Demo styles remain in PatternLab build for development/documentation:

```scss
// Pattern structure
02-molecules/card/
├── _card.scss         → WordPress bundle (pattern-card.css)
├── _demo.scss         → PatternLab only (excluded from WordPress)
└── index.js
```

---

## Manual Enqueue Function

### PHP Usage

```php
// In template files
enqueue_pattern('card');
enqueue_pattern('molecules/card'); // With namespace

// In functions
add_action('wp_enqueue_scripts', function() {
  if (is_page_template('custom-template.php')) {
    enqueue_pattern('hero');
  }
});

// AJAX handlers
add_action('wp_ajax_load_more_posts', function() {
  enqueue_pattern('card');
  // ... rest of handler
});
```

### Twig Usage

```twig
{# In Twig templates #}
{{ function('enqueue_pattern', 'card') }}
{{ function('enqueue_pattern', 'molecules/hero') }}

{# Conditional #}
{% if custom_layout %}
  {{ function('enqueue_pattern', 'custom-hero') }}
{% endif %}
```

### Use Cases

1. **AJAX-Loaded Content**
   - Patterns loaded via AJAX won't be in manifest
   - Manually enqueue in AJAX handler

2. **Conditional PHP Logic**
   - Pattern shown based on PHP conditions
   - Manifest can't detect, use manual enqueue

3. **Dynamic Pattern Selection**
   - Pattern chosen at runtime
   - Use manual enqueue

4. **JavaScript-Loaded Patterns**
   - Pattern inserted via JS
   - Enqueue in template before JS runs

5. **Edge Cases**
   - Any scenario manifest can't detect
   - Fallback to manual enqueue

---

## Expected Results

### File Size Reduction

**Before:**
- `dream.css`: 300-500KB (all patterns)
- `dream.bundle.js`: All pattern JS

**After:**
- `dream.css`: 50-100KB (protons + critical only)
- `pattern-*.css`: 2-20KB each (loaded conditionally)
- `pattern-*.bundle.js`: 1-10KB each (loaded conditionally)

**Typical Page:**
- Before: 300-500KB CSS, 100% loaded
- After: 80-150KB CSS, only needed patterns loaded
- Reduction: ~60-70% fewer bytes

### Performance Improvements

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| CSS Size | 300-500KB | 80-150KB | **-60-70%** |
| Unused CSS | ~80% | ~20% | **-75%** |
| Pattern Assets | All loaded | Conditional | **Per-page basis** |
| Network Requests | 1 large | Multiple small | **Better caching** |
| First Paint | Delayed | Faster | **Smaller critical CSS** |

### Example Scenarios

**Simple Page (Header + Footer):**
- Loaded: `dream.css` + `pattern-header.css` + `pattern-footer.css`
- Total: ~90KB vs 450KB
- **Savings: 80%**

**Blog Post (Header + Card + Footer):**
- Loaded: `dream.css` + `pattern-header.css` + `pattern-card.css` + `pattern-footer.css`
- Total: ~110KB vs 450KB
- **Savings: 76%**

**Complex Page (Multiple Patterns):**
- Loaded: `dream.css` + 10 pattern files
- Total: ~180KB vs 450KB
- **Savings: 60%**

---

## Troubleshooting

### Pattern Not Loading

**Check:**
1. Is pattern in manifest? → `cat dist/wp/pattern-manifest.json`
2. Is pattern CSS generated? → `ls dist/wp/css/pattern-*.css`
3. Is template in manifest? → Check `templates` key
4. Clear cache → Delete transients

**Debug:**
```php
// Add to template
var_dump(get_transient('pattern_page_patterns_' . get_the_ID()));
```

### Proton Variables Not Available

**Check:**
1. Webpack `additionalData` configured correctly
2. Proton styles in `dream.css`
3. No proton extraction in splitChunks

**Test:**
```scss
// In pattern file - should work without import
.my-pattern {
  color: $primary; // From protons
}
```

### Demo Styles in WordPress

**Check:**
1. SplitChunks excludes `_demo.scss`
2. Rebuild webpack
3. Check generated CSS files

### Manifest Not Updating

**Check:**
1. Webpack build completed
2. Manifest version changed
3. Clear transients
4. Check manifest file mtime

---

## Future Enhancements

### Potential Improvements

1. **Block → Pattern Direct Mapping**
   - If ACF blocks directly reference patterns
   - Could map blocks → patterns (skip template layer)

2. **Pattern Preloading**
   - Preload patterns likely needed on next page
   - Based on navigation patterns

3. **Pattern Bundle Groups**
   - Group commonly-used patterns
   - e.g., "blog-bundle" = header + card + pagination + footer

4. **Critical Pattern Identification**
   - Automatically identify most-used patterns
   - Bundle into dream.css for instant availability

5. **Performance Monitoring**
   - Track which patterns loaded per page
   - Identify optimization opportunities

---

## Context Preservation

### Implementation Assistant Prompts

Use these prompts to guide implementation with proper context tracking.

#### Quick Start Prompt

```
I need you to implement the Pattern CSS/JS Splitting optimization for this theme following the PATTERN-SPLITTING-PLAN.md document.

IMPORTANT INSTRUCTIONS:
1. Read PATTERN-SPLITTING-PLAN.md completely to understand the full scope
2. Check PATTERN-IMPLEMENTATION-STATUS.md to see what's already been completed
3. Start from the first unchecked item in the current phase
4. After completing each task, update PATTERN-IMPLEMENTATION-STATUS.md with:
   - Mark the task as complete [x]
   - Add timestamp and any relevant notes
   - Update the "Current Status" section at the top
5. Test after each major step before moving to the next
6. If interrupted, document exactly where you stopped in PATTERN-IMPLEMENTATION-STATUS.md

CRITICAL REQUIREMENTS:
- 00-protons MUST stay in dream.css (never extracted)
- 00-protons variables/mixins MUST be globally available
- _demo.scss files MUST be excluded from WordPress bundles
- Pattern loader MUST be separate from Bootstrap loader
- Manual enqueue_pattern() function MUST be available

Let's begin with Phase 1. Please:
1. Read the current status
2. Tell me what phase/step we're on
3. Show me the next task to complete
4. Wait for my confirmation before proceeding
```

#### Context Recovery Prompt (If Interrupted)

```
I need to resume the Pattern CSS/JS Splitting implementation. We may have been interrupted.

Please:
1. Read PATTERN-IMPLEMENTATION-STATUS.md to see where we left off
2. Read PATTERN-SPLITTING-PLAN.md to understand what we're implementing
3. Tell me:
   - What phase and step we were working on
   - What was the last completed task
   - What is the next task to do
   - A brief summary of what's been completed so far
4. Verify any files that were supposed to be created/modified in the last step actually exist
5. If there are incomplete changes, identify them
6. Wait for my confirmation on how to proceed (continue, restart last step, or skip)

CRITICAL REQUIREMENTS TO VERIFY:
- Is 00-protons still in dream.css? (MUST be)
- Are _demo.scss files excluded from WordPress? (MUST be)
- Is pattern-loader.php separate from bootstrap-loader.php? (MUST be)
- Is enqueue_pattern() function available? (MUST be)

After assessing the situation, recommend the best path forward.
```

#### Phase Completion Verification Prompt

```
We just completed Phase [NUMBER] of the Pattern CSS/JS Splitting implementation.

Please:
1. Review all tasks in Phase [NUMBER] of PATTERN-SPLITTING-PLAN.md
2. Verify each task is marked complete in PATTERN-IMPLEMENTATION-STATUS.md
3. Run all tests specified in the "Testing & Validation" section for this phase
4. Document test results in PATTERN-IMPLEMENTATION-STATUS.md
5. Verify CRITICAL requirements:
   - 00-protons in dream.css (NOT extracted)
   - Proton variables globally available
   - _demo.scss excluded from WordPress
   - Pattern loader separate from Bootstrap loader
   - Manual enqueue function working
6. Summarize what was accomplished in this phase
7. Identify any issues or warnings that came up
8. Confirm readiness to move to Phase [NUMBER + 1]

Wait for my approval before proceeding to the next phase.
```

---

## Rollback Plan

If issues occur after implementation:

### Immediate Rollback

1. **Disable Pattern Loader**
   ```php
   // functions.php - Comment out:
   // require_once dirname(__FILE__) . '/src/functions/pattern-loader.php';
   ```

2. **Revert Webpack Config**
   ```js
   // webpack.config.js - Remove pattern splitChunks
   ```

3. **Rebuild**
   ```bash
   npm run build
   ```

4. **Clear Caches**
   ```php
   dream_clear_all_caches();
   ```

### Partial Rollback

**Keep What Works:**
- If CSS splitting works but JS has issues → Disable only JS extraction
- If manifest works but loader has issues → Fix loader, keep manifest
- If certain patterns have issues → Manually enqueue those, keep rest automatic

**Selective Disable:**
```php
// Disable for specific templates
if (is_page_template('problematic-template.php')) {
  remove_action('wp_enqueue_scripts', [Dream_Pattern_Loader, 'enqueue_patterns']);
}
```

### Git Rollback

1. **If committed:**
   ```bash
   git log --oneline  # Find commit before pattern splitting
   git revert <commit-hash>
   ```

2. **Rebuild:**
   ```bash
   npm run build
   ```

---

## Notes & Decisions

### Key Decisions Made

1. **Protons Always Loaded** - All proton styles remain in dream.css for foundational support
2. **Template Scanning Only** - No block/content scanning (blocks → templates → patterns)
3. **Separate Loader** - Pattern loader independent from Bootstrap loader (separation of concerns)
4. **Demo Exclusion** - _demo.scss files excluded from WordPress bundles
5. **Manual Enqueue** - `enqueue_pattern()` function for edge cases
6. **Namespace Flexibility** - Support both `card` and `atoms/card` in manual enqueue

### Important Reminders

- Always test on staging first
- Keep WP_DEBUG enabled during implementation
- Document any custom enqueues
- Monitor pattern manifest after template changes
- Clear caches when debugging
- Verify proton variables work in all patterns

---

## Completion Criteria

### Phase Complete When:
- [ ] All tasks in phase checklist marked complete
- [ ] All tests in Testing & Validation passed
- [ ] Test results documented in PATTERN-IMPLEMENTATION-STATUS.md
- [ ] No blocking errors or issues
- [ ] CRITICAL requirements verified:
  - [ ] Protons in dream.css
  - [ ] Proton variables globally available
  - [ ] Demo styles excluded
  - [ ] Separate loader from Bootstrap
  - [ ] Manual enqueue working
- [ ] Ready statement confirmed
- [ ] Git commit created

### Implementation Complete When:
- [ ] All 5 phases complete
- [ ] All tests passed
- [ ] Performance targets met (60-70% CSS reduction)
- [ ] No visual regressions
- [ ] Browser testing complete
- [ ] Documentation updated
- [ ] Final metrics recorded
- [ ] Production ready

---

## Summary

This plan provides a comprehensive approach to splitting PatternLab patterns into individually-loaded assets, similar to the Bootstrap splitting but adapted for patterns.

**Key Benefits:**
- ✅ 60-70% CSS size reduction
- ✅ Conditional loading based on actual usage
- ✅ Automatic dependency resolution
- ✅ No manual manifest maintenance
- ✅ Separation of concerns from Bootstrap
- ✅ Manual enqueue for edge cases
- ✅ Protons remain foundational and global

**Next Steps:**
1. Review this plan
2. Create PATTERN-IMPLEMENTATION-STATUS.md
3. Begin Phase 1: Webpack Configuration Updates

Good luck with the implementation! 🚀
