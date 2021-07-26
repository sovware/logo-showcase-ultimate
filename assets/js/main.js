(function ($) {

    "use strict";
    /* Replace all SVG images with inline SVG */
    const convertImages = (query, callback) => {
        const images = document.querySelectorAll(query);
        images.forEach(image => {
            fetch(image.src)
                .then(res => res.text())
                .then(data => {
                    const parser = new DOMParser();
                    const svg = parser.parseFromString(data, 'image/svg+xml').querySelector('svg');

                    if (image.id) svg.id = image.id;
                    if (image.className) svg.classList = image.classList;

                    image.parentNode.replaceChild(svg, image);
                })
                .then(callback)
                .catch(error => console.error(error))
        });
    }
    convertImages('img.wpwax-lsu-svg');

    /* Check lsu Carousel Data */
    let checkData = function (data, value) {
        return typeof data === 'undefined' ? value : data;
    };
    /* lsu Carousel */
    let lsuCarousel = document.querySelectorAll('.wpwax-lsu-carousel');
    lsuCarousel.forEach(function (el) {
        let swiper = new Swiper(el, {
            slidesPerView: checkData(parseInt(el.dataset.lsuItems), 4),
            spaceBetween: checkData(parseInt(el.dataset.lsuMargin), 30),
            // loop: checkData(el.dataset.lsuLoop, true),
            // slidesPerGroup: checkData(parseInt(el.dataset.lsuPerslide), 1),
            // speed: checkData(parseInt(el.dataset.lsuSpeed), 3000),
            // autoplay: checkData(JSON.parse(el.dataset.lsuAutoplay), {}),
            navigation: {
                nextEl: '.wpwax-lsu-carousel-nav__btn--next',
                prevEl: '.wpwax-lsu-carousel-nav__btn--prev',
            },
            // breakpoints: checkData(JSON.parse(el.dataset.lsuResponsive), {})
        })
    });

})(jQuery);