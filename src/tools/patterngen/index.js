'use strict';
const Generator = require('yeoman-generator');
const chalk = require('chalk');
const yosay = require('yosay');

const { join, relative } = require('path');
const { readdirSync, statSync } = require('fs');
const { camelCase } = require('lodash');

// let { plsrc: componentPath } = require('../../../../../../../paths');
// let componentPath = '../../patternlab/source/';
let componentPath = './src/patternlab/source/';

// Paths to Bootstrap components
const bootstrapCssPath = './src/patternlab/source/_patterns/00-protons/printing/libs/bootstrap-components';
const bootstrapJsPath = './node_modules/bootstrap/js/src';

module.exports = class extends Generator {
  prompting() {
    // Have Yeoman greet the user.
    this.log(
      yosay(`Welcome to the ${chalk.red('Pattern Generator')}! This will help you build a component folder with assets.
      Templates for this are in: ${chalk.red(relative(process.cwd(), __dirname))}`)
    );

    const patternFeatures = ['twig', 'tpl', 'scss', 'demo', 'js', 'json', 'md', 'img'];

    // Helper function to get available Bootstrap CSS components
    const getBootstrapCssComponents = () => {
      try {
        return readdirSync(bootstrapCssPath, 'utf8')
          .filter(file => file.endsWith('.scss'))
          .map(file => file.replace('.scss', ''))
          .sort();
      } catch (error) {
        this.log(chalk.yellow('Warning: Could not read Bootstrap CSS components directory'));
        return [];
      }
    };

    // Helper function to get available Bootstrap JS components
    const getBootstrapJsComponents = () => {
      try {
        return readdirSync(bootstrapJsPath, 'utf8')
          .filter(file => file.endsWith('.js') && file !== 'index.js' && file !== 'base-component.js')
          .map(file => file.replace('.js', ''))
          .sort();
      } catch (error) {
        this.log(chalk.yellow('Warning: Could not read Bootstrap JS components directory'));
        return [];
      }
    };

    const prompts = [
      {
        type: 'list',
        name: 'patternType',
        message: 'Where would you like this new component?',
        choices() {
          componentPath = join(componentPath, '_patterns');
          return readdirSync(componentPath, 'utf8').filter(folder =>
            statSync(join(componentPath, folder)).isDirectory()
          );
        },
      },
      {
        type: 'list',
        name: 'patternSubType',
        message: 'Where in here?',
        choices(answers) {
          componentPath = join(componentPath, answers.patternType);
          const subfolders = readdirSync(componentPath, 'utf8').filter(folder =>
            statSync(join(componentPath, folder)).isDirectory()
          );
          return ['./'].concat(subfolders);
        },
      },
      {
        type: 'checkbox',
        name: 'files',
        message: 'What files would you like in there?',
        choices: patternFeatures,
        default: patternFeatures,
      },
      {
        name: 'name',
        message: 'What shall we name it?',
        filter(answer) {
          return answer.replace(/ /g, '-').toLowerCase();
        },
      },
      {
        type: 'checkbox',
        name: 'bootstrapCss',
        message: 'Which Bootstrap CSS components does this pattern use?',
        choices: getBootstrapCssComponents,
        default: [],
      },
      {
        type: 'checkbox',
        name: 'bootstrapJs',
        message: 'Which Bootstrap JS components does this pattern use?',
        choices: getBootstrapJsComponents,
        default: [],
      },
    ];

    return this.prompt(prompts).then(props => {
      // Helper to generate relative path to bootstrap-components based on pattern location
      const getBootstrapCssPath = (patternType) => {
        const depth = patternType.match(/^\d+-/g) ? 2 : 1; // Check if it starts with number (e.g., "01-atoms")
        return '../'.repeat(depth) + '00-protons/printing/libs/bootstrap-components';
      };

      // Helper to convert bootstrap component name to proper JS class name
      const getJsClassName = (component) => {
        // Convert kebab-case to PascalCase (e.g., 'scroll-spy' -> 'Scrollspy')
        return component
          .split('-')
          .map((word, index) => {
            // Special case: 'scrollspy' should be 'Scrollspy' not 'ScrollSpy'
            if (component === 'scrollspy') return index === 0 ? 'Scrollspy' : word;
            return word.charAt(0).toUpperCase() + word.slice(1);
          })
          .join('');
      };

      // To access props later use this.props.someAnswer;
      this.props = {
        ...props,
        dashlessName: props.name.replace(/-/g, ''),
        underscoreName: props.name.replace(/-/g, '_'),
        spacedName: props.name.replace(/-/g, ' '),
        camelCaseName: camelCase(props.name),
        cleanPatternType: props.patternType.replace(/([0-9])\w+-/g, ''),
        bootstrapCssPath: getBootstrapCssPath(props.patternType),
        // Generate import statements for templates
        bootstrapCssImports: props.bootstrapCss.map(component =>
          `import '${getBootstrapCssPath(props.patternType)}/${component}.scss';`
        ).join('\n'),
        bootstrapJsImports: props.bootstrapJs.map(component =>
          `// eslint-disable-next-line no-unused-vars\nimport ${getJsClassName(component)} from 'bootstrap/js/src/${component}';`
        ).join('\n'),
        hasBootstrapCss: props.bootstrapCss.length > 0,
        hasBootstrapJs: props.bootstrapJs.length > 0,
      };
    });
  }

  writing() {
    const { files, patternSubType, name } = this.props;

    componentPath = join(componentPath, patternSubType, name);

    /*
     * generatorAssets has a key for each file type that Particle creates.
     * Each of those is an array of objects, each of which must contain
     * the properties templatePath and destinationPath. These arrays are
     * looped over in the function below. The array pattern is necessary
     * to accommodate the varying number of files generated for each type.
     */
    const generatorAssets = {
      scss: [
        {
          templatePath: '_pattern.scss',
          destinationPath: join(componentPath, `_${name}.scss`),
        },
      ],
      demo: [
        {
          templatePath: '_demo.scss',
          destinationPath: join(componentPath, `_demo.scss`),
        },
      ],
      tpl: [
        {
          templatePath: '_pattern.tpl.twig',
          destinationPath: join(componentPath, `_${name}.tpl.twig`),
        },
      ],
      twig: [
        {
          templatePath: 'pattern.twig',
          destinationPath: join(componentPath, `${name}.twig`),
        },
      ],
      js: [
        {
          templatePath: 'pattern.js',
          destinationPath: join(componentPath, 'index.js'),
        },
      ],
      json: [
        {
          templatePath: 'pattern.json',
          destinationPath: join(componentPath, `${name}.json`),
        },
      ],
      md: [
        {
          templatePath: 'pattern.md',
          destinationPath: join(componentPath, `${name}.md`),
        },
      ],
      img: [
        {
          templatePath: '.img-pattern',
          destinationPath: join(componentPath, 'img', '.gitkeep'),
        },
      ],
    };

    /* Loop over all the selected files and populate the template according to
     * the pattern structure in generatorAssets.
     */
    files.forEach(fileType => {
      generatorAssets[fileType].forEach(file => {
        this.fs.copyTpl(
          this.templatePath(file.templatePath),
          this.destinationPath(file.destinationPath),
          this.props
        );
      });
    });

    this.log(
      `Your new component ${name} is being created. It should be available in your bundle!`
    );
  }
};
