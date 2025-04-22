import PubSub from 'pubsub-js';

const $window = $(window);
const $body = $('body');
const $header = $('header');
const $capabilities = $('.capabilities');
PubSub.subscribe('scroll', () => {
    if ($window.scrollTop() > $capabilities.offset().top - $header.height()) {
        $body.addClass('-hide-bg-image');
    } else {
        $body.removeClass('-hide-bg-image');
    }
});
