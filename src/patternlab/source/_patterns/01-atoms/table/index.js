/**
 * table
 */

import $ from 'jquery';

// Bootstrap CSS components this pattern uses
import '../../00-protons/printing/libs/bootstrap-components/tables.scss';

// Module styles
import './_table.scss';

export const name = 'table';

const tableEnable = () => {
  // Find our component within the DOM
  const $table = $('.table');

  // Bail if component does not exist
  if (!$table.length) {
    return;
  }

  // An example of what could be done with this component
  $table.map((i, table) => {
    $(table).addClass('js-table-exists');
    return $table;
  });
};

$(document).ready(() => {
  tableEnable();
});

export default tableEnable;
