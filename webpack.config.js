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
const BootstrapManifestPlugin = require('./webpack-plugins/BootstrapManifestPlugin');
const PatternManifestPlugin = require('./webpack-plugins/PatternManifestPlugin');
const path = require('path');
const { ProgressPlugin, ProvidePlugin } = require('webpack');
// const BundleAnalyzerPlugin = require("webpack-bundle-analyzer").BundleAnalyzerPlugin;
const paths = require('./paths');
// const os = require('os');
const fs = require('fs');
const glob = require('glob');
// const crypto = require('crypto');

// Dynamically generate pattern entries BEFORE config export
// This ensures all entry points exist before webpack processes them
const patternEntries = {};
const patternFiles = glob.sync(`${paths.patterns}/0[1-5]-*/*/index.js`);

console.log(`[Pattern Entries] Found ${patternFiles.length} patterns`);

patternFiles.forEach(filePath => {
  // Extract pattern info from path
  // Example: /path/to/02-molecules/card/index.js -> molecules/card
  const match = filePath.match(/0[1-5]-(atoms|molecules|organisms|templates|pages)\/([^\/]+)\/index\.js$/);

  if (match && match[1] && match[2]) {
    const level = match[1]; // atoms, molecules, organisms, templates, pages
    const patternName = match[2]; // card, button, etc.
    const entryName = `patterns/${level}/${patternName}`;

    // Add as entry point (wrap in array to match webpack entry format)
    patternEntries[entryName] = [filePath];

    console.log(`[Pattern Entries] Added entry: ${entryName}`);
  }
});

// Dynamically generate block SCSS entries
// Compile block SCSS files and output them back to source directories
const blockScssEntries = {};
const blockScssFiles = glob.sync('./src/templates/blocks/**/style.scss');

// Filter out hidden directories (like .block template)
const filteredBlockScssFiles = blockScssFiles.filter(filePath => !filePath.includes('/.'));

console.log(`[Block SCSS] Found ${filteredBlockScssFiles.length} block SCSS files`);

filteredBlockScssFiles.forEach(filePath => {
  // Extract block name from path
  const match = filePath.match(/blocks\/([^\/]+)\/style\.scss$/);
  if (match && match[1]) {
    const blockName = match[1];
    const entryName = `blocks/${blockName}/style`;
    blockScssEntries[entryName] = [filePath];
    console.log(`[Block SCSS] Added entry: ${entryName}`);
  }
});

module.exports = {
  entry: {
    dream: [`${paths.src}/index.js`],
    admin: [`${paths.src}/admin.js`],
    editor: [`${paths.src}/editor.js`],
    ...patternEntries, // Add all pattern entries
    ...blockScssEntries, // Add all block SCSS entries
  },
  output: {
    path: paths.build,
    filename: 'js/[name].bundle.js',
    //publicPath: '/dist/wp/',
    publicPath: `/wp-content/themes/${path.basename(__dirname)}/dist/wp/`,
  },
  module: {
    rules: [
      // JavaScript
      {
        test: /\.js$/,
        exclude: [
          /(node_modules|vendor|wp-admin|wp-includes|plugins|twentyfifteen|twentysixteen|twentyseventeen|twentynineteen|libs|bundle|dist)/,
        ],
        use: [
          {
            loader: 'babel-loader',
            options: {
              babelrc: false,
              presets: [
                ['@babel/preset-env', { modules: false }],
                '@babel/preset-react',
              ],
            },
          },
        ],
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
                  cssnano({
                    preset: [
                      'default', {
                        discardDuplicates: true,
                        discardComments: {
                          removeAll: true
                        }
                      }
                    ]
                  }),
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
      chunkFilename: 'css/[name].css',
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
    // Spritemap with caching
    // (() => {
    //   // Calculate file hash helper function
    //   function calculateFileHash(directoryPath) {
    //     const files = fs.readdirSync(directoryPath);
    //     const hash = crypto.createHash('sha256');

    //     files.forEach(file => {
    //         const filePath = `${directoryPath}/${file}`;
    //         const stats = fs.statSync(filePath);

    //         if (stats.isFile()) {
    //             const fileContent = fs.readFileSync(filePath);
    //             hash.update(fileContent);
    //         }
    //     });

    //     return hash.digest('hex');
    //   }

    //   if (!fs.existsSync(`${paths.cache}/svg/spritemap.svg`)) {
    //     // Generate the spritemap only if it doesn't exist
    //     return new SVGSpritemapPlugin(`${paths.svg}/svg/*.svg`, {
    //       styles: {
    //         keepAttributes: true,
    //         filename: `${paths.svg}/generated/_icons-generated.scss`,
    //         variables: {
    //           sizes: 'svgicon-sizes', // Prevent collision with Bootstrap $sizes
    //           variables: 'svgicon-variables',
    //         },
    //       },
    //       output: {
    //         filename: 'spritemap.svg',
    //         svg4everybody: true,
    //         svgo: true,
    //       },
    //     });
    //   } else {
    //     // Check if any new SVG files have been added since the last build
    //     const storedHashPath = `${paths.cache}/svg/.svgHash`;
    //     const currentHash = calculateFileHash(`${paths.svg}/svg/`);
    //     let previousHash = '';

    //     // Read the stored hash from the file if it exists
    //     if (fs.existsSync(storedHashPath)) {
    //       previousHash = fs.readFileSync(storedHashPath, 'utf8');
    //     }

    //     // Save current hash
    //     try {
    //       fs.writeFileSync(storedHashPath, currentHash);
    //     } catch (error) {
    //       console.error('Error writing hash file:', error);
    //     }

    //     // Compare the current hash with the stored hash
    //     if (currentHash !== previousHash) {
    //       // If there are differences, regenerate the spritemap and update the stored hash
    //       return new SVGSpritemapPlugin(`${paths.svg}/svg/*.svg`, {
    //         styles: {
    //           keepAttributes: true,
    //           filename: `${paths.svg}/generated/_icons-generated.scss`,
    //           variables: {
    //             sizes: 'svgicon-sizes', // Prevent collision with Bootstrap $sizes
    //             variables: 'svgicon-variables',
    //           },
    //         },
    //         output: {
    //           filename: 'spritemap.svg',
    //           svg4everybody: true,
    //           svgo: true,
    //         },
    //       });

    //     } else {
    //       // TODO: Fix this
    //       // Write the spritemap.svg file to the build folder
    //       const spritemapContent = fs.readFileSync(`${paths.cache}/svg/spritemap.svg`, 'utf8');
    //       fs.writeFileSync(`${paths.build}/spritemap.svg`, spritemapContent);
    //     }
    //   }
    // })(),
    // Copy files after build
    new FileManagerPlugin({
      events: {
        onEnd: {
          copy: [
            { source: `${paths.plsrc}/**/*.json`, destination: `${paths.build}/data` }, // Copy JSON data
            { source: `${paths.build}/spritemap.svg`, destination: `${paths.cache}/svg/`}, // Copy spritemap.svg to cache
            // Copy compiled block CSS files back to source directories
            ...Object.keys(blockScssEntries).map(entryName => {
              const blockName = entryName.replace('blocks/', '').replace('/style', '');
              return {
                source: `${paths.build}/css/blocks/${blockName}/style.css`,
                destination: `./src/templates/blocks/${blockName}/`
              };
            }),
          ],
        },
      },
      runTasksInSeries: false,
    }),
    // Generate Bootstrap component manifest
    new BootstrapManifestPlugin({
      patternsPath: paths.patterns,
      blocksPath: path.resolve(__dirname, 'src/templates/blocks'),
      outputPath: 'bootstrap-manifest.json'
    }),
    // Generate Pattern dependencies manifest
    new PatternManifestPlugin({
      patternsPath: paths.patterns,
      blocksPath: path.resolve(__dirname, 'src/templates/blocks'),
      templatesPath: path.resolve(__dirname, 'src/templates'),
      outputPath: 'pattern-manifest.json'
    }),
    // new BundleAnalyzerPlugin(),
  ],
  optimization: {
    usedExports: true, // Enable tree shaking
    concatenateModules: true, // Concatenate modules | REMOVE IF PROBLEMS OCCUR
    minimize: true, // minify

    // Split Bootstrap CSS into separate files for conditional loading
    splitChunks: {
      cacheGroups: {
        // Extract critical Bootstrap into separate file
        bootstrapCritical: {
          test: /_bootstrap-critical\.scss$/,
          name: 'bootstrap/critical',
          chunks: 'all',
          enforce: true,
          priority: 30
        },

        // Extract individual Bootstrap component wrapper files
        bootstrapComponents: {
          // Match wrapper files in bootstrap-components directory
          test: /[\\/]bootstrap-components[\\/]([a-z-]+)\.scss$/,
          name(module, chunks, cacheGroupKey) {
            // Extract component name from the module identifier
            const moduleId = module.identifier();
            const match = moduleId.match(/bootstrap-components[\\/]([a-z-]+)\.scss/);
            if (match && match[1]) {
              return `bootstrap/${match[1]}`;
            }
            return 'bootstrap/unknown';
          },
          chunks: 'all',
          enforce: true,
          priority: 20,
          reuseExistingChunk: false // Don't merge with existing chunks
        },

        // Extract individual Bootstrap JS components
        bootstrapJs: {
          test: /[\\/]node_modules[\\/]bootstrap[\\/]js[\\/]dist[\\/]([a-z-]+)\.js$/,
          name(module) {
            // Extract component name from the module identifier
            const moduleId = module.identifier();
            const match = moduleId.match(/bootstrap[\\/]js[\\/]dist[\\/]([a-z-]+)\.js/);
            if (match && match[1]) {
              return `bootstrap/${match[1]}`;
            }
            return 'bootstrap/unknown';
          },
          chunks: 'all',
          enforce: true,
          priority: 25,
          reuseExistingChunk: false
        },

        // NOTE: Pattern CSS/JS splitting removed
        // Patterns are now separate webpack entry points (see lines 26-46)
        // Each pattern gets its own bundle automatically via the entry configuration
      }
    }
  },
  // performance: {
  //   hints: "warning", // "error" or false are also valid options
  //   maxEntrypointSize: 1500000, // Set the maximum size for entry points
  //   maxAssetSize: 1500000, // Set the maximum size for individual assets
  // },
  cache: {
    // Configuration for caching
    type: 'filesystem', // Specify the type of caching mechanism
    cacheDirectory: `${paths.cache}/.webpack-cache`,
    buildDependencies: {
      // Add dependencies for caching (optional)
      config: [
        __filename,
        'webpack.prod.js',
        'webpack.dev.js',
      ],
    },
  },
};
