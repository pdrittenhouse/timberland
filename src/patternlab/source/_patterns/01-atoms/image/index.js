/**
 * image
 */

import $ from 'jquery';

// Module styles
import './_image.scss';

export const name = 'image';

const imageEnable = () => {
  // Find our component within the DOM
  const $image = $('.image');

  // Bail if component does not exist
  if (!$image.length) {
    return;
  }

  // An example of what could be done with this component
  $image.map((i, image)=> {
    $(image).addClass('js-image-exists');
    return $image;
  });
};

$(document).ready(() => {
  imageEnable();
});

export default imageEnable;
