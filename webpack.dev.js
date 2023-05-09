const { merge } = require('webpack-merge');
const webpack = require('webpack');
const { exec } = require('child_process');
const path = require('path');
const paths = require('./paths');
const common = require('./webpack.config.js');

module.exports = merge(common, {
  // Set the mode to development
  mode: 'development',
  // Control how source maps are generated
  devtool: 'inline-source-map',
  // Spin up a server for quick development
  devServer: {
    publicPath: paths.public,
    contentBase: './dist/pl',
    open: true,
    compress: true,
    hot: true,
    port: 8008,
    watchOptions: {
      ignored: [
        path.resolve(__dirname, 'node_modules'),
        path.resolve(__dirname, 'vendor'),
        paths.build,
        `${paths.svg}/generated`,
      ],
    },
  },
  // Watch for file changes
  watch: false,
  watchOptions: {
    aggregateTimeout: 600,
    poll: 1000,
    ignored: [
      path.resolve(__dirname, 'node_modules'),
      path.resolve(__dirname, 'vendor'),
      paths.build,
      `${paths.svg}/generated`,
    ],
  },
  plugins: [
    // Only update what has changed on hot reload
    new webpack.HotModuleReplacementPlugin(),
    // Rebuild Pattern Lab files after emit
    {
      apply: (compiler) => {
        // eslint-disable-next-line no-unused-vars
        compiler.hooks.afterEmit.tap('AfterEmitPlugin', (compilation) => {
          exec(
            'npm run refresh:pl && echo "Pattern Lab assets have been regenerated."',
            (err, stdout, stderr) => {
              if (stdout) process.stdout.write(stdout);
              if (stderr) process.stderr.write(stderr);
            }
          );
        });
      },
    },
  ],
});
