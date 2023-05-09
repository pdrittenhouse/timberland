/**
 * list
 */

import $ from 'jquery';

// Module styles
import './_list.scss';

export const name = 'list';

const listEnable = () => {
  // Find our component within the DOM
  const $list = $('.list');

  // Bail if component does not exist
  if (!$list.length) {
    return;
  }

  // An example of what could be done with this component
  $list.map((i, list)=> {
    $(list).addClass('js-list-exists');
    return $list;
  });
};

$(document).ready(() => {
  listEnable();
});

export default listEnable;
