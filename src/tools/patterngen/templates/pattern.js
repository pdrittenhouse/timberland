/**
 * <%= spacedName %>
 */

import $ from 'jquery';

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
