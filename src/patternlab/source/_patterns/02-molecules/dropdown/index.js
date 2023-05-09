/**
 * dropdown
 */

import $ from 'jquery';

// Module styles
import './_dropdown.scss';

export const name = 'dropdown';

const dropdownEnable = () => {
  // Find our component within the DOM
  const $dropdown = $('.dropdown');

  // Bail if component does not exist
  if (!$dropdown.length) {
    return;
  }

  // An example of what could be done with this component
  $dropdown.map((i, dropdown)=> {
    $(dropdown).addClass('js-dropdown-exists');
    return $dropdown;
  });
};

$(document).ready(() => {
  dropdownEnable();
});

export default dropdownEnable;
