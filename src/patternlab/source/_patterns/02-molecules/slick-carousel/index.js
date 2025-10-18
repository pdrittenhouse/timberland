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
  const carousels = [].slice.call(document.querySelectorAll('.slick-carousel-wrapper'));
  
  carousels.forEach(carousel => {

    // Parse the JSON from the data attribute
    const responsiveSettings = JSON.parse(carousel.dataset.responsive);

    // Helper function to dynamically convert values
    function convertValue(value) {
      // Check if value is a number string and convert it to an integer
      if (!isNaN(value) && typeof value === 'string') {
        return parseInt(value, 10);
      }
      // Check if value is "true" or "false" and convert it to a boolean
      if (value === 'true') {
        return true;
      }
      if (value === 'false') {
        return false;
      }
      // Return the value as is if it's not a number string or a boolean string
      return value;
    }

    // Iterate over the responsive settings and convert dynamically
    responsiveSettings.forEach(item => {
      // Convert the breakpoint to an integer
      item.breakpoint = convertValue(item.breakpoint);

      // Iterate over the settings object and convert its values
      Object.keys(item.settings).forEach(key => {
        item.settings[key] = convertValue(item.settings[key]);
      });
    });

    const slidesShowCount = parseInt(carousel.dataset.slidestoshow);
    const loop = carousel.dataset.infinite === 'true' ? true : false;
    const customControls = carousel.dataset.customcontrols === 'true';
    const controlsWrap = $(carousel).find('.slick-carousel-controls');

    const slickOptions = {
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
      infinite: loop,
      initialSlide: parseInt(carousel.dataset.initialslide),
      lazyLoad: 'ondemand',
      mobileFirst: true, // TODO: Add this option to slider blocks
      pauseOnFocus: carousel.dataset.pauseonfocus === 'true' ? true : false,
      pauseOnHover: carousel.dataset.pauseonhover === 'true' ? true : false,
      pauseOnDotsHover: carousel.dataset.pauseondotshover === 'true' ? true : false,
      respondTo: 'window',
      responsive: responsiveSettings,
      rows: parseInt(carousel.dataset.rows),
      slide: carousel.dataset.slide,
      slidesPerRow: parseInt(carousel.dataset.slidesperrow),
      slidesToShow: slidesShowCount,
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
    };

    // Append custom controls
    if (customControls) {
      slickOptions.appendArrows = controlsWrap;
      slickOptions.appendDots = controlsWrap;

      // Add appendArrows and appendDots to all responsive breakpoints
      responsiveSettings.forEach(item => {
        item.settings.appendArrows = controlsWrap;
        item.settings.appendDots = controlsWrap;
      });
      slickOptions.responsive = responsiveSettings;
    }

    // Init carousels
    // eslint-disable-next-line no-unused-vars
    const $carousel = $(carousel).find('.slick-carousel').slick(slickOptions);
  });
};

// Gallery block carousel
const galleryCarousel = () => {
  const carousels = [].slice.call(document.querySelectorAll('.wp-block-gallery.is-style-carousel'));
  
  if (carousels !== null) {
    carousels.forEach(carousel => {
      const classes = carousel.getAttribute('class').split(' ');
      let columnClass = '';

      for (let i = 0; i < classes.length; i++) {
          if (classes[i].indexOf('columns-') !== -1) {
              columnClass = classes[i];
              break;
          }
      }

      const colClass = columnClass.replace('columns-', '');
      const cols = colClass === 'default' ? 3 : parseInt(colClass);
      
      carousel.classList.add('slick-carousel');

      $(carousel).slick({
        adaptiveHeight: true,
        autoplay: false,
        arrows: true,
        dots: true,
        draggable: true,
        fade: false,
        infinite: true,
        mobileFirst: true,
        slidesToShow: cols,
        slidesToScroll: 1,
        swipe: true,
        swipeToSlide: false
      });
    });
  }
};

$(document).ready(() => {
  slickCarouselEnable();
  initSlick();
  galleryCarousel();
});

export default slickCarouselEnable;
