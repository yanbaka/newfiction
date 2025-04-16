import PubSub from 'pubsub-js';

const $header = $('header');

let token = null;

export function subscibeResize() {
    const $backgroundImage = $('.background-image');

    token = PubSub.subscribe('resize', () => {
    
        const $heightH = $header.outerHeight();
        const $main = $('.main');
        const $mainH = $main.height();
        $backgroundImage.css('height', $mainH + $heightH);
    });
}

export function unsubscribeResize() {
    PubSub.unsubscribe(token);
}

