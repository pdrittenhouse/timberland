// Import Javascript
function importScripts(r) {
  r.keys().forEach(r);
}
importScripts(require.context('./patternlab/source/_patterns/', true, /index\.js$/));

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
