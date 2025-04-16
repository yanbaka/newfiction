import barba from '@barba/core';
import PubSub from 'pubsub-js';

import '../components/global/header';
import '../components/global/resize';
import '../components/contact/contact';

import '../components/work/single';

import { subscibeScroll as subscibeScrollSingle, unsubscribeScroll as unsubscibeScrollSingle } from '../components/work/single';
import { subscibeScroll as subscibeScrollTop, unsubscribeScroll as unsubscribeScrollTop } from '../components/top/background';
import { subscibeResize as subscibeResizeTop, unsubscribeResize as unsubscribeResizeTop } from '../components/top/resize';

const $window = $(window);
const $body = $('body');

let currentPageId = null;

class Main {
  onDOMContentLoaded = () => {

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
    
    function loadJS(src, isFirst) {
      if (!src) return;
    
      const script = document.createElement('script');
      script.src = src;
      script.className = 'page-script';
      script.defer = true;
      document.body.appendChild(script);

      script.onload = () => {
        PubSub.publish('resize');
        PubSub.publish('scroll', $window.scrollTop());
        if (isFirst) {
          PubSub.publish('init');
        }
      }
    }
    
    function unloadJS() {
      document.querySelectorAll('script.page-script').forEach(script => script.remove());
    }

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
            }
            if (id === 'pdp') {
              subscibeScrollSingle();
            }

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
            $window.scrollTop(0);
            const container = data.current.container;
            $(container).removeClass('-show');

            const id = $(container).data('id');

            if (id === 'top') {
              unsubscribeScrollTop();
              unsubscribeResizeTop();
            }
            if (id === 'pdp') {
              unsubscibeScrollSingle();
            }

          },
          enter(data) {
            PubSub.publish('scroll', $window.scrollTop());
            PubSub.publish('resize');
          },
        },
      ],
    });

    $window.on('resize', () => {
      PubSub.publish('resize');
    })

    $window.on('scroll', () => {
      PubSub.publish('scroll', $window.scrollTop());
    })

    PubSub.publish('scroll', $window.scrollTop());
    PubSub.publish('resize');
  };
}

const main = new Main();
window.addEventListener('DOMContentLoaded', main.onDOMContentLoaded);
