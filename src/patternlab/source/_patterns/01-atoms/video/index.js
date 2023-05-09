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

const modalVideoControl = () => {
  const modals = [].slice.call(document.querySelectorAll('.modal.video'));

  if (modals !== null) {
    modals.forEach(modal => {
      const video = modal.querySelector('video');
      const youtube = modal.querySelector('.video-format--youtube iframe');
      const vimeo = modal.querySelector('.video-format--vimeo iframe');

      if (video !== null) {
        $(modal).on('shown.bs.modal', function () {
          video.play();
        });
        $(modal).on('hide.bs.modal', function () {
          video.pause();
        });
      }

      if (youtube !== null) {
        $(modal).on('shown.bs.modal', function () {
          youtube.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        });
        $(modal).on('hide.bs.modal', function () {
          youtube.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        });
      }

      if (vimeo !== null) {
        $(modal).on('shown.bs.modal', function () {
          vimeo.contentWindow.postMessage('{"method":"play"}', '*');
        });
        $(modal).on('hide.bs.modal', function () {
          vimeo.contentWindow.postMessage('{"method":"pause"}', '*');
        });
      }

    });
  }
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

$(document).ready(() => {
  videoEnable();
  loadYTPlayerAPI();
  modalVideoControl();
  ytIframeCallbacks();
});

export default videoEnable;