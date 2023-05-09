/**
 * header
 */

import $ from 'jquery';

// Hamburgers
import 'hamburgers/_sass/hamburgers/hamburgers.scss';

// Module styles
import './_header.scss';

export const name = 'header';

const headerEnable = () => {
  // Find our component within the DOM
  const $header = $('.header');

  // Bail if component does not exist
  if (!$header.length) {
    return;
  }

  // An example of what could be done with this component
  $header.map((i, header)=> {
    $(header).addClass('js-header-exists');
    return $header;
  });
};

const navToggleClass = () => {
  const {body} = document;
  const nav = document.getElementById('siteNav');
  const toggle = document.getElementById('navToggle');

  // Toggle open class on body
  $(nav).on('show.bs.collapse', () => {
    toggle.classList.add('is-active');
  });
  $(nav).on('shown.bs.collapse', () => {
    body.classList.add('nav-open');
  });
  $(nav).on('hide.bs.collapse', () => {
    toggle.classList.remove('is-active');
  });
  $(nav).on('hidden.bs.collapse', () => {
    body.classList.remove('nav-open');
  });
};

const stickyHeader = () => {

  // Grow/Shrink header
  // // const header = document.getElementById('siteHeader');
  // let currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
  // let isTall = true;
  // const offset = 30;
  // //const duration = 0.25;
  //
  // const grow = () => {
  //   if(!isTall){
  //     // TweenLite.to(".site-header", duration, {
  //     //   css:{
  //     //     "paddingTop": "22px",
  //     //     "paddingBottom": "22px"
  //     //   }
  //     // });
  //     document.body.classList.remove('header-shrunk');
  //     isTall = true;
  //   }
  // };
  //
  // const shrink = () => {
  //   if(isTall){
  //     // TweenLite.to(".site-header", duration, {
  //     //   css:{
  //     //     "paddingTop": "10px",
  //     //     "paddingBottom": "10px"
  //     //   }
  //     // });
  //     document.body.classList.add('header-shrunk');
  //     isTall = false;
  //   }
  // };
  //
  // const refresh = () => {
  //   const newScrollTop = window.pageYOffset || document.documentElement.scrollTop;
  //   if (newScrollTop > (currentScrollTop + offset)) {
  //     shrink();
  //   } else if (newScrollTop < (currentScrollTop - offset)) {
  //     grow();
  //   }
  //   currentScrollTop = newScrollTop;
  //
  //   // Grow header if top reached
  //   if (currentScrollTop <=0) {
  //     document.body.classList.remove('header-shrunk');
  //   }
  // };
  //
  // document.body.ownerDocument.addEventListener("scroll", refresh, {
  //   passive: true
  // });

  // @link https://stackoverflow.com/questions/31223341/detecting-scroll-direction
  // let lastScrollTop = 0;
  // const offset = 100;
  // document.body.ownerDocument.addEventListener("scroll", function(){
  //   const st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
  //   if (st > (lastScrollTop)){
  //     // downscroll
  //     document.body.classList.add('header-shrunk');
  //   } else {
  //     // upscroll
  //     document.body.classList.remove('header-shrunk');
  //   }
  //   lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  // }, false);

  // @link https://www.w3schools.com/howto/howto_js_shrink_header_scroll.asp
  document.body.ownerDocument.onscroll = () => {
    const offset = document.getElementById('siteHeader').offsetHeight;
    if (document.body.scrollTop > offset || document.documentElement.scrollTop > offset) {
      document.body.classList.add('header-shrunk');
    } else {
      document.body.classList.remove('header-shrunk');
    }
  };
};

$(document).ready(() => {
  headerEnable();
  navToggleClass();
  stickyHeader();
});

export default headerEnable;
