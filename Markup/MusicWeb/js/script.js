jQuery(function($){
    "use strict";

    new WOW().init();



    if ($('.about-slider-content').length) {
        $('.about-slider-content').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            appendArrows: $('.about__arrows'),
            prevArrow: '<div class="about-slider-left"><img src="images/header__arrow_left.png" alt=""></div>',
            nextArrow: '<div class="about-slider-right"><img src="images/header__arrow_right.png" alt=""></div>',
        });
    }

    if ($('.bars-menu').length) {
        $('.bars-menu .fa-bars').on('click', function () {
            $(this).hide(400);
            $('.bars-menu-content').slideToggle(400);
            $('.fa-times').show(200);
        });
        $('.bars-menu .fa-times').on('click', function () {
            $(this).hide(400);
            $('.bars-menu-content').slideToggle(400);
            $('.fa-bars').show(200);
        });
    }



    // Count
    let show = true;
    let countbox = ".static";
    $(window).on("scroll load resize", function () {
        if (!show) return false; // Отменяем показ анимации, если она уже была выполнена
        let w_top = $(window).scrollTop(); // Количество пикселей на которое была прокручена страница
        let e_top = $(countbox).offset().top; // Расстояние от блока со счетчиками до верха всего документа
        let w_height = $(window).height(); // Высота окна браузера
        let d_height = $(document).height(); // Высота всего документа
        let e_height = $(countbox).outerHeight(); // Полная высота блока со счетчиками
        if (w_top + 500 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
            $('.count').css('opacity', '1');
            $('.count').spincrement({
                thousandSeparator: "",
                duration: 1200
            });

            show = false;
        }
    });

});
