const fs = require('fs');
const path = require('path');

class BootstrapManifestPlugin {
  constructor(options = {}) {
    this.patternsPath = options.patternsPath || path.resolve(__dirname, '../src/patternlab/source/_patterns');
    this.blocksPath = options.blocksPath || path.resolve(__dirname, '../src/templates/blocks');
    this.templatesPath = options.templatesPath || path.resolve(__dirname, '../src/templates');
    this.outputPath = options.outputPath || 'bootstrap-manifest.json';
    this.scannedFiles = new Set();

    // Auto-detect child theme by reading parent theme name from style.css
    const parentThemePath = path.resolve(__dirname, '..');
    const themesDir = path.resolve(parentThemePath, '..');
    const parentThemeName = this.getThemeName(parentThemePath);

    if (parentThemeName) {
      this.childThemePath = this.detectChildTheme(themesDir, parentThemeName);
      this.hasChildTheme = this.childThemePath !== null;

      if (this.hasChildTheme) {
        this.childBlocksPath = path.resolve(this.childThemePath, 'src/templates/blocks');
        this.childTemplatesPath = path.resolve(this.childThemePath, 'src/templates');
        console.log(`[BootstrapManifestPlugin] Child theme detected: ${this.childThemePath}`);
      }
    } else {
      this.hasChildTheme = false;
    }
  }

  /**
   * Get theme name from style.css header
   */
  getThemeName(themePath) {
    const stylePath = path.join(themePath, 'style.css');

    if (!fs.existsSync(stylePath)) {
      return null;
    }

    try {
      const styleContent = fs.readFileSync(stylePath, 'utf8');
      const nameMatch = styleContent.match(/^\s*Theme Name:\s*(.+)$/im);

      if (nameMatch) {
        return nameMatch[1].trim();
      }
    } catch (err) {
      console.warn(`[BootstrapManifestPlugin] Error reading parent theme name: ${err.message}`);
    }

    return null;
  }

  /**
   * Detect child theme by reading style.css headers (WordPress method)
   * Scans all sibling directories for a style.css with Template: parent-theme-name
   */
  detectChildTheme(themesDir, parentThemeName) {
    if (!fs.existsSync(themesDir)) {
      return null;
    }

    try {
      const themeDirs = fs.readdirSync(themesDir, { withFileTypes: true })
        .filter(dirent => dirent.isDirectory())
        .map(dirent => dirent.name);

      for (const themeDir of themeDirs) {
        const stylePath = path.join(themesDir, themeDir, 'style.css');

        if (!fs.existsSync(stylePath)) {
          continue;
        }

        const styleContent = fs.readFileSync(stylePath, 'utf8');

        // Match WordPress child theme header: Template: parent-theme-name
        const templateMatch = styleContent.match(/^\s*Template:\s*(.+)$/im);

        if (templateMatch && templateMatch[1].trim() === parentThemeName) {
          return path.join(themesDir, themeDir);
        }
      }
    } catch (err) {
      console.warn(`[BootstrapManifestPlugin] Error detecting child theme: ${err.message}`);
    }

    return null;
  }

  apply(compiler) {
    compiler.hooks.emit.tapAsync('BootstrapManifestPlugin', (compilation, callback) => {
      this.scannedFiles.clear();

      const manifest = {
        version: Date.now(),
        patterns: {},
        blocks: {},
        templates: {},
        components: {}
      };

      // Step 1: Scan pattern files for Bootstrap imports (reliable file-based approach)
      this.analyzePatternFiles(manifest);

      // Step 2: Scan blocks and patterns for usage
      this.scanBlocksForPatterns(manifest);

      // Step 3: Scan templates for pattern usage
      this.scanTemplatesForPatterns(manifest);

      // Output manifest as JSON
      const json = JSON.stringify(manifest, null, 2);
      compilation.assets[this.outputPath] = {
        source: () => json,
        size: () => json.length
      };

      callback();
    });
  }

  /**
   * Scan pattern SCSS/JS files directly for Bootstrap imports
   * This is more reliable than webpack's module graph for SCSS imports
   */
  analyzePatternFiles(manifest) {
    const glob = require('glob');

    // Scan both SCSS and JS files
    const patternFiles = [
      ...glob.sync(`${this.patternsPath}/**/*.scss`),
      ...glob.sync(`${this.patternsPath}/**/*.js`)
    ];

    patternFiles.forEach(filepath => {
      const content = fs.readFileSync(filepath, 'utf8');
      const patternMatch = filepath.match(/_patterns\/(.+)\.(scss|js)$/);

      if (!patternMatch) return;

      const patternPath = patternMatch[1];
      const bootstrapDeps = new Set();

      // Match Bootstrap imports from multiple sources:
      // 1. SCSS Direct: @import '~bootstrap/scss/card'  or  import '~bootstrap/scss/card'
      // 2. SCSS Wrapper: import '../../00-protons/printing/libs/bootstrap-components/card.scss'
      // 3. JS imports: import Collapse from 'bootstrap/js/dist/collapse'
      const directScssImportRegex = /@?import\s+['"]~?bootstrap\/scss\/_?([^'"]+)['"]/g;
      const wrapperScssImportRegex = /@?import\s+['"][^'"]*bootstrap-components\/([^'"]+)\.scss['"]/g;
      const bootstrapJsImportRegex = /import\s+\w+\s+from\s+['"]bootstrap\/js\/dist\/([^'"]+)['"]/g;

      let match;

      // Check for direct Bootstrap SCSS imports
      while ((match = directScssImportRegex.exec(content)) !== null) {
        const component = match[1].replace('.scss', '').replace(/^_/, '');
        bootstrapDeps.add(component);
      }

      // Check for wrapper SCSS imports
      while ((match = wrapperScssImportRegex.exec(content)) !== null) {
        const component = match[1];
        bootstrapDeps.add(component);
      }

      // Check for Bootstrap JS imports
      while ((match = bootstrapJsImportRegex.exec(content)) !== null) {
        const component = match[1];
        bootstrapDeps.add(component);
      }

      if (bootstrapDeps.size > 0) {
        // Extract pattern directory path (e.g., "02-molecules/card" from "02-molecules/card/index")
        // Match pattern: level/name/filename -> level/name
        const cleanPatternPath = patternPath.replace(/\/[^/]+\.(scss|js)$/, '').replace(/\/index$/, '');

        // Skip the wrapper directory itself
        if (cleanPatternPath.includes('bootstrap-components')) {
          return;
        }

        if (!manifest.patterns[cleanPatternPath]) {
          manifest.patterns[cleanPatternPath] = [];
        }

        // Merge with existing components for this pattern
        manifest.patterns[cleanPatternPath] = Array.from(
          new Set([...manifest.patterns[cleanPatternPath], ...bootstrapDeps])
        ).sort();
      }
    });
  }

  /**
   * Recursively scan Twig file for pattern includes
   */
  scanTwigFileRecursively(filePath, depth = 0) {
    // Prevent infinite loops and excessive recursion
    if (this.scannedFiles.has(filePath) || depth > 10) {
      return [];
    }

    this.scannedFiles.add(filePath);

    if (!fs.existsSync(filePath)) {
      return [];
    }

    const content = fs.readFileSync(filePath, 'utf8');
    const patterns = [];

    // Match: {% include '@molecules/card/_card.tpl.twig' %}
    // Match: {% embed '@organisms/header/_header.tpl.twig' %}
    const includeRegex = /\{%\s*(?:include|embed)\s+['"]@(atoms|molecules|organisms)\/([^\/]+)\/([^'"]+)['"]/g;
    let match;

    while ((match = includeRegex.exec(content)) !== null) {
      const level = match[1]
        .replace('atoms', '01-atoms')
        .replace('molecules', '02-molecules')
        .replace('organisms', '03-organisms');
      const patternName = match[2];
      const template = match[3];

      const patternPath = `${level}/${patternName}`;
      patterns.push(patternPath);

      // Recursively scan the included pattern file
      const patternFilePath = path.join(this.patternsPath, level, patternName, template);
      const nestedPatterns = this.scanTwigFileRecursively(patternFilePath, depth + 1);
      patterns.push(...nestedPatterns);
    }

    // Deduplicate and return
    return [...new Set(patterns)];
  }

  /**
   * Scan all blocks to find which patterns they use
   */
  scanBlocksForPatterns(manifest) {
    // Scan parent theme blocks
    this.scanBlocksInDirectory(this.blocksPath, manifest);

    // Scan child theme blocks if child theme exists
    if (this.hasChildTheme && fs.existsSync(this.childBlocksPath)) {
      this.scanBlocksInDirectory(this.childBlocksPath, manifest);
    }
  }

  /**
   * Scan blocks in a specific directory
   */
  scanBlocksInDirectory(blocksPath, manifest) {
    if (!fs.existsSync(blocksPath)) {
      return;
    }

    const blocks = fs.readdirSync(blocksPath);

    blocks.forEach(blockName => {
      const blockDir = path.join(blocksPath, blockName);

      if (!fs.statSync(blockDir).isDirectory()) {
        return;
      }

      const blockTwig = path.join(blockDir, `${blockName}.twig`);

      if (!fs.existsSync(blockTwig)) {
        return;
      }

      // Recursively scan block and all included patterns
      const usedPatterns = this.scanTwigFileRecursively(blockTwig);

      // Collect all Bootstrap components from used patterns
      const bootstrapComponents = new Set();

      usedPatterns.forEach(patternPath => {
        if (manifest.patterns[patternPath]) {
          manifest.patterns[patternPath].forEach(component => {
            bootstrapComponents.add(component);
          });
        }
      });

      // Add to manifest if block uses Bootstrap components
      if (bootstrapComponents.size > 0) {
        manifest.blocks[`acf/${blockName}`] = Array.from(bootstrapComponents).sort();
      }
    });
  }

  /**
   * Scan template files (.twig and .php) for pattern usage
   */
  scanTemplatesForPatterns(manifest) {
    const glob = require('glob');

    // Get parent theme template files (exclude blocks and patterns)
    let twigFiles = glob.sync(`${this.templatesPath}/**/*.twig`)
      .filter(file => !file.includes('/blocks/') && !file.includes('/_patterns/'));

    // Get parent theme PHP files from multiple locations
    let phpFiles = [
      // Theme root PHP files (e.g., single.php, archive.php, woocommerce.php)
      ...glob.sync(`${this.templatesPath}/../*.php`)
        .filter(file => !file.includes('functions.php') && !file.includes('vendor/')),
      // PHP files in src/functions
      ...glob.sync(`${this.templatesPath}/../src/functions/**/*.php`)
        .filter(file => !file.includes('vendor/'))
    ];

    // Add child theme template files if child theme exists
    if (this.hasChildTheme) {
      if (fs.existsSync(this.childTemplatesPath)) {
        twigFiles = [
          ...twigFiles,
          ...glob.sync(`${this.childTemplatesPath}/**/*.twig`)
            .filter(file => !file.includes('/blocks/') && !file.includes('/_patterns/'))
        ];
      }

      // Add child theme PHP files
      const childThemeRoot = this.childThemePath;
      if (fs.existsSync(childThemeRoot)) {
        phpFiles = [
          ...phpFiles,
          // Child theme root PHP files
          ...glob.sync(`${childThemeRoot}/*.php`)
            .filter(file => !file.includes('functions.php') && !file.includes('vendor/')),
          // Child theme src/functions PHP files
          ...glob.sync(`${childThemeRoot}/src/functions/**/*.php`)
            .filter(file => !file.includes('vendor/'))
        ];
      }
    }

    // Scan .twig files for pattern includes
    twigFiles.forEach(filePath => {
      const patterns = this.scanTwigForPatterns(filePath);
      if (patterns.length > 0) {
        const relativePath = path.relative(this.templatesPath, filePath);
        manifest.templates[relativePath] = patterns;
      }
    });

    // Scan .php files for Timber::render/compile calls
    phpFiles.forEach(filePath => {
      const patterns = this.scanPhpForPatterns(filePath);
      if (patterns.length > 0) {
        const fileName = path.basename(filePath);
        manifest.templates[fileName] = patterns;
      }
    });
  }

  /**
   * Scan a Twig file for static pattern includes
   */
  scanTwigForPatterns(filePath) {
    if (!fs.existsSync(filePath)) return [];

    const content = fs.readFileSync(filePath, 'utf8');
    const patterns = new Set();

    // Match: {% include '@molecules/card/_card.tpl.twig' %}
    // Match: {% embed '@organisms/header/_header.tpl.twig' %}
    // Match: {% extends 'layouts/base.twig' %}
    const includeRegex = /\{%\s*(?:include|embed|extends)\s+['"](?:@)?(atoms|molecules|organisms)\/([^\/'"]+)/g;
    let match;

    while ((match = includeRegex.exec(content)) !== null) {
      const level = match[1]
        .replace('atoms', '01-atoms')
        .replace('molecules', '02-molecules')
        .replace('organisms', '03-organisms');
      const patternName = match[2];
      patterns.add(`${level}/${patternName}`);
    }

    return Array.from(patterns).sort();
  }

  /**
   * Scan a PHP file for static Timber rendering calls
   */
  scanPhpForPatterns(filePath) {
    if (!fs.existsSync(filePath)) return [];

    const content = fs.readFileSync(filePath, 'utf8');
    const patterns = new Set();

    // Match various Timber rendering methods:
    // - Timber::render('pages/single.twig', ...)
    // - Timber::compile('02-molecules/card.twig', ...)
    // - Timber::fetch('partials/header.twig', ...)
    // - Timber::compile_string() is excluded as it doesn't reference template files
    // - $twig->render() is excluded (too generic and usually runtime-determined)
    const renderRegex = /Timber::(?:render|compile|fetch)\s*\(\s*['"]([^'"]+\.twig)['"]/g;
    let match;

    while ((match = renderRegex.exec(content)) !== null) {
      const templatePath = match[1];
      // Store the template path as referenced
      patterns.add(templatePath);
    }

    return Array.from(patterns).sort();
  }
}

module.exports = BootstrapManifestPlugin;
