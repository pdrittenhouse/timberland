/**
 * list group
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/list-group.scss';

// Module styles
import './_list-group.scss';

export const name = 'listGroup';

const listGroupEnable = () => {
  // Find our component within the DOM
  const $listGroup = $('.list-group');

  // Bail if component does not exist
  if (!$listGroup.length) {
    return;
  }

  // An example of what could be done with this component
  $listGroup.map((i, listGroup)=> {
    $(listGroup).addClass('js-list-group-exists');
    return $listGroup;
  });
};

$(document).ready(() => {
  listGroupEnable();
});

export default listGroupEnable;
