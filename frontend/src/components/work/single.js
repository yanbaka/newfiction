import PubSub from 'pubsub-js';

const $window = $(window);
const $header = $('header');
const $nextPost = $('.next-post');

PubSub.subscribe('scroll', (_, $scrollTop) => {
    const top = $nextPost.offset().top - $header.outerHeight();
    if ($scrollTop >= top) {
        const nextLink = $nextPost.data('url');
        window.location = nextLink;
    }
});