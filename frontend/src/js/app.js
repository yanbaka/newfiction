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
          duration: 0.5,
        });
      },
      enter(data) {
        // 新しいページをフェードイン
        return gsap.from(data.next.container, {
          opacity: 0,
          duration: 0.5,
        });
      },
    },
  ],
});
