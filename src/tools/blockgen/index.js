'use strict';
const Generator = require('yeoman-generator');
const chalk = require('chalk');
const yosay = require('yosay');

const { join, relative, basename, dirname } = require('path');
const { readdirSync, statSync, existsSync } = require('fs');
const { camelCase, startCase } = require('lodash');

module.exports = class extends Generator {
  prompting() {
    // Have Yeoman greet the user.
    this.log(
      yosay(`Welcome to the ${chalk.red('Block Generator')}! This will help you build a block folder with assets.
      Templates for this are in: ${chalk.red(relative(process.cwd(), __dirname))}`)
    );

    // Helper function to find parent and child theme directories
    const getThemeDirectories = () => {
      const cwd = process.cwd();
      const themes = [];

      // Navigate up to find wp-content/themes directory
      let currentPath = cwd;
      let themesPath = null;

      // Try to find themes directory by looking for characteristic structure
      while (currentPath !== '/' && currentPath.length > 1) {
        const potentialThemesPath = join(currentPath, 'app', 'public', 'wp-content', 'themes');
        if (existsSync(potentialThemesPath)) {
          themesPath = potentialThemesPath;
          break;
        }
        // Also check if we're already in a themes subdirectory
        if (basename(dirname(currentPath)) === 'themes' || basename(currentPath) === 'themes') {
          themesPath = basename(currentPath) === 'themes' ? currentPath : dirname(currentPath);
          break;
        }
        currentPath = dirname(currentPath);
      }

      if (!themesPath) {
        this.log(chalk.yellow('Warning: Could not find themes directory, using current directory structure'));
        // Fallback: look for directories with src/templates/blocks
        const cwdParent = dirname(dirname(dirname(cwd))); // Go up from src/tools/blockgen
        if (existsSync(join(cwdParent, 'src', 'templates', 'blocks'))) {
          return [{
            name: basename(cwdParent),
            path: join(cwdParent, 'src', 'templates', 'blocks'),
            label: `${basename(cwdParent)} (current theme)`
          }];
        }
        return [];
      }

      // Get all directories in themes folder
      const themeDirectories = readdirSync(themesPath, 'utf8')
        .filter(dir => {
          const fullPath = join(themesPath, dir);
          return statSync(fullPath).isDirectory() &&
                 existsSync(join(fullPath, 'src', 'templates', 'blocks'));
        })
        .sort();

      // Identify parent theme (one without -child suffix, or the first one)
      const parentTheme = themeDirectories.find(dir => !dir.includes('-child')) || themeDirectories[0];
      const childThemes = themeDirectories.filter(dir => dir !== parentTheme);

      if (parentTheme) {
        themes.push({
          name: parentTheme,
          path: join(themesPath, parentTheme, 'src', 'templates', 'blocks'),
          label: `${parentTheme} (parent theme)`
        });
      }

      childThemes.forEach(childTheme => {
        themes.push({
          name: childTheme,
          path: join(themesPath, childTheme, 'src', 'templates', 'blocks'),
          label: `${childTheme} (child theme)`
        });
      });

      return themes;
    };

    // Helper function to get all blocks from parent theme
    const getParentBlocks = (parentBlocksPath) => {
      try {
        return readdirSync(parentBlocksPath, 'utf8')
          .filter(folder => {
            const fullPath = join(parentBlocksPath, folder);
            return statSync(fullPath).isDirectory() &&
                   folder !== '.block' &&
                   folder !== '.bak' &&
                   !folder.startsWith('.');
          })
          .sort();
      } catch (error) {
        return [];
      }
    };

    const themeDirectories = getThemeDirectories();

    if (themeDirectories.length === 0) {
      this.log(chalk.red('Error: No theme directories with src/templates/blocks found!'));
      process.exit(1);
    }

    const prompts = [
      {
        type: 'list',
        name: 'blockLocation',
        message: 'Where would you like to create this block?',
        choices: themeDirectories.map(theme => ({
          name: theme.label,
          value: theme
        })),
      },
      {
        name: 'name',
        message: 'What shall we name the block?',
        filter(answer) {
          return answer.replace(/ /g, '-').toLowerCase();
        },
        validate(answer, answers) {
          if (answer.length === 0) {
            return 'Block name is required';
          }

          // Check if block already exists in selected theme
          const selectedTheme = answers.blockLocation;
          const blockPath = join(selectedTheme.path, answer);

          if (existsSync(blockPath)) {
            // Check if it's a parent block (for override)
            const parentTheme = themeDirectories[0];
            const isChildTheme = selectedTheme.name !== parentTheme.name;

            if (isChildTheme) {
              const parentBlockPath = join(parentTheme.path, answer);
              if (existsSync(parentBlockPath)) {
                // It's an override - this is OK
                return true;
              }
            }

            // Same theme duplicate - not allowed
            return `Block "${answer}" already exists in ${selectedTheme.name}. Please choose a different name.`;
          }

          return true;
        }
      },
      {
        name: 'title',
        message: 'What is the block title? (human-readable)',
        when(answers) {
          // Skip if override (block exists in parent)
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath); // Only ask if NOT an override
          }
          return true;
        },
        default(answers) {
          return startCase(answers.name);
        }
      },
      {
        name: 'description',
        message: 'Block description?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        default(answers) {
          return `A ${answers.title.toLowerCase()} block.`;
        }
      },
      {
        type: 'list',
        name: 'category',
        message: 'Block category?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        choices(answers) {
          const isChild = answers.blockLocation.name.includes('-child');
          return isChild
            ? ['timberland-child', 'text', 'media', 'design', 'widgets', 'theme', 'embed']
            : ['timberland', 'text', 'media', 'design', 'widgets', 'theme', 'embed'];
        },
        default(answers) {
          const isChild = answers.blockLocation.name.includes('-child');
          return isChild ? 'timberland-child' : 'timberland';
        }
      },
      {
        type: 'list',
        name: 'icon',
        message: 'Block icon (Dashicon)?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        choices: [
          'block-default',
          'admin-appearance', 'admin-collapse', 'admin-comments', 'admin-customizer', 'admin-generic', 'admin-home', 'admin-links', 'admin-media', 'admin-multisite', 'admin-network', 'admin-page', 'admin-plugins', 'admin-post', 'admin-settings', 'admin-site', 'admin-site-alt', 'admin-site-alt2', 'admin-site-alt3', 'admin-tools', 'admin-users',
          'album', 'align-center', 'align-full-width', 'align-left', 'align-none', 'align-pull-left', 'align-pull-right', 'align-right', 'align-wide', 'analytics', 'archive', 'arrow-down', 'arrow-down-alt', 'arrow-down-alt2', 'arrow-left', 'arrow-left-alt', 'arrow-left-alt2', 'arrow-right', 'arrow-right-alt', 'arrow-right-alt2', 'arrow-up', 'arrow-up-alt', 'arrow-up-alt2', 'art', 'awards',
          'backup', 'bank', 'beer', 'bell', 'ビル', 'block-default', 'book', 'book-alt', 'buddicons-activity', 'buddicons-bbpress-logo', 'buddicons-buddypress-logo', 'buddicons-community', 'buddicons-forums', 'buddicons-friends', 'buddicons-groups', 'buddicons-pm', 'buddicons-replies', 'buddicons-topics', 'buddicons-tracking', 'building', 'bullhorn', 'businessman', 'button',
          'calculator', 'calendar', 'calendar-alt', 'camera', 'camera-alt', 'car', 'carrot', 'cart', 'category', 'chart-area', 'chart-bar', 'chart-line', 'chart-pie', 'clipboard', 'clock', 'cloud', 'cloud-saved', 'cloud-upload', 'code-standards', 'coffee', 'cog', 'color-picker', 'columns', 'controls-back', 'controls-forward', 'controls-pause', 'controls-play', 'controls-repeat', 'controls-skipback', 'controls-skipforward', 'controls-volumeoff', 'controls-volumeon', 'cover-image', 'create-page',
          'dashboard', 'database', 'database-add', 'database-export', 'database-import', 'database-remove', 'database-view', 'desktop', 'dismiss', 'download',
          'edit', 'edit-large', 'edit-page', 'editor-aligncenter', 'editor-alignleft', 'editor-alignright', 'editor-bold', 'editor-break', 'editor-code', 'editor-contract', 'editor-customchar', 'editor-expand', 'editor-help', 'editor-indent', 'editor-insertmore', 'editor-italic', 'editor-justify', 'editor-kitchensink', 'editor-ltr', 'editor-ol', 'editor-ol-rtl', 'editor-outdent', 'editor-paragraph', 'editor-paste-text', 'editor-paste-word', 'editor-quote', 'editor-removeformatting', 'editor-rtl', 'editor-spellcheck', 'editor-strikethrough', 'editor-table', 'editor-textcolor', 'editor-ul', 'editor-underline', 'editor-unlink', 'editor-video', 'ellipsis', 'email', 'email-alt', 'email-alt2', 'embed-audio', 'embed-generic', 'embed-photo', 'embed-post', 'embed-video', 'excerpt-view', 'exit', 'external',
          'facebook', 'facebook-alt', 'feedback', 'filter', 'flag', 'food', 'format-aside', 'format-audio', 'format-chat', 'format-gallery', 'format-image', 'format-quote', 'format-status', 'format-video', 'forms', 'fullscreen-alt', 'fullscreen-exit-alt', 'funds',
          'games', 'google', 'googleplus', 'grid-view', 'groups', 'hammer', 'heading', 'heart', 'hidden', 'hourglass', 'html', 'id', 'id-alt', 'image-crop', 'image-filter', 'image-flip-horizontal', 'image-flip-vertical', 'image-rotate', 'image-rotate-left', 'image-rotate-right', 'images-alt', 'images-alt2', 'index-card', 'info', 'info-outline', 'insert', 'insert-after', 'insert-before', 'instagram',
          'keyboard-hide', 'laptop', 'layout', 'leftright', 'lightbulb', 'linkedin', 'list-view', 'location', 'location-alt', 'lock', 'lock-duplicate',
          'marker', 'media-archive', 'media-audio', 'media-code', 'media-default', 'media-document', 'media-interactive', 'media-spreadsheet', 'media-text', 'media-video', 'megaphone', 'menu', 'menu-alt', 'menu-alt2', 'menu-alt3', 'microphone', 'migrate', 'minus', 'money', 'money-alt', 'move',
          'nametag', 'networking', 'no', 'no-alt',
          'open-folder', 'palmtree', 'paperclip', 'performance', 'pets', 'phone', 'pinterest', 'playlist-audio', 'playlist-video', 'plus', 'plus-alt', 'plus-alt2', 'podio', 'portfolio', 'post-status', 'pressthis', 'printer', 'privacy', 'products',
          'redo', 'reddit', 'rss', 'saved', 'schedule', 'screenoptions', 'search', 'share', 'share-alt', 'share-alt2', 'shield', 'shield-alt', 'shortcode', 'slides', 'smartphone', 'smiley', 'sort', 'sos', 'spotify', 'star-empty', 'star-filled', 'star-half', 'store', 'sticky', 'superhero', 'superhero-alt', 'swatch', 'table-col-after', 'table-col-before', 'table-col-delete', 'table-row-after', 'table-row-before', 'table-row-delete', 'tablet', 'tag', 'tagcloud', 'task-list', 'telegram', 'testimonial', 'text', 'text-page', 'thumbs-down', 'thumbs-up', 'tickets', 'tickets-alt', 'tide', 'time', 'timeline', 'tips', 'title', 'translation', 'trash', 'twitch', 'twitter', 'twitter-alt',
          'undo', 'universal-access', 'universal-access-alt', 'unlock', 'update', 'update-alt', 'upload', 'vault', 'video-alt', 'video-alt2', 'video-alt3', 'visibility', 'warning', 'welcome-add-page', 'welcome-comments', 'welcome-learn-more', 'welcome-view-site', 'welcome-widgets-menus', 'welcome-write-blog', 'whatsapp', 'wordpress', 'wordpress-alt', 'xing', 'yes', 'yes-alt', 'youtube',
          'other'
        ],
        default: 'block-default'
      },
      {
        name: 'customIcon',
        message: 'Enter custom icon name:',
        when(answers) {
          return answers.icon === 'other';
        }
      },
      {
        name: 'keywords',
        message: 'Block keywords (comma-separated)?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        filter(answer) {
          return answer.split(',').map(k => k.trim()).filter(k => k.length > 0);
        },
        default(answers) {
          return answers.name;
        }
      },
      {
        type: 'confirm',
        name: 'jsx',
        message: 'Enable JSX support?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        default: true
      },
      {
        type: 'list',
        name: 'acfMode',
        message: 'ACF block mode?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        choices: ['preview', 'edit', 'auto'],
        default: 'preview'
      },
      {
        type: 'confirm',
        name: 'includeExample',
        message: 'Include example preview?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        default: false
      },
      {
        type: 'confirm',
        name: 'includeVariations',
        message: 'Include variations?',
        when(answers) {
          // Skip if override
          const selectedTheme = answers.blockLocation;
          const parentTheme = themeDirectories[0];
          const isChildTheme = selectedTheme.name !== parentTheme.name;

          if (isChildTheme) {
            const parentBlockPath = join(parentTheme.path, answers.name);
            return !existsSync(parentBlockPath);
          }
          return true;
        },
        default: false
      }
    ];

    return this.prompt(prompts).then(props => {
      const selectedTheme = props.blockLocation;
      const parentTheme = themeDirectories[0]; // First theme is always parent
      const isChildTheme = selectedTheme.name !== parentTheme.name;

      // Check if this block exists in parent (for override detection)
      const parentBlocks = isChildTheme ? getParentBlocks(parentTheme.path) : [];
      const isOverride = parentBlocks.includes(props.name);

      // To access props later use this.props.someAnswer;
      this.props = {
        ...props,
        blockPath: selectedTheme.path,
        themeName: selectedTheme.name,
        isChildTheme,
        isOverride,
        dashlessName: props.name.replace(/-/g, ''),
        underscoreName: props.name.replace(/-/g, '_'),
        spacedName: props.name.replace(/-/g, ' '),
        camelCaseName: camelCase(props.name),
        blockNamespace: `acf/${props.name}`,
        keywordsJson: JSON.stringify(Array.isArray(props.keywords) ? props.keywords : [props.keywords]),
        icon: props.icon === 'other' ? props.customIcon : props.icon,
      };

      if (isOverride) {
        this.log(chalk.yellow(`\nNote: Block "${props.name}" exists in parent theme. Creating override with style/script files only.`));
      }
    });
  }

  writing() {
    const { name, isOverride, blockPath } = this.props;
    const blockDir = join(blockPath, name);

    // Files to create for a new block
    const newBlockFiles = [
      {
        templatePath: 'block.json',
        destinationPath: join(blockDir, 'block.json'),
      },
      {
        templatePath: 'block.twig',
        destinationPath: join(blockDir, 'block.twig'),
      },
      {
        templatePath: 'index.js',
        destinationPath: join(blockDir, 'index.js'),
      },
      {
        templatePath: 'index.scss',
        destinationPath: join(blockDir, 'index.scss'),
      },
      {
        templatePath: 'index.css',
        destinationPath: join(blockDir, 'index.css'),
      },
      {
        templatePath: 'script.js',
        destinationPath: join(blockDir, 'script.js'),
      },
      {
        templatePath: 'style.scss',
        destinationPath: join(blockDir, 'style.scss'),
      },
      {
        templatePath: 'style.css',
        destinationPath: join(blockDir, 'style.css'),
      },
      {
        templatePath: 'view.js',
        destinationPath: join(blockDir, 'view.js'),
      },
    ];

    // Files to create for an override (child theme overriding parent block)
    const overrideFiles = [
      {
        templatePath: 'index.js',
        destinationPath: join(blockDir, 'index.js'),
      },
      {
        templatePath: 'index.scss',
        destinationPath: join(blockDir, 'index.scss'),
      },
      {
        templatePath: 'index.css',
        destinationPath: join(blockDir, 'index.css'),
      },
      {
        templatePath: 'script.js',
        destinationPath: join(blockDir, 'script.js'),
      },
      {
        templatePath: 'style.scss',
        destinationPath: join(blockDir, 'style.scss'),
      },
      {
        templatePath: 'style.css',
        destinationPath: join(blockDir, 'style.css'),
      },
    ];

    const filesToCreate = isOverride ? overrideFiles : newBlockFiles;

    filesToCreate.forEach(file => {
      this.fs.copyTpl(
        this.templatePath(file.templatePath),
        this.destinationPath(file.destinationPath),
        this.props
      );
    });

    const blockType = isOverride ? 'override block' : 'block';
    this.log(
      `\n${chalk.green('✓')} Your new ${blockType} ${chalk.cyan(name)} has been created at:\n  ${chalk.gray(blockDir)}\n`
    );
  }
};
