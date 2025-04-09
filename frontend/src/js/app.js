import barba from '@barba/core';
import gsap from 'gsap';

barba.init({
  transitions: [
    {
      name: 'fade-transition',
      leave(data) {
        // 前のページをフェードアウト
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
