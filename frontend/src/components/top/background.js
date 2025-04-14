import PubSub from 'pubsub-js';

const $window = $(window);

PubSub.subscribe('scroll', (_, $scrollTop) => {
    $('.bg-trigger').each((key, element) => {
        const triggerTarget = $(element);
        const triggerTargetId = triggerTarget.data('bg-trigger');
        const start = triggerTarget.offset().top - $window.height();
        const end = triggerTarget.offset().top;
        const p = 1 - ($scrollTop - start) / (end - start);

        const imageTarget = $(`.background-image .background-${triggerTargetId}`);
        imageTarget.css('clip-path', `inset(${p * 100}% 0% 0% 0%)`)
    });
});