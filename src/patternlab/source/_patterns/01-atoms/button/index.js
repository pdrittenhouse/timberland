/**
 * button
 */

import $ from 'jquery';

// Module styles
import './_button.scss';

import Tooltip from 'bootstrap/js/src/tooltip';
import Popover from 'bootstrap/js/src/popover';

export const name = 'button';

const buttonEnable = () => {
  // Find our component within the DOM
  const $button = $('.button');

  // Bail if component does not exist
  if (!$button.length) {
    return;
  }

  // An example of what could be done with this component
  $button.map((i, button)=> {
    $(button).addClass('js-button-exists');
    return $button;
  });
};

const tooltips = () => {
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  // eslint-disable-next-line no-unused-vars, no-undef
  const tooltipList = tooltipTriggerList.map(tooltipTriggerEl => {
    return new Tooltip(tooltipTriggerEl);
  });
}

const popovers = () => {
  const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  // eslint-disable-next-line no-unused-vars, no-undef
  const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new Popover(popoverTriggerEl);
  })
}


$(document).ready(() => {
  buttonEnable();
  tooltips();
  popovers();
});

export default buttonEnable;
