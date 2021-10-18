jQuery(function($){
    "use strict";


    $('.sign-up-link').on('click', function () {
        $('#sign-up-modal').css('display', 'flex');
    });

    $('.sign-in-link').on('click', function () {
        $('#sign-in-modal').css('display', 'flex');
    });
    $('.close-modal').on('click', function () {
        $('#sign-in-modal').css('display', 'none');
        $('#sign-up-modal').css('display', 'none');
    });

    $('.mobile-menu-button').on('click', function () {
        $('.mobile-menu').toggleClass('mobile-menu-active');
        $('.mobile-menu-content').slideToggle(300);
    });

    $('#load-more-button').on('click', function () {
        $('#hidden-content').animate({'max-height': '5000px'}, 1500);
        $(this).hide(200);
    });



});