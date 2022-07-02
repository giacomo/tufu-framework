(function () {
'use strict';

$(document).ready(function () {
    $('.nav-toggle').click(function () {
        $('.nav-menu').toggleClass('is-active');
    });

    $('.delete').click(function () {
        $(this).parents('.message, .notification').fadeOut('slow');
    });

    $('.footer-button').click(function (e) {
        e.preventDefault();
        $('html,body').animate({ scrollTop: 0 }, 600, function () {
            $('.footer-button').blur();
        });
        return false;
    });

    $(document).on('scroll', function (e) {
        $('.footer-button').toggleClass('is-hidden', $(document).scrollTop() <= 230);
    });
});

}());
