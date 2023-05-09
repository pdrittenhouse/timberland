/**
 * video promo
 */

import $ from 'jquery';

// Module styles
import './_video-promo.scss';

export const name = 'videoPromo';

const videoPromoEnable = () => {
  // Find our component within the DOM
  const $videoPromo = $('.video-promo');

  // Bail if component does not exist
  if (!$videoPromo.length) {
    return;
  }

  // An example of what could be done with this component
  $videoPromo.map((i, videoPromo)=> {
    $(videoPromo).addClass('js-video-promo-exists');
    return $videoPromo;
  });
};

const buttonVideoControl = () => {
  const promos = [].slice.call( document.querySelectorAll('.video-promo') );

  if (promos !== null) {
    promos.forEach(promo => {
      const button = promo.querySelector('.video-promo--play');
      const share = promo.querySelector('.share-button');
      const video = promo.querySelector('video');
      const youtube = promo.querySelector('.image-format--youtube iframe');
      const vimeo = promo.querySelector('.image-format--vimeo iframe');

      if (button !== null) {
        button.addEventListener('click', () => {
          if (video !== null) {
            video.play();
          }
          if (youtube !== null) {
            youtube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
          }
          if (vimeo !== null) {
            vimeo.contentWindow.postMessage('{"method":"play"}', '*');
          }
        });
      }

      if (video !== null) {
        video.addEventListener('pause', () => {
          if (button !== null) {
            button.classList.remove('hide');
          }
          if (share !== null) {
            share.classList.remove('video-playing');
          }
        });
        video.addEventListener('play', () => {
          if (button !== null) {
            button.classList.add('hide');
          }
          if (share !== null) {
            share.classList.add('video-playing');
          }
        });
        video.addEventListener('ended', () => {
          if (button !== null) {
            button.classList.remove('hide');
          }
          if (share !== null) {
            share.classList.remove('video-playing');
          }
        });
      }
    });
  }
};

const hoverControls = () => {
  const promos = [].slice.call( document.querySelectorAll('.video-promo') );

  if (promos !== null) {
    promos.forEach(promo => {
      const video = promo.querySelector('video');
      let videoPlayed = false;

      if (video !== null) {
        const showControls = () => {
          video.addEventListener('mouseenter', () => {
            if (videoPlayed && !video.hasAttribute("controls")) {
              video.setAttribute("controls", "controls");
            }
          });
          video.addEventListener('mouseleave', () => {
            if (videoPlayed && video.hasAttribute("controls")) {
              video.removeAttribute("controls");
            }
          });
        };

        // Initialize without controls
        video.removeAttribute("controls");
        showControls();

        // Set flag to show controls on play
        video.addEventListener('play', () => {
          videoPlayed = true;
        });

        // Reset flag and remove controls on end
        video.addEventListener('ended', () => {
          videoPlayed = false;
          video.removeAttribute("controls");
        });

        // Reset flag and remove controls on pause
        video.addEventListener('pause', () => {
          // videoPlayed = false;
          // video.removeAttribute("controls");
        });
      }

    });
  }

};

const endPoster = () => {
  const promos = [].slice.call( document.querySelectorAll('.video-promo') );

  if (promos !== null) {
    promos.forEach(promo => {
      const video = promo.querySelector('video');
      if (video !== null) {
        video.addEventListener('ended', () => {
          if (!video.hasAttribute('loop')) {
            video.removeAttribute("autoplay"); // prevent autoplay from looping
          }
          video.load();
        });
      }
    });
  }
};

const hidePoster = () => {
  const promos = [].slice.call( document.querySelectorAll('.video-promo') );

  if (promos !== null) {
    promos.forEach(promo => {
      const video = promo.querySelector('video');
      if (video !== null) {
        const poster = video.getAttribute('poster');
        video.addEventListener('play', () => {
          video.removeAttribute('poster');
        });
        video.addEventListener('pause', () => {
          video.setAttribute('poster', poster);
        });
        video.addEventListener('ended', () => {
          video.setAttribute('poster', poster);
        });
      }
    });
  }
};

$(document).ready(() => {
  videoPromoEnable();
  buttonVideoControl();
  hoverControls();
  endPoster();
  hidePoster();
});

export default videoPromoEnable;
