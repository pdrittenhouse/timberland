/**
 * pagination
 */

import $ from 'jquery';

// Module styles
import './_pagination.scss';

export const name = 'pagination';

const paginationEnable = () => {
  // Find our component within the DOM
  const $pagination = $('.pagination');

  // Bail if component does not exist
  if (!$pagination.length) {
    return;
  }

  // An example of what could be done with this component
  $pagination.map((i, pagination)=> {
    $(pagination).addClass('js-pagination-exists');
    return $pagination;
  });
};

$(document).ready(() => {
  paginationEnable();
});

export default paginationEnable;
