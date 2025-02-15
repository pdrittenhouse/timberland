/**
 * video
 */

import $ from 'jquery';

// Module styles
import './_video.scss';

export const name = 'video';

const videoEnable = () => {
  // Find our component within the DOM
  const $video = $('.video');

  // Bail if component does not exist
  if (!$video.length) {
    return;
  }

  // An example of what could be done with this component
  $video.map((i, video)=> {
    $(video).addClass('js-video-exists');
    return $video;
  });
};

// Load YouTube iframe player API
// @link https://developers.google.com/youtube/iframe_api_reference
const loadYTPlayerAPI = () => {
  if(typeof YT === 'undefined') {
    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  }
};

// Modal video controls
const modalVideoControl = () => {
  const modals = [].slice.call(document.querySelectorAll('.modal.video'));

  if (modals !== null) {
    modals.forEach(modal => {
      const videoWrapper = modal.querySelector('.video');
      const video = modal.querySelector('video');
      const youtube = modal.querySelector('.video-format--youtube iframe');
      const vimeo = modal.querySelector('.video-format--vimeo iframe');

      if (video !== null) {
        video.pause();
        if (videoWrapper.classList.contains('has-autoplay')) {
          video.pause();
        }
        $(modal).on('shown.bs.modal', function () {
          if (videoWrapper.classList.contains('has-autoplay')) {
            video.play();
          };
        });
        $(modal).on('hide.bs.modal', function () {
          video.pause();
        });
      }

      if (youtube !== null) {
        youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        if (videoWrapper.classList.contains('has-autoplay')) {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        }
        $(modal).on('shown.bs.modal', function () {
          if (videoWrapper.classList.contains('has-autoplay')) {
            youtube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
          };
        });
        $(modal).on('hide.bs.modal', function () {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        });
      }

      if (vimeo !== null) {
        vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        if (videoWrapper.classList.contains('has-autoplay')) {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        }
        $(modal).on('shown.bs.modal', function () {
          if (videoWrapper.classList.contains('has-autoplay')) {
            vimeo.contentWindow.postMessage('{"method":"play"}', '*');
          };
        });
        $(modal).on('hide.bs.modal', function () {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        });
      }

    });
  }
};

// Slider video controls
const sliderVideoControl = () => {
  const bootstrapSliders = [].slice.call(document.querySelectorAll('.block-slider.video:not(.flickity-carousel--wrapper):not(.slick-carousel-wrapper)'));
  const slickSliders = [].slice.call(document.querySelectorAll('.slick-carousel-wrapper.video'));
  const flickitySliders = [].slice.call(document.querySelectorAll('.flickity-carousel--wrapper.video'));

  // Bootstrap sliders
  bootstrapSliders.forEach(slider => {
    const slides = [].slice.call(slider.querySelectorAll('.carousel-item'));
    const activeSlide = slider.querySelector('.carousel-item.active');
    const activeVideoWrapper = activeSlide.querySelector('.video');
    const activeVideo = activeSlide.querySelector('video');
    const activeYoutube = activeSlide.querySelector('.video-format--youtube iframe');
    const activeVimeo = activeSlide.querySelector('.video-format--vimeo iframe');

    // Pause all slides
    slides.forEach(slide => {
      const videoWrapper = slide.querySelector('.video');
      const video = slide.querySelector('video');
      const youtube = slide.querySelector('.video-format--youtube iframe');
      const vimeo = slide.querySelector('.video-format--vimeo iframe');

      if (video !== null) {
        video.pause();
        if (videoWrapper.classList.contains('has-autoplay')) {
          video.pause();
        }
      }

      if (youtube !== null) {
        youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        if (videoWrapper.classList.contains('has-autoplay')) {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        }
      }

      if (vimeo !== null) {
        vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        if (videoWrapper.classList.contains('has-autoplay')) {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        }
      }
    });

    // Active slide autoplay
    if (activeVideoWrapper.classList.contains('has-autoplay')) {
      if (activeVideo !== null) {
        activeVideo.play();
      }

      if (activeYoutube !== null) {
        activeYoutube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
      }

      if (activeVimeo !== null) {
        activeVimeo.contentWindow.postMessage('{"method":"play"}', '*');
      }
    }

    // Pause on slide change
    slider.addEventListener('slide.bs.carousel', e => {
      const fromSlide = slides[e.from];
      const fromVideo = fromSlide.querySelector('video');
      const fromYoutube = fromSlide.querySelector('.video-format--youtube iframe');
      const fromVimeo = fromSlide.querySelector('.video-format--vimeo iframe');

      if (fromVideo !== null) {
        fromVideo.pause();
      }

      if (fromYoutube !== null) {
        fromYoutube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
      }

      if (fromVimeo !== null) {
        fromVimeo.contentWindow.postMessage('{"method":"pause"}', '*');
      }
    });

    // Play on slide change
    slider.addEventListener('slid.bs.carousel', e => {
      const toSlide = slides[e.to];
      const toVideoWrapper = toSlide.querySelector('.video');
      const toVideo = toSlide.querySelector('video');
      const toYoutube = toSlide.querySelector('.video-format--youtube iframe');
      const toVimeo = toSlide.querySelector('.video-format--vimeo iframe');
      
      if (toVideoWrapper.classList.contains('has-autoplay')) {
        if (toVideo !== null) {
          toVideo.play();
        }

        if (toYoutube !== null) {
          toYoutube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        }

        if (toVimeo !== null) {
          toVimeo.contentWindow.postMessage('{"method":"play"}', '*');
        }
      }
    });
  });

  // Slick sliders
  slickSliders.forEach(slider => {
    $(slider).on('init', function () {
      const slides = [].slice.call(slider.querySelectorAll('.slick-slide:not(.slick-cloned)'));
      const activeSlide = slider.querySelector('.slick-slide:not(.slick-cloned).slick-current');
      const activeVideoWrapper = activeSlide.querySelector('.video');
      const activeVideo = activeSlide.querySelector('video');
      const activeYoutube = activeSlide.querySelector('.video-format--youtube iframe');
      const activeVimeo = activeSlide.querySelector('.video-format--vimeo iframe');

      // Pause all slides
      slides.forEach(slide => {
        const videoWrapper = slide.querySelector('.video');
        const video = slide.querySelector('video');
        const youtube = slide.querySelector('.video-format--youtube iframe');
        const vimeo = slide.querySelector('.video-format--vimeo iframe');

        if (video !== null) {
          video.pause();
          if (videoWrapper.classList.contains('has-autoplay')) {
            video.pause();
          }
        }

        if (youtube !== null) {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
          if (videoWrapper.classList.contains('has-autoplay')) {
            youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
          }
        }

        if (vimeo !== null) {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
          if (videoWrapper.classList.contains('has-autoplay')) {
            vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
          }
        }
      });

      // Active slide autoplay
      if (activeVideoWrapper.classList.contains('has-autoplay')) {
        if (activeVideo !== null) {
          activeVideo.play();
        }

        if (activeYoutube !== null) {
          activeYoutube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        }

        if (activeVimeo !== null) {
          activeVimeo.contentWindow.postMessage('{"method":"play"}', '*');
        }
      }

      // Pause on slide change
      // eslint-disable-next-line no-unused-vars
      $(slider).on('beforeChange', (e, slick, currentSlide, nextSlide) => {
        const fromSlide = slides[currentSlide];
        const fromVideo = fromSlide.querySelector('video');
        const fromYoutube = fromSlide.querySelector('.video-format--youtube iframe');
        const fromVimeo = fromSlide.querySelector('.video-format--vimeo iframe');

        if (fromVideo !== null) {
          fromVideo.pause();
        }

        if (fromYoutube !== null) {
          fromYoutube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        }

        if (fromVimeo !== null) {
          fromVimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        }
      });

      // Play on slide change
      // eslint-disable-next-line no-unused-vars
      $(slider).on('afterChange', (e, slick, currentSlide) => {
        const toSlide = slides[currentSlide];
        const toVideoWrapper = toSlide.querySelector('.video');
        const toVideo = toSlide.querySelector('video');
        const toYoutube = toSlide.querySelector('.video-format--youtube iframe');
        const toVimeo = toSlide.querySelector('.video-format--vimeo iframe');
        
        if (toVideoWrapper !== null && toVideoWrapper.classList.contains('has-autoplay')) {
          if (toVideo !== null) {
            toVideo.play();
          }

          if (toYoutube !== null) {
            toYoutube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
          }

          if (toVimeo !== null) {
            toVimeo.contentWindow.postMessage('{"method":"play"}', '*');
          }
        }
      });
    });
  });

  // Flickity sliders
  flickitySliders.forEach(slider => {
    const carousel = slider.querySelector('.flickity-carousel');
    
    $(carousel).on('ready.flickity', () => {
      const slides = [].slice.call(slider.querySelectorAll('.carousel-cell'));
      const activeSlide = slider.querySelector('.carousel-cell.is-selected');
      const activeVideoWrapper = activeSlide.querySelector('.video');
      const activeVideo = activeSlide.querySelector('video');
      const activeYoutube = activeSlide.querySelector('.video-format--youtube iframe');
      const activeVimeo = activeSlide.querySelector('.video-format--vimeo iframe');
      // const flkty = $(carousel).data('flickity');
      let previousIndex = 0;

      // Pause all slides
      slides.forEach(slide => {
        const videoWrapper = slide.querySelector('.video');
        const video = slide.querySelector('video');
        const youtube = slide.querySelector('.video-format--youtube iframe');
        const vimeo = slide.querySelector('.video-format--vimeo iframe');

        if (video !== null) {
          video.pause();
          if (videoWrapper.classList.contains('has-autoplay')) {
            video.pause();
          }
        }

        if (youtube !== null) {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
          if (videoWrapper.classList.contains('has-autoplay')) {
            youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
          }
        }

        if (vimeo !== null) {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
          if (videoWrapper.classList.contains('has-autoplay')) {
            vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
          }
        }
      });

      // Active slide autoplay
      if (activeVideoWrapper.classList.contains('has-autoplay')) {
        if (activeVideo !== null) {
          activeVideo.play();
        }

        if (activeYoutube !== null) {
          activeYoutube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        }

        if (activeVimeo !== null) {
          activeVimeo.contentWindow.postMessage('{"method":"play"}', '*');
        }
      }
      
      

      // Pause on slide change
      // eslint-disable-next-line no-unused-vars
      $(carousel).on('change.flickity', (event, index) => {  
        const fromSlide = slides[previousIndex];
        const fromVideo = fromSlide.querySelector('video');
        const fromYoutube = fromSlide.querySelector('.video-format--youtube iframe');
        const fromVimeo = fromSlide.querySelector('.video-format--vimeo iframe');

        if (fromVideo !== null) {
          fromVideo.pause();
        }

        if (fromYoutube !== null) {
          fromYoutube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        }

        if (fromVimeo !== null) {
          fromVimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        }

        previousIndex = index;
      });
      
      // Play on slide change
      // eslint-disable-next-line no-unused-vars
      $(carousel).on('settle.flickity', (event, index) => {
        const toSlide = slides[index];
        const toVideoWrapper = toSlide.querySelector('.video');
        const toVideo = toSlide.querySelector('video');
        const toYoutube = toSlide.querySelector('.video-format--youtube iframe');
        const toVimeo = toSlide.querySelector('.video-format--vimeo iframe');
        
        if (toVideoWrapper.classList.contains('has-autoplay')) {
          if (toVideo !== null) {
            toVideo.play();
          }

          if (toYoutube !== null) {
            toYoutube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
          }

          if (toVimeo !== null) {
            toVimeo.contentWindow.postMessage('{"method":"play"}', '*');
          }
        }
      });
      
    });

  });
};

// YouTube iframe API Callbacks
const ytIframeCallbacks = () => {
  const videos = [].slice.call(document.querySelectorAll('.video-format--youtube'));

  if (videos === null || videos.length <= 0 || window.hideYTActivated) {
    return;
  }

  const onYouTubeIframeAPIReadyCallbacks = [];

  for(const playerWrap of document.querySelectorAll(".video-responsive")) {
    const ytId = playerWrap.parentElement.dataset.ytId;
    const playerFrame = playerWrap.querySelector("iframe");
    let player;
    // eslint-disable-next-line no-unused-vars
    const onPlayerReady = event => {
      // console.log(event);
    }
    // Hide YouTube suggestions
    // @link https://www.maxlaumeister.com/articles/hide-related-videos-in-youtube-embeds/
    const onPlayerStateChange = event => {
      // eslint-disable-next-line no-undef
      if(event.data === YT.PlayerState.ENDED){
        playerWrap.classList.add("ended");
        // eslint-disable-next-line no-undef
      } else if (event.data === YT.PlayerState.PAUSED){
        playerWrap.classList.add("paused");
        // eslint-disable-next-line no-undef
      } else if (event.data === YT.PlayerState.PLAYING){
        playerWrap.classList.remove("ended");
        playerWrap.classList.remove("paused");
      }
    };
    onYouTubeIframeAPIReadyCallbacks.push(function(){
      // eslint-disable-next-line no-undef
      player = new YT.Player(playerFrame,{
        videoId: ytId,
        events : {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });
    });

    playerWrap.addEventListener("click",function(){
      if (player === null || typeof player === 'undefined') {
        return;
      }
      const playerState = player.getPlayerState();
      // eslint-disable-next-line no-undef
      if (playerState === YT.PlayerState.ENDED){
        player.seekTo(0);
        // eslint-disable-next-line no-undef
      } else if (playerState === YT.PlayerState.PAUSED){
        player.playVideo();
      }
    });
  }

  window.onYouTubeIframeAPIReady = () => {
    for(const callback of onYouTubeIframeAPIReadyCallbacks) { callback(); }
  };

  window.hideYTActivated=true;
};

// Set global functions
global.modalVideoControls = () => {
  const modals = [].slice.call(document.querySelectorAll('.modal.video'));

  if (modals !== null) {
    modals.forEach(modal => {
      const videoWrapper = modal.querySelector('.video');
      const video = modal.querySelector('video');
      const youtube = modal.querySelector('.video-format--youtube iframe');
      const vimeo = modal.querySelector('.video-format--vimeo iframe');

      if (video !== null) {
        video.pause();
        if (videoWrapper.classList.contains('has-autoplay')) {
          video.pause();
        }
        $(modal).on('shown.bs.modal', function () {
          if (videoWrapper.classList.contains('has-autoplay')) {
            video.play();
          };
        });
        $(modal).on('hide.bs.modal', function () {
          video.pause();
        });
      }

      if (youtube !== null) {
        youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        if (videoWrapper.classList.contains('has-autoplay')) {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        }
        $(modal).on('shown.bs.modal', function () {
          if (videoWrapper.classList.contains('has-autoplay')) {
            youtube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
          };
        });
        $(modal).on('hide.bs.modal', function () {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        });
      }

      if (vimeo !== null) {
        vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        if (videoWrapper.classList.contains('has-autoplay')) {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        }
        $(modal).on('shown.bs.modal', function () {
          if (videoWrapper.classList.contains('has-autoplay')) {
            vimeo.contentWindow.postMessage('{"method":"play"}', '*');
          };
        });
        $(modal).on('hide.bs.modal', function () {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        });
      }

    });
  }
};

$(document).ready(() => {
  videoEnable();
  loadYTPlayerAPI();
  modalVideoControl();
  sliderVideoControl();
  ytIframeCallbacks();
});

export default videoEnable;