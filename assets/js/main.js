(function($) {

    function alljs() {
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
        let checkData = function(data, value) {
            return typeof data === 'undefined' ? value : data;
        };

        /* lsu Carousel */
        let lsuCarousel = document.querySelectorAll('.wpwax-lsu-carousel');
        let hasPagination;

        lsuCarousel.forEach(function(el, i) {

            el.classList.add(`wpwax-lsu-carousel-${i}`);

            el.childNodes.forEach(el => {

                if (el.className === "wpwax-lsu-carousel-pagination") {
                    hasPagination = true;
                }

            });

            let navBtnPrev = document.querySelectorAll('.wpwax-lsu-carousel-nav__btn-prev');
            let navBtnNext = document.querySelectorAll('.wpwax-lsu-carousel-nav__btn-next');
            const paginationElement = document.querySelectorAll(".wpwax-lsu-carousel-pagination");

            navBtnPrev.forEach((el, i) => { el.classList.add(`wpwax-lsu-carousel-nav__btn-prev-${i}`); });
            navBtnNext.forEach((el, i) => { el.classList.add(`wpwax-lsu-carousel-nav__btn-next-${i}`); });
            hasPagination && paginationElement.forEach((el) => el.classList.add(`wpwax-lsu-carousel-pagination-${i}`));
            let swiper = new Swiper(`.wpwax-lsu-carousel-${i}`, {
                slidesPerView: checkData(parseInt(el.dataset.lsuItems), 4),
                spaceBetween: checkData(parseInt(el.dataset.lsuMargin), 30),
                loop: checkData(JSON.parse(el.dataset.lsuLoop), true),
                slidesPerGroup: checkData(parseInt(el.dataset.lsuPerslide), 1),
                speed: checkData(parseInt(el.dataset.lsuSpeed), 3000),
                autoplay: checkData(JSON.parse(el.dataset.lsuAutoplay), {}),
                navigation: {
                    nextEl: `.wpwax-lsu-carousel-nav__btn-next-${i}`,
                    prevEl: `.wpwax-lsu-carousel-nav__btn-prev-${i}`,
                },
                pagination: {
                    el: `.wpwax-lsu-carousel-pagination-${i}`,
                    type: 'bullets',
                    clickable: true,
                },
                breakpoints: checkData(JSON.parse(el.dataset.lsuResponsive), {})
            })
        });

        /* Tooltip Initialization */
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    }   

    
    window.addEventListener('load', () => { 
        alljs();
    })
    

    /* Elementor Edit Mode */
    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            alljs();
            elementorFrontend.hooks.addAction('frontend/element_ready/widget', function() {
                alljs();
            });
        }
    });

})(jQuery);