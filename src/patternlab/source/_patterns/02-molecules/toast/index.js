/**
 * toast
 */

import $ from 'jquery';

import Toast from 'bootstrap/js/src/popover';

// Module styles
import './_toast.scss';

export const name = 'toast';

const toastEnable = () => {
  // Find our component within the DOM
  const $toast = $('.toast');

  // Bail if component does not exist
  if (!$toast.length) {
    return;
  }

  // An example of what could be done with this component
  $toast.map((i, toast)=> {
    $(toast).addClass('js-toast-exists');
    return $toast;
  });
};

const toasts = () => {

  // Enable all toasts
  const toastElList = [].slice.call(document.querySelectorAll('.toast'));
  // eslint-disable-next-line no-unused-vars, no-undef
  const toastList = toastElList.map(function (toastEl) {
    return new Toast(toastEl);
  });

  // Toast triggers
  const triggers = [].slice.call(document.querySelectorAll('[data-bs-toggle="toast"]'));

  if (triggers !== null && triggers.length > 0) {
    triggers.forEach(trigger => {
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        const target = trigger.getAttribute('data-bs-target') || trigger.getAttribute('href');
        const toast = document.querySelector(`.toast${target}`);

        if (toast !== null) {
          $(toast).toast('show');
        }
      })
    });
  }

};

$(document).ready(() => {
  toastEnable();
  toasts();
});

export default toastEnable;
