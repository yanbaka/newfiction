import PubSub from 'pubsub-js';

const $header = $('header');

let token = null;

export function subscibeScroll() {
    const $nextPost = $('.next-post');
    token = PubSub.subscribe('scroll', (_, $scrollTop) => {
        const top = $nextPost.offset().top - $header.outerHeight();
        if ($scrollTop >= top) {
            const nextLink = $nextPost.data('url');
            window.location = nextLink;
        }
    });
}

export function unsubscribeScroll() {
    PubSub.unsubscribe(token);
}