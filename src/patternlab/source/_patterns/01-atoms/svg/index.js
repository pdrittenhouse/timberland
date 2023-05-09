/**
 * svg
 */

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
