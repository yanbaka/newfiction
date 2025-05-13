import PubSub from 'pubsub-js';

const API_KEY = 'AIzaSyDWZtDqsYIrZDrT5XnVitf-d5HHny3Qx2w';

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
    const countries = ['en'];

    $('.language a').each((index, element) => {
        $(element).on('click', () => {
            const language = $(element).data('language');
            changeLanguage(language);
        })
    });

    function getCountryCode(lat, lng) {
      const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=${API_KEY}`;

      fetch(geocodeUrl)
        .then(response => response.json())
        .then(data => {
          const components = data.results[0].address_components;
          const country = components.find(c => c.types.includes("country"));
          document.getElementById("country-code").textContent =
            "国コード: " + (country ? country.short_name : "不明");
        })
        .catch(err => {
          console.error("Geocodingエラー:", err);
          document.getElementById("country-code").textContent = "国コード: エラー";
        });
    }

    // 現在位置情報取得
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          async (position) => {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            getCountryCode(lat, lon);
      
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