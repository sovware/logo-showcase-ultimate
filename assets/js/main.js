(function($) {

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

        // console.log(typeof checkData(parseInt(el.dataset.lsuMargin), 30));

        let swiper = new Swiper(`.wpwax-lsu-carousel-${i}`, {
            slidesPerView: checkData(parseInt(el.dataset.lsuItems), 4),
            spaceBetween: checkData(parseInt(el.dataset.lsuMargin), 20),
            loop: checkData(JSON.parse(el.dataset.lsuLoop), true),
            slidesPerGroup: checkData(parseInt(el.dataset.lsuPerslide), 4),
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

    /* Marquee wrapper value */
    let lsuStyle = document.createElement('style');
    document.head.append(lsuStyle);
    lsuStyle.innerHTML = `
        .wpwax-lsu-carousel-marquee .swiper-wrapper{
            animation: wpwaxLsuMarquee var(--lsu-marqueeSpeed) linear infinite running;
        }
        @keyframes wpwaxLsuMarquee {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(var(--lsu-marqueeItemsWidth), 0);
            }
        }
    `;
    let lsuMarqueeCarousel = document.querySelectorAll('.wpwax-lsu-carousel-marquee');
    lsuMarqueeCarousel.forEach(el => {
        let lsuMarqueeCarouselItem = el.querySelectorAll('.wpwax-lsu-item:not(.swiper-slide-duplicate)');
        lsuMarqueeCarouselItem.forEach(childEl => {
            let lsuMarqueeWrapperWidth = lsuMarqueeCarouselItem.length * (childEl.offsetWidth + checkData(parseInt(el.dataset.lsuMargin)));
            el.style.setProperty('--lsu-marqueeItemsWidth', `-${lsuMarqueeWrapperWidth}px`);
            el.style.setProperty('--lsu-marqueeSpeed', `${checkData(parseInt(el.dataset.lsuSpeed))}ms`);
        })

    });

    /* Tooltip Initialization */
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    /* Tooltip Dynamic Style */
    const tooltips = document.querySelectorAll('.wpwax-lsu-item-inner');

    tooltips.forEach(tooltip => tooltip.addEventListener('mouseover', function() {
        let tooltipId = tooltip.getAttribute('aria-describedby');
        let tooltipStyle = tooltip.closest('.wpwax-lsu-ultimate').getAttribute('style');
        let tooltipDomElm = document.querySelector(`#${tooltipId}`);
        if (tooltipDomElm) {
            let tooltipArrow = tooltipDomElm.querySelector(`#${tooltipId} .tooltip-arrow`).getAttribute('style');
            let tooltipBackColor = tooltipStyle.split(';')[2];
            tooltipDomElm.querySelector(`#${tooltipId} .tooltip-inner`).setAttribute('style', tooltipStyle);
            tooltipDomElm.querySelector(`#${tooltipId} .tooltip-arrow`).style = `${tooltipArrow}${tooltipBackColor};`;
        }

    }));

})(jQuery);