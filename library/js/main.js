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
      $('.js-nav-bar__right').prepend($('.js-nav-bar__hoofdmenu'));
    }else {
      $('.js-panel__inner').append($('.js-nav-bar__hoofdmenu'));
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