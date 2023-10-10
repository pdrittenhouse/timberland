/**
 * footer
 */

import $ from 'jquery';

import 'waypoints/lib/jquery.waypoints.min';
import 'waypoints/lib/shortcuts/inview.min';
import 'waypoints/lib/shortcuts/sticky.min';

// Module styles
import './_footer.scss';

export const name = 'footer';

const footerEnable = () => {
  // Find our component within the DOM
  const $footer = $('.footer');

  // Bail if component does not exist
  if (!$footer.length) {
    return;
  }

  // An example of what could be done with this component
  $footer.map((i, footer)=> {
    $(footer).addClass('js-footer-exists');
    return $footer;
  });
};

const travelingCTA = () => {

  const tcta = document.querySelector('.traveling-cta');
  if (tcta !== null && tcta !== []) {
    // eslint-disable-next-line no-unused-vars, no-undef
    const inview = new Waypoint.Inview({
      element: $('#siteHeader')[0],
      enter() {
        tcta.classList.remove('show');
      },
      exited() {
        tcta.classList.add('show');
      },
    });
  }
};

$(document).ready(() => {
  footerEnable();
  travelingCTA();
});

export default footerEnable;
