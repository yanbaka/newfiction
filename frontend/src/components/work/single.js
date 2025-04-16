import PubSub from 'pubsub-js';
import barba from '@barba/core';

const $window = $(window);
const $header = $('header');

let token = null;

export function subscibeScroll() {
    token = PubSub.subscribe('scroll', (_, $scrollTop) => {
        const $nextPost = $('.next-post');
        if(!$nextPost.length) return;

        const top = $nextPost.offset().top - $header.outerHeight();

        // 次のworkの色変更
        if (top - $scrollTop <= 50) {
            $nextPost.addClass('-white')
        } else {
            $nextPost.removeClass('-white')
        }

        // 次のworkへ遷移
        if ($scrollTop >= top) {
            const nextLink = $nextPost.data('url');
            barba.go(nextLink);
        }
    });
}

export function unsubscribeScroll() {
    PubSub.unsubscribe(token);
}