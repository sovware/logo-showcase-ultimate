/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/blocks/lcg-ultimate-block.js":
/*!******************************************!*\
  !*** ./src/blocks/lcg-ultimate-block.js ***!
  \******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _attributes_json__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./attributes.json */ "./src/blocks/attributes.json");








function extra_js() {
  /* Replace all SVG images with inline SVG */
  const convertImages = (query, callback) => {
    const images = document.querySelectorAll(query);
    images.forEach(image => {
      fetch(image.src).then(res => res.text()).then(data => {
        const parser = new DOMParser();
        const svg = parser.parseFromString(data, 'image/svg+xml').querySelector('svg');
        if (image.id) svg.id = image.id;
        if (image.className) svg.classList = image.classList;
        image.parentNode.replaceChild(svg, image);
      }).then(callback).catch(error => console.error(error));
    });
  };
  convertImages('img.wpwax-lsu-svg');

  /* Check lsu Carousel Data */
  let checkData = function (data, value) {
    return typeof data === 'undefined' ? value : data;
  };

  /* lsu Carousel */
  let lsuCarousel = document.querySelectorAll('.wpwax-lsu-carousel');
  let hasPagination;
  lsuCarousel.forEach(function (el, i) {
    el.classList.add(`wpwax-lsu-carousel-${i}`);
    el.childNodes.forEach(el => {
      if (el.className === "wpwax-lsu-carousel-pagination") {
        hasPagination = true;
      }
    });
    let navBtnPrev = document.querySelectorAll('.wpwax-lsu-carousel-nav__btn-prev');
    let navBtnNext = document.querySelectorAll('.wpwax-lsu-carousel-nav__btn-next');
    const paginationElement = document.querySelectorAll(".wpwax-lsu-carousel-pagination");
    navBtnPrev.forEach((el, i) => {
      el.classList.add(`wpwax-lsu-carousel-nav__btn-prev-${i}`);
    });
    navBtnNext.forEach((el, i) => {
      el.classList.add(`wpwax-lsu-carousel-nav__btn-next-${i}`);
    });
    hasPagination && paginationElement.forEach(el => el.classList.add(`wpwax-lsu-carousel-pagination-${i}`));

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
        prevEl: `.wpwax-lsu-carousel-nav__btn-prev-${i}`
      },
      pagination: {
        el: `.wpwax-lsu-carousel-pagination-${i}`,
        type: 'bullets',
        clickable: true
      },
      breakpoints: checkData(JSON.parse(el.dataset.lsuResponsive), {})
    });
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
    });
  });

  /* Tooltip Initialization */
  let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  /* Tooltip Dynamic Style */
  const tooltips = document.querySelectorAll('.wpwax-lsu-item-inner');
  tooltips.forEach(tooltip => tooltip.addEventListener('mouseover', function () {
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
}
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('lcg/block', {
  apiVersion: 2,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Logo Showcase Ultimate', 'post-grid-carousel-ultimate'),
  category: 'widgets',
  keywords: ['logo', 'showcase', 'ultimate', 'carousel', 'grid'],
  icon: 'slides',
  supports: {
    html: false
  },
  transforms: {},
  attributes: _attributes_json__WEBPACK_IMPORTED_MODULE_6__,
  edit(_ref) {
    let {
      attributes,
      setAttributes
    } = _ref;
    (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
      setTimeout(() => {
        extra_js();
      }, 4000);
    });
    let {
      layout,
      cg_title_show,
      cg_title,
      header_position,
      lcg_type,
      total_logos,
      c_theme,
      auto_play,
      repeat_product,
      stop_hover,
      marquee,
      c_desktop,
      c_desktop_small,
      c_tablet,
      c_mobile,
      slide_time,
      slide_speed,
      scrol_direction,
      navigation,
      nav_position,
      carousel_pagination,
      g_theme,
      g_columns,
      g_columns_tablet,
      g_columns_mobile,
      grid_pagination,
      pagination_type,
      image_crop,
      image_width,
      image_hight,
      target,
      image_hover,
      img_animation
    } = attributes;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useBlockProps)(), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Layout', 'post-grid-carousel-ultimate'),
      initialOpen: false
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Layout', 'post-grid-carousel-ultimate'),
      labelPosition: "side",
      value: layout,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Carousel', 'post-grid-carousel-ultimate'),
        value: 'carousel'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Grid', 'post-grid-carousel-ultimate'),
        value: 'grid'
      }],
      onChange: newState => setAttributes({
        layout: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Display Header', 'directorist'),
      checked: cg_title_show,
      onChange: newState => setAttributes({
        cg_title_show: newState
      })
    }), cg_title_show ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Header Title', 'directorist'),
      type: "text",
      value: cg_title,
      onChange: newState => setAttributes({
        cg_title: newState
      })
    }) : '', cg_title_show ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Header position', 'post-grid-carousel-ultimate'),
      labelPosition: "side",
      value: header_position,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Middle', 'post-grid-carousel-ultimate'),
        value: 'middle'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Left', 'post-grid-carousel-ultimate'),
        value: 'left'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Right', 'post-grid-carousel-ultimate'),
        value: 'right'
      }],
      onChange: newState => setAttributes({
        header_position: newState
      })
    }) : ''), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Query', 'post-grid-carousel-ultimate'),
      initialOpen: false
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Display Post From', 'post-grid-carousel-ultimate'),
      labelPosition: "side",
      value: lcg_type,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Latest', 'post-grid-carousel-ultimate'),
        value: 'latest'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Older', 'post-grid-carousel-ultimate'),
        value: 'older'
      }],
      onChange: newState => setAttributes({
        lcg_type: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Total Posts', 'directorist'),
      type: "text",
      value: total_logos,
      onChange: newState => setAttributes({
        total_logos: newState
      })
    })), layout == 'carousel' ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Carousel', 'post-grid-carousel-ultimate'),
      initialOpen: false
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select Theme', 'directorist'),
      labelPosition: "side",
      value: c_theme,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme 1', 'post-grid-carousel-ultimate'),
        value: 'carousel-theme-1'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme 2', 'post-grid-carousel-ultimate'),
        value: 'carousel-theme-2'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme 3', 'post-grid-carousel-ultimate'),
        value: 'carousel-theme-3'
      }],
      onChange: newState => setAttributes({
        c_theme: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Auto Play', 'directorist'),
      checked: auto_play,
      onChange: newState => setAttributes({
        auto_play: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Repeat Logo', 'directorist'),
      checked: repeat_product,
      onChange: newState => setAttributes({
        repeat_product: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Pause on Hover', 'directorist'),
      checked: stop_hover,
      onChange: newState => setAttributes({
        stop_hover: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Columns', 'directorist'),
      type: "text",
      value: c_desktop,
      onChange: newState => setAttributes({
        c_desktop: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Laptop Columns', 'directorist'),
      type: "text",
      value: c_desktop_small,
      onChange: newState => setAttributes({
        c_desktop_small: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Tablet Columns', 'directorist'),
      type: "text",
      value: c_tablet,
      onChange: newState => setAttributes({
        c_tablet: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Mobile Columns', 'directorist'),
      type: "text",
      value: c_mobile,
      onChange: newState => setAttributes({
        c_mobile: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Slide Speed', 'directorist'),
      type: "text",
      value: slide_speed,
      onChange: newState => setAttributes({
        slide_speed: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Slide Timeout', 'directorist'),
      type: "text",
      value: slide_time,
      onChange: newState => setAttributes({
        slide_time: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Scroll Direction', 'post-grid-carousel-ultimate'),
      labelPosition: "side",
      value: scrol_direction,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Right to Left', 'post-grid-carousel-ultimate'),
        value: 'left'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Left to Right', 'post-grid-carousel-ultimate'),
        value: 'right'
      }],
      onChange: newState => setAttributes({
        scrol_direction: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Navigation', 'directorist'),
      checked: navigation,
      onChange: newState => setAttributes({
        navigation: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Pagination', 'directorist'),
      checked: carousel_pagination,
      onChange: newState => setAttributes({
        carousel_pagination: newState
      })
    })) : '', layout == 'grid' ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Grid', 'post-grid-carousel-ultimate'),
      initialOpen: false
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select Theme', 'directorist'),
      labelPosition: "side",
      value: g_theme,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme 1', 'post-grid-carousel-ultimate'),
        value: 'grid-theme-1'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme 2', 'post-grid-carousel-ultimate'),
        value: 'grid-theme-2'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme 3', 'post-grid-carousel-ultimate'),
        value: 'grid-theme-3'
      }],
      onChange: newState => setAttributes({
        g_theme: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Grid Columns', 'directorist'),
      type: "text",
      value: g_columns,
      onChange: newState => setAttributes({
        g_columns: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select Columns for Tablet', 'directorist'),
      type: "text",
      value: g_columns_tablet,
      onChange: newState => setAttributes({
        g_columns_tablet: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select Columns for Mobile', 'directorist'),
      type: "text",
      value: g_columns_mobile,
      onChange: newState => setAttributes({
        g_columns_mobile: newState
      })
    })) : '', (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Image', 'post-grid-carousel-ultimate'),
      initialOpen: false
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Image Resize & Crop', 'directorist'),
      checked: image_crop,
      onChange: newState => setAttributes({
        image_crop: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Cropping Width', 'directorist'),
      type: "text",
      value: image_width,
      onChange: newState => setAttributes({
        image_width: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.TextControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Cropping Height', 'directorist'),
      type: "text",
      value: image_hight,
      onChange: newState => setAttributes({
        image_hight: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Open Logo Link in', 'post-grid-carousel-ultimate'),
      labelPosition: "side",
      value: target,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('New Window or Tab', 'post-grid-carousel-ultimate'),
        value: '_blank'
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Same Window or Tab', 'post-grid-carousel-ultimate'),
        value: '_self'
      }],
      onChange: newState => setAttributes({
        target: newState
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToggleControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Image Hover Effect', 'directorist'),
      checked: image_hover,
      onChange: newState => setAttributes({
        image_hover: newState
      })
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)((_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3___default()), {
      block: "lcg/block",
      attributes: attributes
    })));
  },
  save(_ref2) {
    let {
      attributes
    } = _ref2;
  }
});

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ (function(module) {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ (function(module) {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ (function(module) {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ (function(module) {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/server-side-render":
/*!******************************************!*\
  !*** external ["wp","serverSideRender"] ***!
  \******************************************/
/***/ (function(module) {

module.exports = window["wp"]["serverSideRender"];

/***/ }),

/***/ "./src/blocks/attributes.json":
/*!************************************!*\
  !*** ./src/blocks/attributes.json ***!
  \************************************/
/***/ (function(module) {

module.exports = JSON.parse('{"layout":{"type":"string","default":"carousel"},"cg_title_show":{"type":"boolean","default":false},"cg_title":{"type":"string","default":""},"header_position":{"type":"string","default":"middle"},"lcg_type":{"type":"string","default":"latest"},"total_logos":{"type":"string","default":"12"},"c_theme":{"type":"string","default":"carousel-theme-1"},"auto_play":{"type":"boolean","default":true},"repeat_product":{"type":"boolean","default":true},"stop_hover":{"type":"boolean","default":false},"c_desktop":{"type":"string","default":"2"},"c_desktop_small":{"type":"string","default":"2"},"c_tablet":{"type":"string","default":"2"},"c_mobile":{"type":"string","default":"1"},"slide_speed":{"type":"string","default":"2000"},"slide_time":{"type":"string","default":"2000"},"scrol_direction":{"type":"string","default":"left"},"navigation":{"type":"boolean","default":true},"carousel_pagination":{"type":"boolean","default":false},"g_theme":{"type":"string","default":"grid-theme-1"},"g_columns":{"type":"string","default":"3"},"g_columns_tablet":{"type":"string","default":"2"},"g_columns_mobile":{"type":"string","default":"1"},"image_crop":{"type":"boolean","default":false},"image_width":{"type":"string","default":"185"},"image_hight":{"type":"string","default":"119"},"target":{"type":"string","default":"_blank"},"image_hover":{"type":"boolean","default":true}}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_lcg_ultimate_block_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/lcg-ultimate-block.js */ "./src/blocks/lcg-ultimate-block.js");

}();
/******/ })()
;
//# sourceMappingURL=index.js.map