$(document).ready(function () {
    var deviceWidth = $(window).outerWidth();

    console.log(deviceWidth);

    if (deviceWidth <= 767) {
        $('.dropdown .mobile-disable').addClass('dropdown-toggle');
        $('.dropdown .mobile-disable').attr('data-toggle', 'dropdown');
    } else {
        $('.dropdown .mobile-disable').removeClass('dropdown-toggle');
        $('.dropdown .mobile-disable').attr('data-toggle', '');
    }

});

$(window).scroll(function () {

    var scrollTop = $(window).scrollTop();

    if (scrollTop > 50) {
        $('.navbar').addClass('navbar-fixed-top');
    } else {
        $('.navbar').removeClass('navbar-fixed-top');
    }

});