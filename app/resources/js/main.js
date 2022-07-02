$(document).ready(function () {
    $('.nav-toggle').click(function() {
        $('.nav-menu').toggleClass('is-active');
    });

    $('.delete').click(function() {
        $(this).parents('.message, .notification').fadeOut('slow');
    });

    $('.footer-button').click((e) => {
        e.preventDefault();
        $('html,body').animate({ scrollTop: 0 }, 600, () => {
            $('.footer-button').blur();
        });
        return false;
    });

    $(document).on('scroll', (e) => {
        $('.footer-button').toggleClass('is-hidden', $(document).scrollTop() <= 230);
    });
});