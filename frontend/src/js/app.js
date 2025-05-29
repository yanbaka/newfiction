import barba from '@barba/core';
import PubSub from 'pubsub-js';

import '../components/global/header';
import '../components/global/footer';
import '../components/global/resize';
import '../components/global/loading';
import '../components/contact/contact';

import '../components/work/single';

import { subscibeScroll as subscibeScrollSingle, unsubscribeScroll as unsubscibeScrollSingle } from '../components/work/single';
import { subscibeScroll as subscibeScrollTop, unsubscribeScroll as unsubscribeScrollTop, subscibeHover as subscibeHoverTop, unsubscribeHover as unsubscribeHoverTop } from '../components/top/background';
import { subscibeResize as subscibeResizeTop, unsubscribeResize as unsubscribeResizeTop } from '../components/top/resize';

const $window = $(window);
const $body = $('body');
const $header = $('header');

const $loading = $('.loading');

let currentPageId = null;

class Main {
  onDOMContentLoaded = () => {

    function loading() {
      const images = document.querySelectorAll('img');
      const imageLength = images.length;
      let loadCnt = 0;
      images.forEach((value, index) => {
          const image = new Image();
          image.onload = () => {
              loadComplete();
          };
          image.onerror = () => {
              loadComplete();
          };
          image.src = value.src;
      });

      function loadComplete() {
          loadCnt += 1;
          if (loadCnt >= imageLength) {
            setTimeout(() => {
              $loading.fadeOut();
              init();
            }, 500);
          }
      }
    }

    function init() {
      barba.init({
        transitions: [
          {
            name: 'page-resources',

            once(data) {
              // 初回ページのリソース読み込み
              const container = data.next.container;
              loadCSS(container?.getAttribute('data-css'), container);
              // loadJS(container?.getAttribute('data-js'), true);

              const id = $(container).data('id');
              $body.attr('data-id', id);

              $(`.menu a[data-link="${id}"]`).addClass('current');

              if (id === 'top') {
                subscibeScrollTop();
                subscibeResizeTop();
                subscibeHoverTop();
              }
              if (id === 'pdp') {
                subscibeScrollSingle();
              }
              PubSub.publish('scroll', $window.scrollTop());
              PubSub.publish('resize');
              PubSub.publish('hover');
          
              currentPageId = id;

            },

            beforeEnter(data) {
              // 古いリソースを削除
              unloadCSS();
              // unloadJS();

              // 新しいリソースを読み込み
              const container = data.next.container;
              loadCSS(container?.getAttribute('data-css'), container);
              // loadJS(container?.getAttribute('data-js'), false);

              const id = $(container).data('id');
              $body.attr('data-id', id);

              if (id === 'top') {
                subscibeScrollTop();
                subscibeResizeTop();
                subscibeHoverTop();
              }
              if (id === 'pdp') {
                subscibeScrollSingle();
              }

              if (currentPageId) {
                $(`.menu a[data-link="${currentPageId}"]`).removeClass('current');
              }
              $(`.menu a[data-link="${id}"]`).addClass('current');

              currentPageId = id;
            },

            leave(data) {
              const container = data.current.container;
              $(container).removeClass('-show');

              const id = $(container).data('id');

              if (id === 'top') {
                unsubscribeScrollTop();
                unsubscribeResizeTop();
                unsubscribeHoverTop();
              }
              if (id === 'pdp') {
                unsubscibeScrollSingle();
              }

            },
            enter(data) {
              $window.scrollTop(0);
              PubSub.publish('scroll', $window.scrollTop());
              PubSub.publish('resize');
              PubSub.publish('hover');
              $header.removeClass('-openMenu');
            },
          },
        ],
      });
    }

    function loadCSS(href, container) {
      if (!href || document.querySelector(`link[href="${href}"]`)) return;
    
      const link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = href;
      link.className = 'page-style';
      document.head.appendChild(link);

      link.onload = () => {
        $(container).addClass('-show');
      }
    }
    
    function unloadCSS() {
      document.querySelectorAll('link.page-style').forEach(link => link.remove());
    }
    

    $window.on('resize', () => {
      PubSub.publish('resize');
    })

    $window.on('scroll', () => {
      PubSub.publish('scroll', $window.scrollTop());
    })

    PubSub.publish('init');

    loading();
  };
}

const main = new Main();
window.addEventListener('DOMContentLoaded', main.onDOMContentLoaded);
