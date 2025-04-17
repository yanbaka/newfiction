import PubSub from 'pubsub-js';

PubSub.subscribe('init', () => {
    $('.language a').each((index, element) => {
        $(element).on('click', () => {
            const language = $(element).data('language');
            fetch(ajaxUrl, {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                  action: 'set_language',
                  lang: language,
                }),
            })
            .then(response => response.text())
            .then(() => {
                location.reload();
            });

        })
    });
});

PubSub.subscribe('resize', () => {
    const doc = document.documentElement;
    doc.style.setProperty('--app-height', `${window.innerHeight}px`);
})