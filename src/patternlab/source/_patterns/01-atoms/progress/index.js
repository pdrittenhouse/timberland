/**
 * progress
 */

import $ from 'jquery';

// Module styles
import './_progress.scss';

export const name = 'progress';

const progressEnable = () => {
  // Find our component within the DOM
  const $progress = $('.progress');

  // Bail if component does not exist
  if (!$progress.length) {
    return;
  }

  // An example of what could be done with this component
  $progress.map((i, progress)=> {
    $(progress).addClass('js-progress-exists');
    return $progress;
  });
};

$(document).ready(() => {
  progressEnable();
});

export default progressEnable;
