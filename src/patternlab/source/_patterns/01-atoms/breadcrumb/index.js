/**
 * breadcrumb
 */

import $ from 'jquery';

// Module styles
import './_breadcrumb.scss';

export const name = 'breadcrumb';

const breadcrumbEnable = () => {
  // Find our component within the DOM
  const $breadcrumb = $('.breadcrumb');

  // Bail if component does not exist
  if (!$breadcrumb.length) {
    return;
  }

  // An example of what could be done with this component
  $breadcrumb.map((i, breadcrumb)=> {
    $(breadcrumb).addClass('js-breadcrumb-exists');
    return $breadcrumb;
  });
};

$(document).ready(() => {
  breadcrumbEnable();
});

export default breadcrumbEnable;
