/**
 * card grid
 */

import $ from 'jquery';

// Module styles
import './_card-grid.scss';

export const name = 'cardGrid';

const cardGridEnable = () => {
  // Find our component within the DOM
  const $cardGrid = $('.card-grid');

  // Bail if component does not exist
  if (!$cardGrid.length) {
    return;
  }

  // An example of what could be done with this component
  $cardGrid.map((i, cardGrid)=> {
    $(cardGrid).addClass('js-card-grid-exists');
    return $cardGrid;
  });
};

$(document).ready(() => {
  cardGridEnable();
});

export default cardGridEnable;
