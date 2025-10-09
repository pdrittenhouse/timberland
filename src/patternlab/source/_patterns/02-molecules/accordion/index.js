/**
 * accordion
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/accordion.scss';

// Bootstrap JS
// eslint-disable-next-line no-unused-vars
import Collapse from 'bootstrap/js/src/collapse';

// Module styles
import './_accordion.scss';

export const name = 'accordion';

const accordionEnable = () => {
  // Find our component within the DOM
  const $accordion = $('.accordion');

  // Bail if component does not exist
  if (!$accordion.length) {
    return;
  }

  // An example of what could be done with this component
  $accordion.map((i, accordion)=> {
    $(accordion).addClass('js-accordion-exists');
    return $accordion;
  });
};

const toggleActiveClass = () => {
  const accordions = [].slice.call(document.querySelectorAll('.accordion'));

  if (accordions !== null && accordions.length) {
    accordions.forEach(accordion => {

      accordion.addEventListener('hide.bs.collapse', () => {
        const activeButton = accordion.querySelector('.accordion-button.active');
        if (activeButton) {
          activeButton.classList.remove('active');
        }
      });

      accordion.addEventListener('shown.bs.collapse', () => {
        const panelButton = $('.collapse.show').prev('.accordion-header').find('.accordion-button');
        panelButton.addClass('active');
      });
    });
  }
};

$(document).ready(() => {
  accordionEnable();
  toggleActiveClass();
});

export default accordionEnable;
