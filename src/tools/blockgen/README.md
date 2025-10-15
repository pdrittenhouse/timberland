# Block Generator

A Yeoman generator for quickly scaffolding WordPress ACF blocks in Timberland themes.

## Features

- **Parent/Child Theme Support**: Automatically detects and allows selection between parent and child themes
- **Override Detection**: Identifies when creating an override for an existing parent block
- **Smart File Generation**:
  - Full block scaffolding for new blocks (8 files)
  - Override mode for child theme blocks (6 style/script files only)
- **Dynamic Theme Detection**: No hardcoded theme names - works with any parent/child theme structure
- **Interactive Prompts**: Guides you through block creation with sensible defaults

## Usage

Run the generator from the theme root directory:

```bash
npm run new:block
```

## Prompts

1. **Block Location**: Choose between parent theme or child theme
2. **Block Name**: Enter the block name (will be converted to kebab-case)
3. **Block Title**: Human-readable title (defaults to Start Case of name)
4. **Description**: Brief description of the block
5. **Category**: WordPress block category (dream, text, media, design, widgets, theme, embed)
6. **Keywords**: Comma-separated keywords for block search

## File Structure

### New Block (all files)
```
block-name/
├── block.json          # Block registration and configuration
├── block.twig          # Block template
├── index.js            # Editor scripts
├── index.scss          # Editor styles (source)
├── index.css           # Editor styles (compiled)
├── script.js           # Frontend scripts
├── style.scss          # Frontend styles (source)
└── style.css           # Frontend styles (compiled)
```

### Override Block (styles/scripts only)
```
block-name/
├── index.js            # Editor scripts override
├── index.scss          # Editor styles override
├── index.css           # Editor styles override
├── script.js           # Frontend scripts override
├── style.scss          # Frontend styles override
└── style.css           # Frontend styles override
```

## Examples

### Creating a New Block in Parent Theme
```bash
npm run new:block
# Select: timberland (parent theme)
# Name: feature-grid
# Title: Feature Grid
# Description: A grid of feature items
# Category: dream
# Keywords: grid, features
```

### Creating a Child Theme Override
```bash
npm run new:block
# Select: timberland-child (child theme)
# Name: hero (matches parent block name)
# Generator detects override and creates style/script files only
```

## Template Variables

The following variables are available in template files:

- `<%= name %>` - Kebab-case block name
- `<%= title %>` - Human-readable title
- `<%= description %>` - Block description
- `<%= category %>` - Block category
- `<%= blockNamespace %>` - Full block namespace (acf/block-name)
- `<%= keywordsJson %>` - JSON-encoded keywords array
- `<%= dashlessName %>` - Name without dashes
- `<%= underscoreName %>` - Name with underscores
- `<%= spacedName %>` - Name with spaces
- `<%= camelCaseName %>` - camelCase version of name

## Notes

- The generator automatically detects parent/child theme structure
- Theme names are never hardcoded - works with any theme naming convention
- Override detection checks parent theme blocks directory
- All generated files include helpful comments indicating their purpose
- Block JSON follows WordPress block API v2 standards with ACF integration
