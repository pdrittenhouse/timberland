/**
 * branding
 */

import $ from 'jquery';

// Module styles
import './_branding.scss';

import './img/logo.jpg';
import './img/logo.png';
import './img/logo.svg';

export const name = 'branding';

const brandingEnable = () => {
  // Find our component within the DOM
  const $branding = $('.branding');

  // Bail if component does not exist
  if (!$branding.length) {
    return;
  }

  // An example of what could be done with this component
  $branding.map((i, branding)=> {
    $(branding).addClass('js-branding-exists');
    return $branding;
  });
};

$(document).ready(() => {
  brandingEnable();
});

export default brandingEnable;
