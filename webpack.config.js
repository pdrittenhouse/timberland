const ESLintPlugin = require('eslint-webpack-plugin');
const StylelintPlugin = require('stylelint-webpack-plugin');
const postcssPresetEnv = require('postcss-preset-env');
const cssnano = require('cssnano');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const PostCSSAssetsPlugin = require('postcss-assets-webpack-plugin');
const mqpacker = require('mqpacker');
const sassExportData = require('@theme-tools/sass-export-data');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
const FileManagerPlugin = require('filemanager-webpack-plugin');
const { ProgressPlugin, ProvidePlugin } = require('webpack');
const paths = require('./paths');

module.exports = {
  entry: {
    dream: [`${paths.src}/index.js`],
    admin: [`${paths.src}/admin.js`],
    editor: [`${paths.src}/editor.js`],
  },
  output: {
    path: paths.build,
    filename: 'js/[name].bundle.js',
    //publicPath: '/dist/wp/',
    publicPath: '/wp-content/themes/timberland/dist/wp/',
  },
  module: {
    rules: [
      // JavaScript
      {
        test: /\.js$/,
        exclude: [
          /(node_modules|vendor|wp-admin|wp-includes|plugins|twentyfifteen|twentysixteen|twentyseventeen|twentynineteen|libs|bundle|dist)/,
        ],
        use: {
          loader: 'babel-loader',
          options: {
            babelrc: false,
            presets: [
              ['@babel/preset-env', { modules: false }],
              '@babel/preset-react',
            ],
          },
        },
      },
      // Images
      {
        test: /\.(?:ico|gif|png|jpg|jpeg|svg)$/i,
        exclude: [/(fonts|svg\/svg)/, '/node_modules/@fortawesome/'],
        type: 'asset/resource',
        generator: {
          filename: 'img/[name][ext][query]',
        },
      },
      // Fonts
      {
        test: /\.(woff(2)?|eot|ttf|otf|svg?)(\?[a-z0-9]+)?$/,
        exclude: [/(img|svg\/svg)/],
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext][query]',
        },
      },
      // CSS, PostCSS, and Sass
      {
        test: /\.(scss|css)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: { sourceMap: true },
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
              postcssOptions: {
                ident: 'postcss',
                plugins: [
                  postcssPresetEnv(),
                  autoprefixer({ overrideBrowserslist: 'last 2 version' }),
                  cssnano(),
                ],
              },
            },
          },
          {
            loader: 'resolve-url-loader',
            options: {
              sourceMap: true,
              keepQuery: true,
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              sassOptions: {
                // Used to generate JSON about variables like colors, fonts
                // Used for patternlab demo data
                functions: sassExportData({
                  name: 'export_data',
                  path: `${paths.plsrc}/_data/`,
                }),
                // Enable Sass to import other components via, eg:
                // `@import 01-atoms/thing/thing`
                includePaths: [`${paths.plsrc}/_patterns/`],
              },
              // ALL Sass partials should be provided with non-printing
              // variables, mixins, and functions
              additionalData: '@import "00-protons/variables";',
            },
          },
        ],
      },
    ],
  },
  plugins: [
    // Show build progress
    new ProgressPlugin({ profile: false }),
    // Provide "global" vars mapped to an actual dependency.
    // Allows e.g. jQuery plugins to assume that `window.jquery` is available
    new ProvidePlugin({
      // Bootstrap is dependant on jQuery and Popper
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      Popper: ['popper.js', 'default'],
    }),
    // Lint Javascript
    new ESLintPlugin(),
    // Lint Styles
    new StylelintPlugin(),
    // Extract CSS into separate files
    new MiniCssExtractPlugin({
      filename: 'css/[name].css',
      chunkFilename: '[id].css',
    }),
    // Manage postcss assets
    // @link https://css-tricks.com/images-in-postcss/
    new PostCSSAssetsPlugin({
      test: /\.css$/,
      log: true,
      plugins: [
        // Pack same CSS media query rules into one media query rule
        mqpacker,
      ],
    }),
    // Generate SVG Spritemap
    new SVGSpritemapPlugin(`${paths.svg}/svg/*.svg`, {
      styles: {
        keepAttributes: true,
        filename: `${paths.svg}/generated/_icons-generated.scss`,
        variables: {
          sizes: 'svgicon-sizes', // Prevent collision with Bootstrap $sizes
          variables: 'svgicon-variables',
        },
      },
      output: {
        filename: 'spritemap.svg',
        svg4everybody: true,
        svgo: true,
      },
    }),
    // Copy json data after build
    new FileManagerPlugin({
      events: {
        onEnd: {
          copy: [
            { source: `${paths.plsrc}/**/*.json`, destination: `${paths.build}/data` },
          ],
        },
      },
      runTasksInSeries: false,
    }),
  ],
};
