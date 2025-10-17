/**
 * modal
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/modal.scss';
import '../../00-protons/printing/libs/bootstrap-components/close.scss';  // For modal close button

// Bootstrap JS
// eslint-disable-next-line no-unused-vars
import Modal from 'bootstrap/js/src/modal';

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

const modalZIndex = () => {
  // Find our component within the DOM
    const modals = document.querySelectorAll('.modal');

    // Bail if component does not exist
    if (!modals.length) {
      return;
    }

    // Move all modals to body to prevent z-index stacking context issues
    modals.forEach((modal) => {
      // Only move if not already a direct child of body
      if (modal.parentElement !== modal.ownerDocument.body) {
        modal.ownerDocument.body.appendChild(modal);
      }
    });
};

$(document).ready(() => {
  modalEnable();
  modalZIndex();
});

export default modalEnable;
