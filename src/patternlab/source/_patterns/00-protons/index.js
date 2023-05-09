/**
 * Base css generation and global js logic.
 */

import $ from 'jquery';

import './_base.scss';

/**
 * Bootstrap Javascript
 */
require('bootstrap');

// Add loaded class to body
const bodyLoaded = () => {
  setTimeout(() => {
    document.body.classList.add('page-loaded');
  }, 1000);
};

// Smooth Scroll
const smoothScroll = () => {
  const offsetScroll = -148;
  const urlHash = window.location.hash;

  // Add smooth scrolling to URL hash
  // @link https://www.abitgooey.com/2018/08/smooth-scroll-to-section-on-page-load-jquery/

  // to top right away
  scroll(0, 0);
  // void some browsers issue
  setTimeout(scroll(0, 0), 1);

  if (urlHash && $('#' + urlHash.replace(/[^\w\s]/gi, '')).length) {
    $(function () {
      // *only* if we have anchor on the url
      // smooth scroll to the anchor id
      $('html, body').animate({
        scrollTop: $('#' + urlHash.replace(/[^\w\s]/gi, '')).offset().top + offsetScroll
      }, 800);
    });
  }

  // Add smooth scrolling to links
  const links = [].slice.call(document.querySelectorAll(`a[href*="#"]:not([href="#0"])`));
  if (links !== null) {
    links.forEach(link => {
      link.addEventListener('click', (e) => {

        // If hash links to the same page
        if(link.pathname === window.location.pathname){

          // Smooth scroll to element and update window url hash
          const target = link.hash;
          if (target !== "" && $(target).length) {
            // Prevent default anchor click behavior
            e.preventDefault();

            $('html, body').animate({
              scrollTop: $(target).offset().top + offsetScroll
            }, 800, function(){
              if(history.pushState) {
                history.pushState(null, null, target);
              }
              else {
                window.location.hash = target;
              }
            });
          } else if (target === "") {
            $('html, body').animate({
              scrollTop: $('body').offset().top + offsetScroll
            }, 800, function(){
              if(history.pushState) {
                history.pushState(null, null, target);
              }
              else {
                window.location.hash = target;
              }
            });
          }

        }


      });
    });
  }
};

$(document).ready(() => {
  bodyLoaded();
  smoothScroll();
});
