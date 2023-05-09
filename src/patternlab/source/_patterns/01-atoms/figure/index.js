/**
 * figure
 */

import $ from 'jquery';

// Module styles
import './_figure.scss';

export const name = 'figure';

const figureEnable = () => {
  // Find our component within the DOM
  const $figure = $('.figure');

  // Bail if component does not exist
  if (!$figure.length) {
    return;
  }

  // An example of what could be done with this component
  $figure.map((i, figure)=> {
    $(figure).addClass('js-figure-exists');
    return $figure;
  });
};

$(document).ready(() => {
  figureEnable();
});

export default figureEnable;
