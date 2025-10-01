/**
 * Table Block - Frontend JavaScript
 *
 * Frontend JavaScript for table block functionality
 */

document.addEventListener('DOMContentLoaded', function() {
  // Add any frontend table functionality here
  // For example: sortable columns, filtering, etc.

  const tables = document.querySelectorAll('.wp-block-acf-table table');

  tables.forEach(table => {
    // Example: Add a class for enhanced styling
    table.classList.add('table-enhanced');

    // Add any table-specific JavaScript functionality here
  });
});