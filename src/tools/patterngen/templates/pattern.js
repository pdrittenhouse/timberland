/**
 * <%= spacedName %>
 */

import $ from 'jquery';

// Bootstrap Components:
// NOTE: Bootstrap CSS/JS is automatically loaded when this pattern is detected on a page.
// The PHP loader (bootstrap-loader.php) scans page content and enqueues components conditionally.
// For manual control in templates, use: enqueue_bootstrap_component('component-name')

<% if (hasBootstrapCss) { %>
// Bootstrap CSS components this pattern uses
<%- bootstrapCssImports %>
<% } %>

<% if (hasBootstrapJs) { %>
// Bootstrap JS
<%- bootstrapJsImports %>
<% } %>

<% if (!hasBootstrapCss && !hasBootstrapJs) { %>
// If this pattern needs Bootstrap CSS/JS, import them here:
// CSS: import '../../00-protons/printing/libs/bootstrap-components/component-name.scss';
// JS:  import ComponentName from 'bootstrap/js/src/component-name';
<% } %>
  
// Module styles
import './_<%= name %>.scss';

export const name = '<%= camelCaseName %>';

const <%= camelCaseName %>Enable = () => {
  // Find our component within the DOM
  const $<%= camelCaseName %> = $('.<%= name %>');

  // Bail if component does not exist
  if (!$<%= camelCaseName %>.length) {
    return;
  }

  // An example of what could be done with this component
  $<%= camelCaseName %>.map((i, <%= camelCaseName %>)=> {
    $(<%= camelCaseName %>).addClass('js-<%= name %>-exists');
    return $<%= camelCaseName %>;
  });
};

$(document).ready(() => {
  <%= camelCaseName %>Enable();
});

export default <%= camelCaseName %>Enable;
