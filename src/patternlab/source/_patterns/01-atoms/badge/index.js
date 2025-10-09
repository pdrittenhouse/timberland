/**
 * badge
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/badge.scss';

// Module styles
import './_badge.scss';

export const name = 'badge';

const badgeEnable = () => {
  // Find our component within the DOM
  const $badge = $('.badge');

  // Bail if component does not exist
  if (!$badge.length) {
    return;
  }

  // An example of what could be done with this component
  $badge.map((i, badge)=> {
    $(badge).addClass('js-badge-exists');
    return $badge;
  });
};

$(document).ready(() => {
  badgeEnable();
});

export default badgeEnable;
