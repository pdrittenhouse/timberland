/**
 * testimonial
 */

import $ from 'jquery';

// Module styles
import './_testimonial.scss';

export const name = 'testimonial';

const testimonialEnable = () => {
  // Find our component within the DOM
  const $testimonial = $('.testimonial');

  // Bail if component does not exist
  if (!$testimonial.length) {
    return;
  }

  // An example of what could be done with this component
  $testimonial.map((i, testimonial)=> {
    $(testimonial).addClass('js-testimonial-exists');
    return $testimonial;
  });
};

$(document).ready(() => {
  testimonialEnable();
});

export default testimonialEnable;
