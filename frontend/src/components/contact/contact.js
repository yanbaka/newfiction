import PubSub from 'pubsub-js';

const $body = $('body');
const $triggerContact = $('#trigger-contact');
const $contact = $('.contact-parent');
const $close = $('.contact-parent .contact .close');

const $errMessage = $('.err-message')

PubSub.subscribe('init', () => {
    const language = $body.data('language');

    $triggerContact.on('click', () => {
        $contact.removeClass('-complete');
        $contact.addClass('-show');
        $('.form .wpcf7-not-valid-tip').remove();
    });

    $close.on('click', () => {
        $contact.addClass('-hide');
    });

    $contact.on('transitionend', () => {
        if ($contact.hasClass('-hide')) {
            $contact.removeClass('-hide');
            $contact.removeClass('-show');
        }
    });

    document.addEventListener('wpcf7mailsent', function (e) {
        $contact.addClass('-complete');
    });

    document.addEventListener('wpcf7mailfailed', function (e) {
        const message = e.detail.apiResponse.message;
        $errMessage.html(message);
    });

    document.addEventListener('wpcf7error', function (e) {
        const message = e.detail.apiResponse.message;
        $errMessage.html(message);
    }, false);

    document.addEventListener('wpcf7beforesubmit', function (e) {
        const $submitBtn = $(e.target).find('input[type="submit"]');
        const buttonText = language === 'en' ? 'SENDING…' : '送信中…';
        $submitBtn.val(buttonText).prop('disabled', true);
    });
    
    document.addEventListener('wpcf7submit', function (e) {
        const $submitBtn = $(e.target).find('input[type="submit"]');
        const buttonText = language === 'en' ? 'SEND IT →' : '送信';
        $submitBtn.val(buttonText).prop('disabled', false);
    });
});