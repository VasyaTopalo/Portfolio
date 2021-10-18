jQuery(function($){
    "use strict";


    // responsive menu

    if ($('.fa-bars').length) {

      let flag = false;

      $('.main-nav i').on('click', function() {
        if(!flag) {
          $('.main-nav ul').toggleClass('main-nav-active');
          $('.fa-bars').hide(200);
          $('.fa-times').show(200)
        }
        else {
          $('.main-nav ul').removeClass('main-nav-active');
          $('.fa-times').hide(200);
          $('.fa-bars').show(200)
        }
        flag = !flag;
      });
    }
    if ($('.scroll-to-menu').length) {
      $('.scroll-to-menu').click(function () {
        $("html, body").animate({scrollTop:0}, 1000);
      });
    }

    if ($('.shop-carousel').length) {
        $('.open-info-video').magnificPopup({
            type: 'iframe'
        });
    }

    if ($('.testimonial-gallery').length) {
        $('.testimonial-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });

    }

    // shop

    if ($('.shop-carousel').length) {
        $('.shop-carousel').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 2,
            appendArrows: $('.shop-slider-nav'),
            prevArrow: '<div class="left"><i class="fas fa-arrow-left"></i></div>',
            nextArrow: '<div class="right"><i class="fas fa-arrow-right"></i></div>',
            responsive: [
              {
                breakpoint:725,
                settings: {
                  slidesToShow:3,
                  slidesToScroll: 1,
                }
              },
              {
                breakpoint:520,
                settings: {
                  slidesToShow:2,
                  slidesToScroll: 1,
                }
              }
            ]
        });
    }

    if ($('.home-slider').length) {
        $('.home-slider').slick({
            vertical: true,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000,
        });
    }

    if ($('.testimonial-carousel').length) {
        $('.testimonial-carousel').slick({
            appendArrows: $('.testimonial-slider'),
            prevArrow: '<div class="left-arrow"><i class="fas fa-arrow-left"></i></div>',
            nextArrow: '<div class="right-arrow"><i class="fas fa-arrow-right"></i></div>',
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
              {
                breakpoint:350,
                settings: {
                  slidesToShow:2,
                  slidesToScroll: 1,
                }
              }
            ]
        });
        $('.testimonial-carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide){
          let testimonialTabContainer = $('.testimonial-tab-container');
          let currantIndex = nextSlide + 1;

          testimonialTabContainer.find($('.tab-item')).hide();
          testimonialTabContainer.find($('.tab-' + currantIndex)).show();
        });
    }

    if ($('.tweet-slider-content').length) {
        $('.tweet-slider-content').slick({
            vertical: true,
            appendArrows: $('.tweet-slider .arrows'),
            prevArrow: '<div class="up"><i class="fas fa-arrow-up"></i></div>',
            nextArrow: '<div class="down"><i class="fas fa-arrow-down"></i></div>',
            slidesToShow: 1,
            slidesToScroll: 1,

        });
    }

});
