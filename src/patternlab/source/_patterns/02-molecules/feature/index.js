/**
 * feature
 */

import $ from 'jquery';

// Module styles
import './_feature.scss';

export const name = 'feature';

const featureEnable = () => {
  // Find our component within the DOM
  const $feature = $('.feature');

  // Bail if component does not exist
  if (!$feature.length) {
    return;
  }

  // An example of what could be done with this component
  $feature.map((i, feature)=> {
    $(feature).addClass('js-feature-exists');
    return $feature;
  });
};

$(document).ready(() => {
  featureEnable();
});

export default featureEnable;
