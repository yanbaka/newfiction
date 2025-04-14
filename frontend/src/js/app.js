import barba from '@barba/core';
import gsap from 'gsap';
import PubSub from 'pubsub-js';

import '../components/global/header';
import '../components/global/resize';
import '../components/contact/contact';

const $window = $(window);

class Main {
  onDOMContentLoaded = () => {

    function loadCSS(href) {
      if (!href || document.querySelector(`link[href="${href}"]`)) return;
    
      const link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = href;
      link.className = 'page-style';
      document.head.appendChild(link);
    }
    
    function unloadCSS() {
      document.querySelectorAll('link.page-style').forEach(link => link.remove());
    }
    
    function loadJS(src, isFirst) {
      if (!src) return;
    
      const script = document.createElement('script');
      script.src = src;
      script.className = 'page-script';
      script.defer = true; // かならずdeferを入れる（順序保証）
      document.body.appendChild(script);

      if (isFirst) {
        script.onload = () => {
          PubSub.publish('init');
          PubSub.publish('resize');
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
            loadCSS(container?.getAttribute('data-css'));
            loadJS(container?.getAttribute('data-js'), true);
          },

          beforeEnter(data) {
            // 古いリソースを削除
            unloadCSS();
            unloadJS();

            // 新しいリソースを読み込み
            const container = data.next.container;
            loadCSS(container?.getAttribute('data-css'));
            loadJS(container?.getAttribute('data-js'), false);
          },

          leave(data) {
            $window.scrollTop(0);
            return gsap.to(data.current.container, {
              opacity: 0,
              duration: 0,
              onComplete: () => {
                data.current.container.style.display = 'none';
              },
            });
          },
          enter(data) {
            const container = data.next.container;
            container.style.display = 'block';
            container.style.opacity = 0;
            // 新しいページをフェードイン
            return gsap.to(container, {
              opacity: 1,
              duration: 0.5,
            });
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
  };
}

const main = new Main();
window.addEventListener('DOMContentLoaded', main.onDOMContentLoaded);
