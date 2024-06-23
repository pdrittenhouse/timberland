/**
 * flickity carousel
 */

import $ from 'jquery';

// Require Flickity JS Components
const jQueryBridget = require('jquery-bridget');
const Flickity = require('flickity');
const utils = require('fizzy-ui-utils');
require('flickity-imagesloaded');
require('flickity-fullscreen');
require('flickity-as-nav-for');
require('flickity-bg-lazyload');
require('flickity-hash');
require('flickity-fade');
require('flickity-sync');

// Module styles
import 'flickity/css/flickity.css';
import './_flickity-carousel.scss';

export const name = 'flickityCarousel';

const flickityCarouselEnable = () => {
  // Find our component within the DOM
  const $flickityCarousel = $('.flickity-carousel');

  // Bail if component does not exist
  if (!$flickityCarousel.length) {
    return;
  }

  // An example of what could be done with this component
  $flickityCarousel.map((i, flickityCarousel)=> {
    $(flickityCarousel).addClass('js-flickity-carousel-exists');
    return $flickityCarousel;
  });
};

// Use Flickity as a jquery plugin
Flickity.setJQuery( $ );
jQueryBridget( 'flickity', Flickity, $ );

const initFlickity = () => {

  const carouselsWrappers = utils.makeArray( document.querySelectorAll('.flickity-carousel--wrapper') );

  carouselsWrappers.forEach(carouselWrapper => {

    const carousels =  utils.makeArray(carouselWrapper.getElementsByClassName('flickity-carousel'));
    const cellsButtonGroup = carouselWrapper.querySelector('.button--group-cells');
    const previousButton = carouselWrapper.querySelector('.button--previous');
    const nextButton = carouselWrapper.querySelector('.button--next');

    carousels.forEach(carousel => {

      // Initialize carousels
      const $carousel = $(carousel).flickity({
        draggable: carousel.dataset.draggable === 'true' ? true : false,
        freeScroll: carousel.dataset.freescroll === 'true' ? true : false,
        wrapAround: carousel.dataset.wraparound === 'true' ? true : false,
        groupCells: carousel.dataset.groupcells === 'true' ? true : false,
        // eslint-disable-next-line no-nested-ternary
        autoPlay: carousel.dataset.autoplay === 'true' ? true : carousel.dataset.autoplay === 'false' ? false : carousel.dataset.autoplay,
        pauseAutoPlayOnHover: carousel.dataset.pauseautoplay === 'true' ? true : false,
        fullscreen: carousel.dataset.fullscreen === 'true' ? true : false,
        fade: carousel.dataset.fade === 'true' ? true : false,
        adaptiveHeight: carousel.dataset.adaptiveheight === 'true' ? true : false,
        watchCSS: true,
        asNavFor: carousel.dataset.asnavfor,
        hash: true,
        dragThreshold: parseInt(carousel.dataset.dragthreshold),
        selectedAttraction: parseFloat(carousel.dataset.selectedattraction),
        friction: parseFloat(carousel.dataset.friction),
        freeScrollFriction: parseFloat(carousel.dataset.freescrollfriction),
        imagesLoaded: true,
        lazyLoad: true,
        bgLazyLoad: true,
        cellSelector: carousel.dataset.cellselector,
        initialIndex: parseInt(carousel.dataset.initialindex),
        accessibility: true,
        setGallerySize: carousel.dataset.setgallerysize === 'true' ? true : false,
        resize: true,
        cellAlign: carousel.dataset.cellalign,
        contain: carousel.dataset.contain === 'true' ? true : false,
        percentPosition: carousel.dataset.percentposition === 'true' ? true : false,
        rightToLeft: carousel.dataset.righttoleft === 'true' ? true : false,
        prevNextButtons: carousel.dataset.prevnextbuttons === 'true' ? true : false,
        pageDots: carousel.dataset.pagedots === 'true' ? true : false,
        arrowShape: 'M50.7,74.3l2.2-2.2c0.5-0.5,0.5-1.4,0-1.9L35.6,52.9h38.1c0.7,0,1.3-0.6,1.3-1.3v-3.1c0-0.7-0.6-1.3-1.3-1.3H35.6 l17.3-17.3c0.5-0.5,0.5-1.4,0-1.9l-2.2-2.2c-0.5-0.5-1.4-0.5-1.9,0L25.4,49.1c-0.5,0.5-0.5,1.4,0,1.9l23.4,23.4 C49.3,74.8,50.1,74.8,50.7,74.3z',
      });

      // Flickity instance
      const flkty = $carousel.data('flickity');

      if (cellsButtonGroup !== null) {
        const cellsButtons = utils.makeArray( cellsButtonGroup.children );

        // Update buttons on select
        flkty.on( 'select', function() {
          const previousSelectedButton = cellsButtonGroup.querySelector('.is-selected');
          const selectedButton = cellsButtonGroup.children[ flkty.selectedIndex ];
          previousSelectedButton.classList.remove('is-selected');
          selectedButton.classList.add('is-selected');
        });

        // Select cell on button click
        cellsButtonGroup.addEventListener( 'click', event => {
          if ( !event.target.matches( '.button' ) ) {
            return;
          }
          const index = cellsButtons.indexOf( event.target );
          flkty.select( index );
        });

        // Previous button
        previousButton.addEventListener( 'click', () => {
          flkty.previous();
        });

        // Next button
        nextButton.addEventListener( 'click', () => {
          flkty.next();
        });
      }

      // Add fullscreen body class
      flkty.on('fullscreenChange', () => {
        document.body.classList.toggle('is-fullscreen');
      });

      // Restart autoplay after interaction
      if (flkty.options.autoPlay) {
        // eslint-disable-next-line no-unused-vars
        flkty.on('pointerUp', function (event, pointer) {
          flkty.player.play();
        });
      }

    });

  });

};

$(document).ready(() => {
  flickityCarouselEnable();
  initFlickity();
});

export default flickityCarouselEnable;
