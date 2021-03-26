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



})(jQuery);