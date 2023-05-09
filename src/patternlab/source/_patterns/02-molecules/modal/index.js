/**
 * modal
 */

import $ from 'jquery';

// Module styles
import './_modal.scss';

export const name = 'modal';

const modalEnable = () => {
  // Find our component within the DOM
  const $modal = $('.modal');

  // Bail if component does not exist
  if (!$modal.length) {
    return;
  }

  // An example of what could be done with this component
  $modal.map((i, modal)=> {
    $(modal).addClass('js-modal-exists');
    return $modal;
  });
};

$(document).ready(() => {
  modalEnable();
});

export default modalEnable;
