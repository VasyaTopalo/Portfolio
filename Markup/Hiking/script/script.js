jQuery(function($){
    "use strict";

    new WOW().init();

    $('.mobile-menu').hide();
    $('.burger').on('click', function () {
        $(this).toggleClass('burger-active');
        $('.mobile-menu').slideToggle(400);
    });

});
