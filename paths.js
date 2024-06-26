const path = require('path');

module.exports = {
  // Source files
  src: path.resolve(__dirname, './src'),

  // Dev (Wordpress) build files
  build: path.resolve(__dirname, './dist/wp'),

  // Build root
  prod: path.resolve(__dirname, './dist'),

  // Patternlab source files
  plsrc: path.resolve(
    __dirname,
    './src/patternlab/source'
  ),

  // Patternlab build files
  plbuild: path.resolve(
    __dirname,
    './dist/pl'
  ),

  // Patternlab root
  plroot: path.resolve(
    __dirname,
    './src/patternlab'
  ),

  // Patternlab patterns
  patterns: path.resolve(
    __dirname,
    './src/patternlab/source/_patterns'
  ),

  // Static files
  static: path.resolve(__dirname, './static'),

  // Public path
  public: path.resolve(__dirname),

  // SVG's
  svg: path.resolve(__dirname, './src/patternlab/source/_patterns/01-atoms/svg'),

  // Cache directory for loaders
  cache: path.resolve(__dirname, './.webpack-cache'),
};
