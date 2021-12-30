(function($, window) {

    var slick = $(".home2-customers__slider").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        nextArrow: $('#logo_slider_next'),
        prevArrow: $('#logo_slider_prev'),
        respondTo: 'window',
        responsive: [{
            breakpoint: 1250,
            settings: {
                slidesToShow: 3,
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
            }
        }]
    });
})(jQuery, window);