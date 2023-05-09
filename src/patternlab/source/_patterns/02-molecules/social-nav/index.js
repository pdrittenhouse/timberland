/**
 * social nav
 */

import $ from 'jquery';

// Module styles
import './_social-nav.scss';

export const name = 'socialNav';

const socialNavEnable = () => {
  // Find our component within the DOM
  const $socialNav = $('.social-nav');

  // Bail if component does not exist
  if (!$socialNav.length) {
    return;
  }

  // An example of what could be done with this component
  $socialNav.map((i, socialNav)=> {
    $(socialNav).addClass('js-social-nav-exists');
    return $socialNav;
  });
};

$(document).ready(() => {
  socialNavEnable();
});

export default socialNavEnable;
