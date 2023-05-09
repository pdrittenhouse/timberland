/**
 * promo
 */

import $ from 'jquery';

// Module styles
import './_promo.scss';

export const name = 'promo';

const promoEnable = () => {
  // Find our component within the DOM
  const $promo = $('.promo');

  // Bail if component does not exist
  if (!$promo.length) {
    return;
  }

  // An example of what could be done with this component
  $promo.map((i, promo)=> {
    $(promo).addClass('js-promo-exists');
    return $promo;
  });
};

$(document).ready(() => {
  promoEnable();
});

export default promoEnable;
