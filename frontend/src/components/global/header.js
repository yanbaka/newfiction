import PubSub from 'pubsub-js';

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
    const countries = ['en'];

    $('.language a').each((index, element) => {
        $(element).on('click', () => {
            const language = $(element).data('language');
            changeLanguage(language);
        })
    });

    // 現在位置情報取得
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          async (position) => {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
      
            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`, {
              headers: {
                'User-Agent': 'New Fiction'
              }
            });
      
            const data = await response.json();
      
            if (data.address && data.address.country_code) {
                const countryCode = data.address.country_code;
                const bool = countries.includes(countryCode);
                if (bool) {
                    changeLanguage(countryCode);
                }
            }
          },
        );
      }

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