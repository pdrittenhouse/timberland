/**
 * skip nav
 */

import $ from 'jquery';

// Module styles
import './_skip-nav.scss';

export const name = 'skipNav';

const skipNavEnable = () => {
  // Find our component within the DOM
  const $skipNav = $('.skip-nav');

  // Bail if component does not exist
  if (!$skipNav.length) {
    return;
  }

  // An example of what could be done with this component
  $skipNav.map((i, skipNav)=> {
    $(skipNav).addClass('js-skip-nav-exists');
    return $skipNav;
  });
};

$(document).ready(() => {
  skipNavEnable();
});

export default skipNavEnable;
