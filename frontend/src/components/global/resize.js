import PubSub from 'pubsub-js';

const $body = $('body');
const $fixedFoot = $('.foot');

PubSub.subscribe('resize', () => {
    const pb = $fixedFoot.innerHeight();
    $body.css('padding-bottom', pb);
});