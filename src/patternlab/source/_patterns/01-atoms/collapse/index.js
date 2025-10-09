/**
 * collapse
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/accordion.scss';  // Collapse styles are part of accordion

// Bootstrap JS
// eslint-disable-next-line no-unused-vars
import Collapse from 'bootstrap/js/src/collapse';

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
