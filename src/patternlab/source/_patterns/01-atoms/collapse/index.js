/**
 * collapse
 */

import $ from 'jquery';

// Module styles
import './_collapse.scss';

export const name = 'collapse';

const collapseEnable = () => {
  // Find our component within the DOM
  const $collapse = $('.collapse');

  // Bail if component does not exist
  if (!$collapse.length) {
    return;
  }

  // An example of what could be done with this component
  $collapse.map((i, collapse)=> {
    $(collapse).addClass('js-collapse-exists');
    return $collapse;
  });
};

$(document).ready(() => {
  collapseEnable();
});

export default collapseEnable;
