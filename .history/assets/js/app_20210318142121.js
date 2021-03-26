window.$ = window.jQuery = require('jquery');

import '@fancyapps/fancybox';

const mq = {
    "sm":   576,
    "md":   768,
    "lg":   992,
    "xl":   1200
}

$(document).on('click', '.js-nav-toggle', function(e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
    $('body').toggleClass('lock');
});