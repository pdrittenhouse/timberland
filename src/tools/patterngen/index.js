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

module.exports = class extends Generator {
  prompting() {
    // Have Yeoman greet the user.
    this.log(
      yosay(`Welcome to the ${chalk.red('Pattern Generator')}! This will help you build a component folder with assets.
      Templates for this are in: ${chalk.red(relative(process.cwd(), __dirname))}`)
    );

    const patternFeatures = ['twig', 'tpl', 'scss', 'demo', 'js', 'json', 'md', 'img'];

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
    ];

    return this.prompt(prompts).then(props => {
      // To access props later use this.props.someAnswer;
      this.props = {
        ...props,
        dashlessName: props.name.replace(/-/g, ''),
        underscoreName: props.name.replace(/-/g, '_'),
        spacedName: props.name.replace(/-/g, ' '),
        camelCaseName: camelCase(props.name),
        cleanPatternType: props.patternType.replace(/([0-9])\w+-/g, ''),
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
