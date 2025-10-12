/**
 * svg
 */

// TODO: Implement dynamic icon loading system (Phase 3.3: Icon Optimization)
//       Scan all ACF icon fields per-page and generate minimal CSS with only used icons.
//       Support both Font Awesome and Phosphor Icons.
//       Similar to page_styles preprocessing - cache per-post with self-invalidation.
//       Keep full libraries in admin for icon picker UI.
//       Estimated savings: 25-30KB per page by loading ~5-10 icons instead of full library.

import $ from 'jquery';
import svg4everybody from 'svg4everybody';
import fontawesome from './fontawesome';

import './_svg.scss';

// Enable Fontawesome immediately
fontawesome();

export const name = 'svg';

const svgEnable = () => {
  // Find our component within the DOM
  const $svg = $('.svg');

  // Bail if component does not exist
  if (!$svg.length) {
    return;
  }

  // Enable svg4everybody.
  svg4everybody();

  // An example of what could be done with this component
  $svg.map((i, svg)=> {
    $(svg).addClass('js-svg-exists');
    return $svg;
  });
};

$(document).ready(() => {
  svgEnable();
});

export default svgEnable;
