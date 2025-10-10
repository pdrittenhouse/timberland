const fs = require('fs');
const path = require('path');

class PatternManifestPlugin {
  constructor(options = {}) {
    this.patternsPath = options.patternsPath || path.resolve(__dirname, '../src/patternlab/source/_patterns');
    this.blocksPath = options.blocksPath || path.resolve(__dirname, '../src/templates/blocks');
    this.templatesPath = options.templatesPath || path.resolve(__dirname, '../src/templates');
    this.outputPath = options.outputPath || 'pattern-manifest.json';
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
        console.log(`[PatternManifestPlugin] Child theme detected: ${this.childThemePath}`);
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
      console.warn(`[PatternManifestPlugin] Error reading parent theme name: ${err.message}`);
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
      console.warn(`[PatternManifestPlugin] Error detecting child theme: ${err.message}`);
    }

    return null;
  }

  apply(compiler) {
    compiler.hooks.emit.tapAsync('PatternManifestPlugin', (compilation, callback) => {
      this.scannedFiles.clear();

      const manifest = {
        version: Date.now(),
        patterns: {},
        blocks: {},
        templates: {}
      };

      // Step 1: Analyze pattern files to determine what each pattern depends on
      this.analyzePatternDependencies(manifest);

      // Step 2: Scan blocks for pattern usage
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
   * Analyze pattern files to determine dependencies
   * Scans pattern Twig and JS files for references to other patterns
   */
  analyzePatternDependencies(manifest) {
    const glob = require('glob');

    // Get all pattern directories (atoms, molecules, organisms, templates, pages)
    const patternDirs = [
      '01-atoms',
      '02-molecules',
      '03-organisms',
      '04-templates',
      '05-pages'
    ];

    patternDirs.forEach(level => {
      const levelPath = path.join(this.patternsPath, level);

      if (!fs.existsSync(levelPath)) {
        return;
      }

      const patterns = fs.readdirSync(levelPath)
        .filter(name => {
          const patternPath = path.join(levelPath, name);
          return fs.statSync(patternPath).isDirectory();
        });

      patterns.forEach(patternName => {
        const patternPath = `${level}/${patternName}`;
        const patternDir = path.join(levelPath, patternName);

        // Scan pattern's Twig files
        const twigFiles = glob.sync(`${patternDir}/**/*.twig`);
        const dependencies = new Set();

        twigFiles.forEach(twigFile => {
          const deps = this.extractPatternDependencies(twigFile);
          deps.forEach(dep => dependencies.add(dep));
        });

        // Store pattern with its dependencies
        manifest.patterns[patternPath] = {
          name: patternName,
          level: level,
          dependencies: Array.from(dependencies).sort(),
          css: this.hasPatternFile(patternDir, '.scss'),
          js: this.hasPatternFile(patternDir, '.js'),
          demo: this.hasPatternFile(patternDir, '_demo.scss')
        };
      });
    });
  }

  /**
   * Check if a pattern has a specific file type
   */
  hasPatternFile(patternDir, extension) {
    const files = fs.readdirSync(patternDir);

    if (extension === '.scss') {
      // Check for main SCSS file (not demo)
      return files.some(file =>
        file.endsWith('.scss') && !file.includes('_demo')
      );
    }

    if (extension === '.js') {
      // Check for index.js or pattern.js
      return files.some(file =>
        file === 'index.js' || file.endsWith('.js')
      );
    }

    if (extension === '_demo.scss') {
      return files.includes('_demo.scss');
    }

    return false;
  }

  /**
   * Extract pattern dependencies from a Twig file
   * Looks for {% include %}, {% embed %}, {% extends %}
   */
  extractPatternDependencies(filePath) {
    if (!fs.existsSync(filePath)) {
      return [];
    }

    const content = fs.readFileSync(filePath, 'utf8');
    const dependencies = new Set();

    // Match pattern includes with @ namespace:
    // {% include '@atoms/button/_button.tpl.twig' %}
    // {% embed '@molecules/card/_card.tpl.twig' %}
    // {% extends '@templates/page/_page.tpl.twig' %}
    const namespaceRegex = /\{%\s*(?:include|embed|extends)\s+['"]@(atoms|molecules|organisms|templates|pages)\/([^\/'"]+)/g;

    let match;
    while ((match = namespaceRegex.exec(content)) !== null) {
      const level = this.normalizePatternLevel(match[1]);
      const patternName = match[2];
      dependencies.add(`${level}/${patternName}`);
    }

    // Also match includes without @ namespace (relative paths)
    // {% include '../card/_card.tpl.twig' %}
    const relativeRegex = /\{%\s*(?:include|embed|extends)\s+['"](\.\.\/)+([^\/'"]+)/g;

    while ((match = relativeRegex.exec(content)) !== null) {
      const patternName = match[2];
      // Try to resolve this - it's likely in the same or parent directory
      // This is a best-effort attempt; some patterns might be missed
      const currentDir = path.dirname(filePath);
      const resolvedPath = path.resolve(currentDir, match[0].match(/['"](.*?)['"]/)[1]);

      if (resolvedPath.includes('_patterns')) {
        const patternMatch = resolvedPath.match(/_patterns\/(0[1-5]-(?:atoms|molecules|organisms|templates|pages))\/([^\/]+)/);
        if (patternMatch) {
          dependencies.add(`${patternMatch[1]}/${patternMatch[2]}`);
        }
      }
    }

    return Array.from(dependencies);
  }

  /**
   * Normalize pattern level name to numbered format
   */
  normalizePatternLevel(level) {
    const mapping = {
      'atoms': '01-atoms',
      'molecules': '02-molecules',
      'organisms': '03-organisms',
      'templates': '04-templates',
      'pages': '05-pages'
    };
    return mapping[level] || level;
  }

  /**
   * Recursively resolve all dependencies for a pattern
   * Returns flat array of all patterns needed (including nested dependencies)
   */
  resolvePatternDependencies(patternPath, manifest, resolved = new Set(), depth = 0) {
    // Prevent infinite loops
    if (depth > 20 || resolved.has(patternPath)) {
      return Array.from(resolved);
    }

    resolved.add(patternPath);

    const pattern = manifest.patterns[patternPath];
    if (!pattern || !pattern.dependencies) {
      return Array.from(resolved);
    }

    // Recursively resolve dependencies
    pattern.dependencies.forEach(dep => {
      this.resolvePatternDependencies(dep, manifest, resolved, depth + 1);
    });

    return Array.from(resolved);
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

      // Scan block for pattern usage
      const directPatterns = this.scanTwigFileForPatterns(blockTwig);

      // Resolve all nested dependencies
      const allPatterns = new Set();
      directPatterns.forEach(patternPath => {
        const resolved = this.resolvePatternDependencies(patternPath, manifest);
        resolved.forEach(p => allPatterns.add(p));
      });

      if (allPatterns.size > 0) {
        manifest.blocks[`acf/${blockName}`] = Array.from(allPatterns).sort();
      }
    });
  }

  /**
   * Scan a Twig file for pattern references (non-recursive)
   */
  scanTwigFileForPatterns(filePath) {
    if (!fs.existsSync(filePath)) {
      return [];
    }

    const content = fs.readFileSync(filePath, 'utf8');
    const patterns = new Set();

    // Match: {% include '@molecules/card/_card.tpl.twig' %}
    // Match: {% embed '@organisms/header/_header.tpl.twig' %}
    // Match: {% extends '@templates/page/_page.tpl.twig' %}
    const includeRegex = /\{%\s*(?:include|embed|extends)\s+['"]@(atoms|molecules|organisms|templates|pages)\/([^\/'"]+)/g;
    let match;

    while ((match = includeRegex.exec(content)) !== null) {
      const level = this.normalizePatternLevel(match[1]);
      const patternName = match[2];
      patterns.add(`${level}/${patternName}`);
    }

    return Array.from(patterns);
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
      const directPatterns = this.scanTwigFileForPatterns(filePath);

      if (directPatterns.length > 0) {
        // Resolve all nested dependencies
        const allPatterns = new Set();
        directPatterns.forEach(patternPath => {
          const resolved = this.resolvePatternDependencies(patternPath, manifest);
          resolved.forEach(p => allPatterns.add(p));
        });

        const relativePath = path.relative(this.templatesPath, filePath);
        manifest.templates[relativePath] = Array.from(allPatterns).sort();
      }
    });

    // Scan .php files for Timber::render/compile calls
    phpFiles.forEach(filePath => {
      const patterns = this.scanPhpForPatterns(filePath, manifest);

      if (patterns.length > 0) {
        const fileName = path.basename(filePath);
        manifest.templates[fileName] = patterns;
      }
    });
  }

  /**
   * Scan a PHP file for Timber rendering calls
   */
  scanPhpForPatterns(filePath, manifest) {
    if (!fs.existsSync(filePath)) {
      return [];
    }

    const content = fs.readFileSync(filePath, 'utf8');
    const patterns = new Set();

    // Match various Timber rendering methods:
    // - Timber::render('pages/single.twig', ...)
    // - Timber::compile('02-molecules/card.twig', ...)
    // - Timber::fetch('partials/header.twig', ...)
    // - Timber::compile_string() is excluded as it doesn't reference template files
    const renderRegex = /Timber::(?:render|compile|fetch)\s*\(\s*['"]([^'"]+\.twig)['"]/g;
    let match;

    while ((match = renderRegex.exec(content)) !== null) {
      const templatePath = match[1];

      // Try to extract pattern path from template
      // Could be: 'atoms/button.twig', '01-atoms/button/button.twig', etc.
      const patternMatch = templatePath.match(/(?:0[1-5]-)?(atoms|molecules|organisms|templates|pages)\/([^\/]+)/);

      if (patternMatch) {
        const level = this.normalizePatternLevel(patternMatch[1]);
        const patternName = patternMatch[2].replace('.twig', '');
        const patternPath = `${level}/${patternName}`;

        // Resolve all dependencies for this pattern
        const resolved = this.resolvePatternDependencies(patternPath, manifest);
        resolved.forEach(p => patterns.add(p));
      }
    }

    return Array.from(patterns).sort();
  }
}

module.exports = PatternManifestPlugin;
