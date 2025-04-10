import PubSub from 'pubsub-js';

const $triggerContact = $('#trigger-contact');
const $contact = $('.contact-parent');
const $close = $('.contact-parent .contact .close');

PubSub.subscribe('init', () => {
    $triggerContact.on('click', () => {
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
    })
});