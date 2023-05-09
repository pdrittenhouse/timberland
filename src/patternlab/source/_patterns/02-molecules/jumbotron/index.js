/**
 * jumbotron
 */

import $ from 'jquery';

import 'vide/dist/jquery.vide.min';

// Module styles
import './_jumbotron.scss';

export const name = 'jumbotron';

const jumbotronEnable = () => {
  // Find our component within the DOM
  const $jumbotron = $('.jumbotron');

  // Bail if component does not exist
  if (!$jumbotron.length) {
    return;
  }

  // An example of what could be done with this component
  $jumbotron.map((i, jumbotron)=> {
    $(jumbotron).addClass('js-jumbotron-exists');
    return $jumbotron;
  });
};

const bgVideos = () => {
  const bgVids = [].slice.call(document.querySelectorAll('.jumbotron[data-mp4], .jumbotron[data-webm], .jumbotron[data-ogv]'));

  if (bgVids !== null && bgVids.length) {
    bgVids.forEach(vid => {

      if (vid.dataset.mp4 !== undefined && vid.dataset.mp4 !== null) {
        $(vid).vide({
          mp4: vid.dataset.mp4 ? vid.dataset.mp4 : '',
          webm: vid.dataset.webm ? vid.dataset.webm : '',
          ogv: vid.dataset.ogv ? vid.dataset.ogv : '',
          poster: vid.dataset.poster ? vid.dataset.poster : '',
        }, {
          loop: vid.dataset.loop ? vid.dataset.loop : '',
          autoplay: vid.dataset.autoplay ? vid.dataset.autoplay : '',
          muted: vid.dataset.muted ? vid.dataset.muted : '',
          posterType: 'detect',
          resizing: vid.dataset.resizing ? vid.dataset.resizing : '',
          position: vid.dataset.position ? vid.dataset.position : '',
          bgColor: vid.dataset.bgColor ? vid.dataset.bgColor : '',
          className: vid.dataset.videoClasses ? vid.dataset.videoClasses : '',
        });
      }

    });
  }
}

$(document).ready(() => {
  jumbotronEnable();
  bgVideos();
});

export default jumbotronEnable;
