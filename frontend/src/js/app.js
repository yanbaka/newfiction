import barba from '@barba/core';
import gsap from 'gsap';
import PubSub from 'pubsub-js';

import '../components/global/resize';
import '../components/contact/contact';

const $window = $(window);

class Main {
  onDOMContentLoaded = () => {
    barba.init({
      transitions: [
        {
          name: 'fade-transition',
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
    
    PubSub.publish('init');
    PubSub.publish('resize');
  };
}

const main = new Main();
window.addEventListener('DOMContentLoaded', main.onDOMContentLoaded);
