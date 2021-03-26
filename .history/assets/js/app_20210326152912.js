window.$ = window.jQuery = jQuery;

import 'slick-slider';
import '@fancyapps/fancybox';

(function( $ ) {

const mq = {
    "sm": 576,
    "md": 768,
    "lg": 992,
    "xl": 1200
};


$(document).on('click', '.js-nav-toggle', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
    $('html').toggleClass('lock');
});

var replaceMenu = function () {
    if ($(window).width() < mq.lg) {
        $('.js-panel-inner').append($('.js-nav-bar-menu'));
    } else {
        $('.js-nav-bar-right').append($('.js-nav-bar-menu'));
        $('.panel').removeClass('panel-active');
        $('.nav-toggle').removeClass('is-active');
        $('html').removeClass('lock');
    }
}

replaceMenu();
$(window).on('resize', function () {
    replaceMenu();
});

$(document).on('ready', function(){
$('.js-slider-full').slick({
    infinite: true,
    slidesToScroll: 1,
    variableWidth: true,
    rows: 0,
    arrows: false,
    dots: false,
    }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var count = $('.js-home-hero-count');
    count.addClass('changing');
    setTimeout(function () {
        count.html(nextSlide + 1);
        count.removeClass('changing');
        $('.js-slider-line').attr('data-number', nextSlide + 1);
    }, 500);
});

// Builder components
// $(document).on('ready', function(){
    $('.js-builder-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        rows: 0,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: mq.lg,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
        ]
    })

 });

// builder toggle
$(document).on('click', '.js-faq-toggle', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
    console.log('123');
    const parent = $(this).closest('.js-faq');
    if(parent.hasClass('is-active')) {
      parent.removeClass('is-active').find('.js-faq-content').stop().slideUp(300);
    } else {
      parent.addClass('is-active').find('.js-faq-content').stop().slideDown(300);
    }
});

})(jQuery);