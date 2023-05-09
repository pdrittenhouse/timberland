/**
 * grid
 */
import $ from 'jquery';

import './_grid.scss';

export const name = 'grid';

const gridEnable = () => {
  // Find our component within the DOM
  const $grid = $('.grid');
  // Bail if component does not exist
  if (!$grid.length) {
    return;
  }
  // An example of what could be done with this component
  $grid.map((i, grid)=> {
    $(grid).addClass('js-grid-exists');
    return $grid;
  });
};

$(document).ready(() => {
  gridEnable();
});

export default gridEnable;
