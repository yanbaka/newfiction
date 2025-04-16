import PubSub from 'pubsub-js';

const $window = $(window);

let token = null;

export function subscibeScroll() {
    PubSub.subscribe('scroll', (_, $scrollTop) => {
        $('.bg-trigger').each((key, element) => {
            const triggerTarget = $(element);
            const triggerTargetId = triggerTarget.data('bg-trigger-id');
            const triggerTargetType = triggerTarget.data('bg-type');
    
            const imageTarget = $(`.background-image .background-${triggerTargetId}`);
            if (triggerTargetType === 'clip') {
                const start = triggerTarget.offset().top - $window.height();
                const end = triggerTarget.offset().top;
                const p = 1 - ($scrollTop - start) / (end - start);
                imageTarget.css('clip-path', `inset(${p * 100}% 0% 0% 0%)`)
            } else {
                const start = triggerTarget.offset().top;
                if ($scrollTop > start) {
                    imageTarget.css('clip-path', `inset(0% 0% 0% 0%)`)
                } else {
                    imageTarget.css('clip-path', `inset(100% 0% 0% 0%)`)
                }
            }
        });
    });
}

export function unsubscribeScroll() {
    PubSub.unsubscribe(token);
}