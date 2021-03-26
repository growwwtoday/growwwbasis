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
