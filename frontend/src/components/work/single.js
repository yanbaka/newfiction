import PubSub from 'pubsub-js';
import barba from '@barba/core';

let token = null;

function interpolateColor(startHex, endHex, t) {
    // ヘルパー：#rrggbb を {r, g, b} に変換
    const hexToRgb = (hex) => ({
      r: parseInt(hex.slice(1, 3), 16),
      g: parseInt(hex.slice(3, 5), 16),
      b: parseInt(hex.slice(5, 7), 16),
    });
  
    // ヘルパー：RGBオブジェクトを#rrggbb形式に変換
    const rgbToHex = ({ r, g, b }) =>
      `#${[r, g, b].map(c => c.toString(16).padStart(2, '0')).join('')}`;
  
    const start = hexToRgb(startHex);
    const end = hexToRgb(endHex);
  
    // tは0〜1の間
    const interpolated = {
      r: Math.round(start.r + (end.r - start.r) * t),
      g: Math.round(start.g + (end.g - start.g) * t),
      b: Math.round(start.b + (end.b - start.b) * t),
    };
  
    return rgbToHex(interpolated);
}

export function subscibeScroll() {
    token = PubSub.subscribe('scroll', (_, $scrollTop) => {
        const $next = $('.next');
        const $nextPost = $('.next-post');
        if(!$nextPost.length) return;

        const top = $nextPost.offset().top;
        const start = top - 240;
        const end = top - 40;
        let p = ($scrollTop - start) / (end - start);
        p = Math.min(Math.max(p, 0), 1);

        // 次のworkの色変更
        // if (top - $scrollTop <= 50) {
        //     $nextPost.addClass('-white');
        //     $next.addClass('-white');
        // } else {
        //     $nextPost.removeClass('-white');
        //     $next.removeClass('-white');
        // }

        $('.transform-bg-color').each((index, element) => {
            const fromColor = $(element).data('color-from');
            const toColor = $(element).data('color-to');
            const color = interpolateColor(fromColor, toColor, p);
            $(element).css('background-color', color);
        });

        $('.transform-color').each((index, element) => {
            const fromColor = $(element).data('color-from');
            const toColor = $(element).data('color-to');
            const color = interpolateColor(fromColor, toColor, p);
            $(element).css('color', color);
        });

        // 次のworkへ遷移
        if ($scrollTop >= top) {
            const nextLink = $nextPost.data('url');
            barba.go(nextLink);
        }
    });
}

export function unsubscribeScroll() {
    PubSub.unsubscribe(token);
}