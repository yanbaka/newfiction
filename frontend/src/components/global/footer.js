import PubSub from 'pubsub-js';

const $window = $(window);
const $body = $('body');
const $header = $('header');
const $foot = $('.foot');
const $capabilities = $('.capabilities');
const $follower = $('.foot .follower');
const $logo = $('.foot .logo');

let mouseX = 0;
let mouseY = 0;
let currentX = 0;
let currentY = 0;

PubSub.subscribe('init', () => {
    $foot.on('mouseenter', (e) => {
        $follower.addClass('-show');
    })
    $foot.on('mouseleave', () => {
        $follower.removeClass('-show');
    })

    const offset = $foot.offset();
    $foot.on("mousemove", (e) => {
        mouseX = e.clientX - offset.left;
        mouseY = e.clientY - offset.top;
    });

    function followMouse() {
        const speed = 0.1; // 0.1〜0.3 くらいが自然、数値上げると早く追う
        currentX += (mouseX - currentX) * speed;
        currentY += (mouseY - currentY) * speed;
      
        $follower.css('transform', `translate(${currentX}px, ${currentY}px)`);
      
        requestAnimationFrame(followMouse);
    }

    followMouse();

    $logo.on('mouseover', () => {
        $logo.addClass('-on');
    });

    $logo.on('mouseout', () => {
        $logo.removeClass('-on');
    });
})

PubSub.subscribe('scroll', () => {
    if ($window.scrollTop() > $capabilities.offset().top - $header.height()) {
        $body.addClass('-hide-bg-image');
    } else {
        $body.removeClass('-hide-bg-image');
    }
});
