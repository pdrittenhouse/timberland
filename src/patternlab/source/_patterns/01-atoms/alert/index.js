/**
 * alert
 */
import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/alert.scss';
import '../../00-protons/printing/libs/bootstrap-components/close.scss';  // For dismissible alerts

// Bootstrap JS
// eslint-disable-next-line no-unused-vars
import Alert from 'bootstrap/js/src/alert';

// Module styles
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
