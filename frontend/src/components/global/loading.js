import PubSub from 'pubsub-js';

PubSub.subscribe('loading', () => {
    const $loading = $('.logding');

    const images = document.querySelectorAll('img');
    const imageLength = images.length;
    let loadCnt = 0;
    images.forEach((value, index) => {
        const image = new Image();
        image.onload = () => {
            loadComplete();
        };
        image.onerror = () => {
            loadComplete();
        };
        image.src = value.src;
    });

    function loadComplete() {
        loadCnt += 1;
        if (loadCnt >= imageLength) {
            $loading.fadeOut();
        }
    }
});