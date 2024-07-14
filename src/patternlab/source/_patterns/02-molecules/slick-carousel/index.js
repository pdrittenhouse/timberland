/**
 * slick carousel
 */

import $ from 'jquery';

import 'slick-carousel';

// Module styles
import 'slick-carousel/slick/slick.scss';
import 'slick-carousel/slick/slick-theme.scss';
import './_slick-carousel.scss';

export const name = 'slickCarousel';

const slickCarouselEnable = () => {
  // Find our component within the DOM
  const $slickCarousel = $('.slick-carousel');

  // Bail if component does not exist
  if (!$slickCarousel.length) {
    return;
  }

  // An example of what could be done with this component
  $slickCarousel.map((i, slickCarousel)=> {
    $(slickCarousel).addClass('js-slick-carousel-exists');
    return $slickCarousel;
  });
};

const initSlick = () => {
  const carousels = [].slice.call( document.querySelectorAll('.slick-carousel-wrapper') );

  carousels.forEach(carousel => {

    const $carousel = $(carousel).find('.slick-carousel').slick({
      accessibility: false,
      adaptiveHeight: carousel.dataset.adaptiveheight === 'true' ? true : false,
      autoplay: carousel.dataset.autoplay === 'true' ? true : false,
      autoplaySpeed: parseInt(carousel.dataset.autoplayspeed),
      arrows: carousel.dataset.arrows === 'true' ? true : false,
      asNavFor: carousel.dataset.asnavfor,
      prevArrow: '<button type="button" class="slick-prev">Previous</button>',
      nextArrow: '<button type="button" class="slick-next">Next</button>',
      centerMode: carousel.dataset.centermode === 'true' ? true : false,
      centerPadding: parseInt(carousel.dataset.centerpadding),
      cssEase: carousel.dataset.cssease,
      // customPaging: () => {},
      dots: carousel.dataset.dots === 'true' ? true : false,
      dotsClass: 'slick-dots',
      draggable: carousel.dataset.draggable === 'true' ? true : false,
      fade: carousel.dataset.fade === 'true' ? true : false,
      focusOnSelect: carousel.dataset.focusonselect === 'true' ? true : false,
      easing: carousel.dataset.easing,
      edgeFriction: parseFloat(carousel.dataset.edgefriction),
      infinite: carousel.dataset.infinite === 'true' ? true : false,
      initialSlide: parseInt(carousel.dataset.initialslide),
      lazyLoad: 'ondemand',
      mobileFirst: true,
      pauseOnFocus: carousel.dataset.pauseonfocus === 'true' ? true : false,
      pauseOnHover: carousel.dataset.pauseonhover === 'true' ? true : false,
      pauseOnDotsHover: carousel.dataset.pauseondotshover === 'true' ? true : false,
      respondTo: 'window',
      responsive: JSON.parse(carousel.dataset.responsive),
      rows: parseInt(carousel.dataset.rows),
      slide: carousel.dataset.slide,
      slidesPerRow: parseInt(carousel.dataset.slidesperrow),
      slidesToShow: parseInt(carousel.dataset.slidestoshow),
      slidesToScroll: parseInt(carousel.dataset.slidestoscroll),
      speed: parseInt(carousel.dataset.speed),
      swipe: carousel.dataset.swipe === 'true' ? true : false,
      swipeToSlide: carousel.dataset.swipetoslide === 'true' ? true : false,
      touchMove: carousel.dataset.touchmove === 'true' ? true : false,
      touchThreshold: parseInt(carousel.dataset.touchthreshold),
      useCSS: true,
      useTransform: true,
      variableWidth: carousel.dataset.variablewidth === 'true' ? true : false,
      vertical: carousel.dataset.vertical === 'true' ? true : false,
      verticalSwiping: carousel.dataset.verticalswiping === 'true' ? true : false,
      rtl: carousel.dataset.rtl === 'true' ? true : false,
      waitForAnimate: true,
      zIndex: 2,
    });

    if(carousel.dataset.customcontrols === 'true') {
      $carousel.slick("slickSetOption", "appendArrows", $(carousel).find('.slick-carousel-controls'), true);
      $carousel.slick("slickSetOption", "appendDots", $(carousel).find('.slick-carousel-controls'), true);
    }
  });
};

$(document).ready(() => {
  slickCarouselEnable();
  initSlick();
});

export default slickCarouselEnable;
