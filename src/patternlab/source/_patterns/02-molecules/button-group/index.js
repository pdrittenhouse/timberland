/**
 * button group
 */

import $ from 'jquery';

// Module styles
import './_button-group.scss';

export const name = 'buttonGroup';

const buttonGroupEnable = () => {
  // Find our component within the DOM
  const $buttonGroup = $('.button-group');

  // Bail if component does not exist
  if (!$buttonGroup.length) {
    return;
  }

  // An example of what could be done with this component
  $buttonGroup.map((i, buttonGroup)=> {
    $(buttonGroup).addClass('js-button-group-exists');
    return $buttonGroup;
  });
};

$(document).ready(() => {
  buttonGroupEnable();
});

export default buttonGroupEnable;
