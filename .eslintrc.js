/**
 * Rule reference: http://eslint.org/docs/rules
 * Individual rule reference: http://eslint.org/docs/rules/NAME-OF-RULE
 */

module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  parser: "babel-eslint",
  extends: [
    "eslint:recommended",
    'plugin:jest/recommended',
    "plugin:@wordpress/eslint-plugin/recommended",
  ],
  parserOptions: {
    ecmaVersion: 12,
    sourceType: 'module',
  },
  plugins: ['prettier'],
  root: true,
  globals: {
    jQuery: true,
    _: true,
    google: false
  },
  ignorePatterns: [
    'node_modules/',
    '**/vendor/*.js',
    '**/wp-content/plugins/**',
    '**/tools/patterngen/**',
  ],
  rules: {
    "prettier/prettier": "warn",
    'no-console': [0], // turned off for now while we are console.logging everywhere.
    'import/no-unresolved': 'off',
    'no-underscore-dangle': 'off',
    "camelcase": ["warn", { "allow": ["element_id"] }],
  },
};
