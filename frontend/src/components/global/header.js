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

    const $header = $('header');
    // マウス位置によってのヘッダー挙動
    $(document).on('mousemove', (e) => {
        const threshold = 160;

        if (e.clientY <= threshold) {
            $header.addClass('-showHeader');
          } else {
            $header.removeClass('-showHeader');
        }
    });

    $('header .toggle').on('click', () => {
        if ($header.hasClass('-openMenu')) {
            $header.removeClass('-openMenu');
        } else {
            $header.addClass('-openMenu');
        }
    })
});

PubSub.subscribe('resize', () => {
    const doc = document.documentElement;
    doc.style.setProperty('--app-height', `${window.innerHeight}px`);
})