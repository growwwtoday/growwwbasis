const mq = {
  "sm":   576,
  "md":   768,
  "lg":   992,
  "xl":   1200,
  "xxl":  1360,
  "xxxl": 1500
}


$(document).ready(function() {

  const menuPlacement = () => {
    if($(window).width() >= mq.lg) {
      $('body').removeClass('lock');
      $('.js-nav-toggle').removeClass('is-active');
      $('.js-main-nav').append($('.js-hoofdmenu'));
      $('.js-top-bar-nav').append($('.js-topmenu'));
      $('.js-top-bar-select').append($('.js-productmenu'));
    // } else if($(window).width() < mq.lg && $(window).width() >= mq.sm) {
    }else {
      $('.js-panel-main-nav').append($('.js-hoofdmenu'));
      $('.js-panel-second-nav').append($('.js-topmenu'));
      $('.js-panel-select').append($('.js-productmenu'));
    }
  };

  menuPlacement();
  $(window).resize(menuPlacement);


  $('.js-nav-toggle').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
    $('body').toggleClass('lock');
  });
  
  $(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 20) {
         $(".nav-bar").addClass("nav-bar--scroll");
    } else {
       $('.nav-bar').removeClass('nav-bar--scroll');
    }
  });


$('.js-faq-toggle').on('click', function(e) {
  e.preventDefault();
  const parent = $(this).closest('.js-faq');
  if(parent.hasClass('is-active')) {
    parent.removeClass('is-active').find('.js-faq-content').stop().slideUp(300);
  } else {
    parent.addClass('is-active').find('.js-faq-content').stop().slideDown(300);
  }
});

});