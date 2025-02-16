/**
 * blockquote
 */

import $ from 'jquery';

// Module styles
import './_blockquote.scss';

export const name = 'blockquote';

const blockquoteEnable = () => {
  // Find our component within the DOM
  const $blockquote = $('.blockquote');

  // Bail if component does not exist
  if (!$blockquote.length) {
    return;
  }

  // An example of what could be done with this component
  $blockquote.map((i, blockquote)=> {
    $(blockquote).addClass('js-blockquote-exists');
    return $blockquote;
  });
};

$(document).ready(() => {
  blockquoteEnable();
});

export default blockquoteEnable;
