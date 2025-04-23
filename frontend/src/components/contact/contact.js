import PubSub from 'pubsub-js';

const $triggerContact = $('#trigger-contact');
const $contact = $('.contact-parent');
const $close = $('.contact-parent .contact .close');

const $errMessage = $('.err-message')

PubSub.subscribe('init', () => {
    $triggerContact.on('click', () => {
        $contact.removeClass('-complete');
        $contact.addClass('-show');
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
});