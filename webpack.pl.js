const { merge } = require('webpack-merge');
const common = require('./webpack.config.js');
const paths = require('./paths');

module.exports = merge(common, {
  entry: {
    patternlab: [`${paths.plroot}/index.js`],
  },
  output: {
    path: paths.plbuild,
    filename: 'js/[name].bundle.js',
    publicPath: '/',
  },
});
