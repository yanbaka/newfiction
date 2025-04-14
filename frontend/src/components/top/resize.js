import PubSub from 'pubsub-js';

const $header = $('header');
const $main = $('.main');
const $backgroundImage = $('.background-image');

PubSub.subscribe('resize', () => {
    const $heightH = $header.outerHeight();
    const $mainH = $main.height();
    $backgroundImage.css('height', $mainH + $heightH);
});