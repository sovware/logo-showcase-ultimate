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
    let lsuCarousel = $(".wpwax-lsu-carousel")

    lsuCarousel.each(function(i,el){
        let t = $(this);
        t.addClass('wpwax-lsu-carousel-'+i);
        t.find('.wpwax-lsu-carousel-nav__btn-next').addClass('wpwax-lsu-carousel-nav__btn-next-'+i);
        t.find('.wpwax-lsu-carousel-nav__btn-prev').addClass('wpwax-lsu-carousel-nav__btn-prev-'+i);
        t.find('.wpwax-lsu-carousel-pagination').addClass('wpwax-lsu-carousel-pagination-'+i);
        let swiper = new Swiper(".wpwax-lsu-carousel-"+i, {
            slidesPerView: checkData(t.data('lsu-items'), 3),
            spaceBetween: checkData(t.data('lsu-margin'), 30),
            loop: checkData(t.data('lsu-loop'), true),
            slidesPerGroup: checkData(t.data('lsu-perslide'), 1),
            speed: checkData(t.data('lsu-speed'), 3000),
            autoplay: checkData(t.data('lsu-autoplay'), {}),
            navigation: {
                nextEl: '.wpwax-lsu-carousel-nav__btn-next-'+i,
                prevEl: '.wpwax-lsu-carousel-nav__btn-prev-'+i,
            },
            pagination: {
                el: '.wpwax-lsu-carousel-pagination-'+i,
                type: 'bullets',
                clickable: true,
            },
            breakpoints: checkData(t.data('lsu-responsive'), {})
        })
    });

    /* Tooltip Initialization */
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

})(jQuery);
