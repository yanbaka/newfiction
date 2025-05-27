import PubSub from 'pubsub-js';

const $window = $(window);

const changeLanguage = (language) => {
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
}

PubSub.subscribe('init', () => {
    $('.language a').each((index, element) => {
        $(element).on('click', () => {
            const language = $(element).data('language');
            changeLanguage(language);
        })
    });


    const $body = $('body');
    const $header = $('header');

    // マウス位置によってのヘッダー挙動
    $(document).on('mousemove', (e) => {
        const threshold = 160;

        if (e.clientY <= threshold) {
            $header.addClass('-showHeader');
          } else {
            if (!$body.hasClass('-is-at-top')) {
              $header.removeClass('-showHeader');
            }
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

PubSub.subscribe('scroll', () => {
  const $body = $('body');
  const $header = $('header');

  if ($window.scrollTop() <= 0) {
    $body.addClass('-is-at-top');
    $header.addClass('-showHeader');
  } else {
    $body.removeClass('-is-at-top');
  }
})