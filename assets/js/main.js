(function ($) {

    /* Check lsu Carousel Data */
    let checkData = function (data, value) {
        return typeof data === 'undefined' ? value : data;
    };
    /* lsu Carousel */
    let lsuCarousel = document.querySelectorAll('.wpWax-lsu-carousel');
    lsuCarousel.forEach(function (el) {
        let swiper = new Swiper(el, {
            slidesPerView: checkData(parseInt(el.dataset.lsuItems), 4),
            spaceBetween: checkData(parseInt(el.dataset.lsuMargin), 30),
            loop: checkData(el.dataset.lsuLoop, true),
            slidesPerGroup: checkData(parseInt(el.dataset.lsuPerslide), 1),
            speed: checkData(parseInt(el.dataset.lsuSpeed), 3000),
            autoplay: checkData(JSON.parse(el.dataset.lsuAutoplay), {}),
            navigation: {
                nextEl: '.wpWax-lsu-carousel-nav__btn--next',
                prevEl: '.wpWax-lsu-carousel-nav__btn--prev',
            },
            breakpoints: checkData(JSON.parse(el.dataset.lsuResponsive), {})
        })
    });

})(jQuery);