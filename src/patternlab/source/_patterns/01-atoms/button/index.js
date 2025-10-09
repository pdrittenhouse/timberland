/**
 * button
 */

import $ from 'jquery';

// Module styles
import './_button.scss';

// Bootstrap components
import '../../00-protons/printing/libs/bootstrap-components/buttons.scss';
import '../../00-protons/printing/libs/bootstrap-components/tooltip.scss';
import '../../00-protons/printing/libs/bootstrap-components/popover.scss';

// Bootstrap JS
// eslint-disable-next-line no-unused-vars
import Button from 'bootstrap/js/src/button';
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

// Initialize tooltips
const initTooltips = () => {
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(tooltipTriggerEl => new Tooltip(tooltipTriggerEl));
};

// Initialize popovers
const initPopovers = () => {
  const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  popoverTriggerList.map(popoverTriggerEl => new Popover(popoverTriggerEl));
};

$(document).ready(() => {
  buttonEnable();
  initTooltips();
  initPopovers();
});

export default buttonEnable;
