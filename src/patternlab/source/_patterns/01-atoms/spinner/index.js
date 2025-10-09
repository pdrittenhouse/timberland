/**
 * spinner
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/spinners.scss';

// Module styles
import './_spinner.scss';

export const name = 'spinner';

const spinnerEnable = () => {
  // Find our component within the DOM
  const $spinner = $('.spinner');

  // Bail if component does not exist
  if (!$spinner.length) {
    return;
  }

  // An example of what could be done with this component
  $spinner.map((i, spinner)=> {
    $(spinner).addClass('js-spinner-exists');
    return $spinner;
  });
};

$(document).ready(() => {
  spinnerEnable();
});

export default spinnerEnable;
