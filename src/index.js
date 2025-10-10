// Import Javascript
function importScripts(r) {
  r.keys().forEach(r);
}

// OLD: Import all patterns into main bundle (commented out to enable pattern splitting)
// importScripts(require.context('./patternlab/source/_patterns/', true, /index\.js$/));

// NEW: Only import protons (global styles/scripts)
// Patterns (atoms, molecules, organisms, templates, pages) are now loaded conditionally
// Each pattern is built as a separate webpack entry point (see webpack.config.js lines 26-46)
// pattern-loader.php enqueues only the patterns needed for each page
importScripts(require.context('./patternlab/source/_patterns/00-protons/', true, /index\.js$/));

// Import Images
function importImages(r) {
  r.keys().forEach(r);
}
importImages(
  require.context(
    './patternlab/source/_patterns/00-protons/img/',
    true,
    /\.(?:ico|gif|png|jpg|jpeg|svg)$/i
  )
);

// Import Fonts
function importFonts(r) {
  r.keys().forEach(r);
}
importFonts(
  require.context(
    './patternlab/source/_patterns/00-protons/fonts/',
    true,
    /\.(woff(2)?|eot|ttf|otf|svg|)$/
  )
);
