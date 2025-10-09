/**
 * carousel
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/carousel.scss';

// Bootstrap JS
// eslint-disable-next-line no-unused-vars
import Carousel from 'bootstrap/js/src/carousel';

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
