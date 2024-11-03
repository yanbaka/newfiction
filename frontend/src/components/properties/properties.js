import PubSub from 'pubsub-js';

const $aboutMenu = $('.aboutMenu.-upper');
PubSub.subscribe('init', () => {
    $('.aboutMenu__toggle').on('click', () => {
        if ($aboutMenu.hasClass('-open')) {
            $aboutMenu.removeClass('-open')
        } else {
            $aboutMenu.addClass('-open')
        }
    });
});