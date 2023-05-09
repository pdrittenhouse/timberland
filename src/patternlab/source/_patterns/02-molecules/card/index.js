/**
 * card
 */

import $ from 'jquery';

// Module styles
import './_card.scss';

export const name = 'card';

const cardEnable = () => {
  // Find our component within the DOM
  const $card = $('.card');

  // Bail if component does not exist
  if (!$card.length) {
    return;
  }

  // An example of what could be done with this component
  $card.map((i, card)=> {
    $(card).addClass('js-card-exists');
    return $card;
  });
};

$(document).ready(() => {
  cardEnable();
});

export default cardEnable;
