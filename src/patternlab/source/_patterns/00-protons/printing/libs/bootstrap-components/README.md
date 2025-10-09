# Bootstrap Component Wrappers

This directory contains wrapper SCSS files that allow JavaScript imports of Bootstrap components.

## Why These Wrappers Exist

Bootstrap SCSS files are "partials" (prefixed with `_`, like `_alert.scss`). When importing from JavaScript:

- ❌ `import '~bootstrap/scss/alert'` - Webpack can't resolve SCSS partials
- ❌ `import '~bootstrap/scss/_alert.scss'` - Webpack looks for literal filename, doesn't understand Sass partials
- ✅ `import '../../00-protons/printing/libs/bootstrap-components/alert.scss'` - Works!

## How It Works

Each wrapper file is a simple SCSS file that uses `@import` to load the Bootstrap partial:

```scss
// alert.scss
@import "~bootstrap/scss/alert";
```

The `@import` statement is processed by sass-loader, which understands Sass partial resolution.
The wrapper file itself (without underscore) can be imported from JavaScript using relative paths.

## Usage in Patterns

When creating or updating patterns that use Bootstrap components:

```javascript
// CORRECT ORDER: Bootstrap first, then pattern styles
// This ensures pattern styles can override Bootstrap defaults

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/alert.scss';
import '../../00-protons/printing/libs/bootstrap-components/close.scss';

// Module styles (these override Bootstrap)
import './_alert.scss';
```

## Available Components

- `accordion.scss` - Bootstrap Accordion
- `alert.scss` - Bootstrap Alert
- `badge.scss` - Bootstrap Badge
- `breadcrumb.scss` - Bootstrap Breadcrumb
- `button-group.scss` - Bootstrap Button Group
- `card.scss` - Bootstrap Card
- `carousel.scss` - Bootstrap Carousel
- `close.scss` - Bootstrap Close Button
- `dropdown.scss` - Bootstrap Dropdown
- `forms.scss` - Bootstrap Forms
- `list-group.scss` - Bootstrap List Group
- `modal.scss` - Bootstrap Modal
- `nav.scss` - Bootstrap Nav
- `navbar.scss` - Bootstrap Navbar
- `offcanvas.scss` - Bootstrap Offcanvas
- `pagination.scss` - Bootstrap Pagination
- `progress.scss` - Bootstrap Progress
- `spinners.scss` - Bootstrap Spinners
- `tables.scss` - Bootstrap Tables
- `toast.scss` - Bootstrap Toast

## Adding New Components

If you need a Bootstrap component that doesn't have a wrapper yet:

1. Create a new `.scss` file in this directory (e.g., `tooltip.scss`)
2. Add the import: `@import "~bootstrap/scss/tooltip";`
3. Import it in your pattern: `import '../../00-protons/printing/libs/bootstrap-components/tooltip.scss';`

## Build Process

These wrapper files are processed by webpack's sass-loader and split into individual CSS files via the `splitChunks` configuration. Only the Bootstrap components actually imported by patterns are included in the build output.

See `BOOTSTRAP-SPLITTING-PLAN.md` for the complete implementation details.
