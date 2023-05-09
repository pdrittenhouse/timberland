/**
 * carousel
 */

import $ from 'jquery';

// Module styles
import './_carousel.scss';

export const name = 'carousel';

const carouselEnable = () => {
  // Find our component within the DOM
  const $carousel = $('.carousel');

  // Bail if component does not exist
  if (!$carousel.length) {
    return;
  }

  // An example of what could be done with this component
  $carousel.map((i, carousel)=> {
    $(carousel).addClass('js-carousel-exists');
    return $carousel;
  });
};

$(document).ready(() => {
  carouselEnable();
});

export default carouselEnable;
