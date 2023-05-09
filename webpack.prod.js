const { merge } = require('webpack-merge');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
// const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const FileManagerPlugin = require('filemanager-webpack-plugin');
const common = require('./webpack.config.js');

module.exports = merge(common, {
  // Set the mode to production
  mode: 'production',
  // Disable source maps
  devtool: false,
  optimization: {
    minimize: true,
    minimizer: [new CssMinimizerPlugin(), '...'],
    // Once your build outputs multiple chunks, this option will ensure they share the webpack runtime
    // instead of having their own. This also helps with long-term caching, since the chunks will only
    // change when actual code changes, not the webpack runtime.
    // runtimeChunk: {
    //   name: 'runtime',
    // },
  },
  performance: {
    hints: false,
    maxEntrypointSize: 512000,
    maxAssetSize: 512000,
  },
  plugins: [
    // Remove files before build
    new FileManagerPlugin({
      events: {
        onStart: {
          delete: ['./dist/'],
        },
      },
      runTasksInSeries: false,
    }),
    // Clean build folders and unused assets when rebuilding
    new CleanWebpackPlugin({
      verbose: true,
    }),
    // Optimize images
    // new ImageMinimizerPlugin({
    //   minimizerOptions: {
    //     // Lossless optimization with custom option
    //     // Feel free to experiment with options for better result for you
    //     plugins: [
    //       ['gifsicle', { interlaced: true }],
    //       ['jpegtran', { progressive: true }],
    //       ['optipng', { optimizationLevel: 5 }],
    //       [
    //         'svgo',
    //         {
    //           plugins: [
    //             {
    //               removeViewBox: false,
    //             },
    //           ],
    //         },
    //       ],
    //     ],
    //   },
    // }),
  ],
});
