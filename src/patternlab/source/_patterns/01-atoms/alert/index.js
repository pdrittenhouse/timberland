/**
 * alert
 */
import $ from 'jquery';

import './_alert.scss';

export const name = 'alert';

const alertEnable = () => {
  // Find our component within the DOM
  const $alert = $('.alert');
  // Bail if component does not exist
  if (!$alert.length) {
    return;
  }
  // An example of what could be done with this component
  $alert.map((i, alert)=> {
    $(alert).addClass('js-alert-exists');
    return $alert;
  });
};

$(document).ready(() => {
  alertEnable();
});

export default alertEnable;
