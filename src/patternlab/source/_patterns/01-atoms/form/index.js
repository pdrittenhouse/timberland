/**
 * form
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/forms.scss';

// Module styles
import './_form.scss';

export const name = 'form';

const formEnable = () => {
  // Find our component within the DOM
  const $form = $('.form');

  // Bail if component does not exist
  if (!$form.length) {
    return;
  }

  // An example of what could be done with this component
  $form.map((i, form)=> {
    $(form).addClass('js-form-exists');
    return $form;
  });
};

$(document).ready(() => {
  formEnable();
});

export default formEnable;
