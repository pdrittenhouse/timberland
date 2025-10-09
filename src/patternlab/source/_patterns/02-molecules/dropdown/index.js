/**
 * dropdown
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/dropdown.scss';

// Bootstrap JS
// eslint-disable-next-line no-unused-vars
import Dropdown from 'bootstrap/js/src/dropdown';

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
