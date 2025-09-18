# Table Pattern

A comprehensive table component that follows semantic HTML standards and provides full flexibility for all table-related attributes and styling.

## Features

- **Semantic HTML**: Uses proper table, thead, tbody, tfoot, th, td, and caption elements
- **Accessibility**: Full support for scope, headers, and other accessibility attributes
- **Flexibility**: Dynamic support for colspan, rowspan, and all standard HTML attributes
- **Macro-based**: Uses Twig macros for efficient rendering of dynamic content
- **Styling**: Comprehensive class and attribute support for custom styling

## Structure

The pattern can be used in two ways:

1. **Simple Mode**: Pass a `rows` array for basic tables
2. **Advanced Mode**: Use `thead`, `tbody`, and `tfoot` objects for structured tables

## Available Variables

### Table Level
- `table_classes` [array]: Classes for the table element
- `table_other_classes` [string]: Additional classes for the table
- `table_id` [string]: Unique ID for the table
- `table_attributes` [array]: Table attributes
- `table_other_attributes` [string]: Additional table attributes
- `caption` [string]: Table caption text

### Sections (thead, tbody, tfoot)
Each section supports:
- `{section}_classes` [array]: Section-specific classes
- `{section}_other_classes` [string]: Additional section classes
- `{section}_attributes` [array]: Section attributes
- `{section}_other_attributes` [string]: Additional section attributes
- `rows` [array]: Array of rows for this section

### Row Level
- `row_classes` [array]: Row classes
- `row_other_classes` [string]: Additional row classes
- `row_attributes` [array]: Row attributes
- `row_other_attributes` [string]: Additional row attributes
- `cells` [array]: Array of cells in the row

### Cell Level
- `content` [string]: Cell content
- `element` [string]: Cell element (th or td, defaults to td)
- `cell_classes` [array]: Cell classes
- `cell_other_classes` [string]: Additional cell classes
- `cell_attributes` [array]: Cell attributes
- `cell_other_attributes` [string]: Additional cell attributes
- `colspan` [number]: Cell colspan attribute
- `rowspan` [number]: Cell rowspan attribute
- `scope` [string]: Cell scope attribute (for th elements)
- `headers` [string]: Cell headers attribute

## Usage Examples

See the pattern library demo for comprehensive examples of all features.