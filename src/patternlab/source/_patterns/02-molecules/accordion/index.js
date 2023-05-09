/**
 * accordion
 */

import $ from 'jquery';

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
        // const panelButton = openPanel.previousSibling('.accordion-header').querySelector('.accordion-button');
        panelButton.addClass('active');
        // console.log(accordion);
        // console.log(button.classList.contains('active'));
      });
    });
  }
};

$(document).ready(() => {
  accordionEnable();
  toggleActiveClass();
});

export default accordionEnable;
