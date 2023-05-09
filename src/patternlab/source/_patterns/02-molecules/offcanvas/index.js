/**
 * offcanvas
 */

import $ from 'jquery';

// Module styles
import './_offcanvas.scss';

export const name = 'offcanvas';

const offcanvasEnable = () => {
  // Find our component within the DOM
  const $offcanvas = $('.offcanvas');

  // Bail if component does not exist
  if (!$offcanvas.length) {
    return;
  }

  // An example of what could be done with this component
  $offcanvas.map((i, offcanvas)=> {
    $(offcanvas).addClass('js-offcanvas-exists');
    return $offcanvas;
  });
};

$(document).ready(() => {
  offcanvasEnable();
});

export default offcanvasEnable;
