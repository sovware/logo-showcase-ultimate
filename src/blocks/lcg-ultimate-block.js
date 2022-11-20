import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { Fragment, useState, useEffect } from '@wordpress/element';
import ServerSideRender from '@wordpress/server-side-render';
import { 
    useBlockProps, 
    InspectorControls, 
    BlockControls 
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	ToggleControl,
	TextControl,
	Toolbar,
	ToolbarButton,
	ColorPicker,
	ColorPalette
} from '@wordpress/components';
import blockAttributes from './attributes.json';

function extra_js() {
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
}

registerBlockType( 'lcg/block', {
    apiVersion: 2,

	title: __( 'Logo Showcase Ultimate', 'post-grid-carousel-ultimate' ),

	category: 'widgets',

    keywords: [ 'logo', 'showcase', 'ultimate', 'carousel', 'grid' ],

    icon: 'slides',

    supports: {
		html: false
	},

    transforms: {

    },

    attributes: blockAttributes,

    edit({ attributes, setAttributes }){
		
			useEffect( () => {
				setTimeout(() => {
					extra_js();
				}, 4000 );
			} );

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
		return(
            <Fragment>
                <div { ...useBlockProps() }>
                    <InspectorControls>

                        <PanelBody title={ __( 'Layout', 'post-grid-carousel-ultimate' ) } initialOpen={ false }>

							<SelectControl
								label={ __( 'Layout', 'post-grid-carousel-ultimate' ) }
								labelPosition='side'
								value={ layout }
								options={ [
									{ label: __( 'Carousel', 'post-grid-carousel-ultimate' ), value: 'carousel' },
									{ label: __( 'Grid', 'post-grid-carousel-ultimate' ), value: 'grid' },
								] }
								onChange={ newState => setAttributes( { layout: newState } ) }
							/>

							<ToggleControl
								label={ __( 'Display Header', 'directorist' ) }
								checked={ cg_title_show }
								onChange={ newState => setAttributes( { cg_title_show: newState } ) }
							/>

							{ cg_title_show ? <TextControl
								label={ __( 'Header Title', 'directorist' ) }
								type='text'
								value={ cg_title }
								onChange={ newState => setAttributes( { cg_title: newState } ) }
							/> : '' }

							{ cg_title_show ? <SelectControl
								label={ __( 'Header position', 'post-grid-carousel-ultimate' ) }
								labelPosition='side'
								value={ header_position }
								options={ [
									{ label: __( 'Middle', 'post-grid-carousel-ultimate' ), value: 'middle' },
									{ label: __( 'Left', 'post-grid-carousel-ultimate' ), value: 'left' },
									{ label: __( 'Right', 'post-grid-carousel-ultimate' ), value: 'right' },
								] }
								onChange={ newState => setAttributes( { header_position: newState } ) }
							/> : '' }
							
                        </PanelBody>

						<PanelBody title={ __( 'Query', 'post-grid-carousel-ultimate' ) } initialOpen={ false }>

							<SelectControl
								label={ __( 'Display Post From', 'post-grid-carousel-ultimate' ) }
								labelPosition='side'
								value={ lcg_type }
								options={ [
									{ label: __( 'Latest', 'post-grid-carousel-ultimate' ), value: 'latest' },
									{ label: __( 'Older', 'post-grid-carousel-ultimate' ), value: 'older' }
								] }
								onChange={ newState => setAttributes( { lcg_type: newState } ) }
							/>

							<TextControl
								label={ __( 'Total Posts', 'directorist' ) }
								type='text'
								value={ total_logos }
								onChange={ newState => setAttributes( { total_logos: newState } ) }
							/>

						</PanelBody>

						{ layout == 'carousel' ? <PanelBody title={ __( 'Carousel', 'post-grid-carousel-ultimate' ) } initialOpen={ false }>

						<SelectControl
								label={ __( 'Select Theme', 'directorist' ) }
								labelPosition='side'
								value={ c_theme }
								options={ [
									{ label: __( 'Theme 1', 'post-grid-carousel-ultimate' ), value: 'carousel-theme-1' },
									{ label: __( 'Theme 2', 'post-grid-carousel-ultimate' ), value: 'carousel-theme-2' },
									{ label: __( 'Theme 3', 'post-grid-carousel-ultimate' ), value: 'carousel-theme-3' }
								] }
								onChange={ newState => setAttributes( { c_theme: newState } ) }
							/>

							<ToggleControl
								label={ __( 'Auto Play', 'directorist' ) }
								checked={ auto_play }
								onChange={ newState => setAttributes( { auto_play: newState } ) }
							/>

							<ToggleControl
								label={ __( 'Repeat Logo', 'directorist' ) }
								checked={ repeat_product }
								onChange={ newState => setAttributes( { repeat_product: newState } ) }
							/>

							<ToggleControl
								label={ __( 'Pause on Hover', 'directorist' ) }
								checked={ stop_hover }
								onChange={ newState => setAttributes( { stop_hover: newState } ) }
							/>

							<TextControl
								label={ __( 'Columns', 'directorist' ) }
								type='text'
								value={ c_desktop }
								onChange={ newState => setAttributes( { c_desktop: newState } ) }
							/>

							<TextControl
								label={ __( 'Laptop Columns', 'directorist' ) }
								type='text'
								value={ c_desktop_small }
								onChange={ newState => setAttributes( { c_desktop_small: newState } ) }
							/>

							<TextControl
								label={ __( 'Tablet Columns', 'directorist' ) }
								type='text'
								value={ c_tablet }
								onChange={ newState => setAttributes( { c_tablet: newState } ) }
							/>

							<TextControl
								label={ __( 'Mobile Columns', 'directorist' ) }
								type='text'
								value={ c_mobile }
								onChange={ newState => setAttributes( { c_mobile: newState } ) }
							/>

							<TextControl
								label={ __( 'Slide Speed', 'directorist' ) }
								type='text'
								value={ slide_speed }
								onChange={ newState => setAttributes( { slide_speed: newState } ) }
							/>

							<TextControl
								label={ __( 'Slide Timeout', 'directorist' ) }
								type='text'
								value={ slide_time }
								onChange={ newState => setAttributes( { slide_time: newState } ) }
							/>

							<SelectControl
								label={ __( 'Scroll Direction', 'post-grid-carousel-ultimate' ) }
								labelPosition='side'
								value={ scrol_direction }
								options={ [
									{ label: __( 'Right to Left', 'post-grid-carousel-ultimate' ), value: 'left' },
									{ label: __( 'Left to Right', 'post-grid-carousel-ultimate' ), value: 'right' }
								] }
								onChange={ newState => setAttributes( { scrol_direction: newState } ) }
							/>

							<ToggleControl
								label={ __( 'Navigation', 'directorist' ) }
								checked={ navigation }
								onChange={ newState => setAttributes( { navigation: newState } ) }
							/>

							<ToggleControl
								label={ __( 'Pagination', 'directorist' ) }
								checked={ carousel_pagination }
								onChange={ newState => setAttributes( { carousel_pagination: newState } ) }
							/>
							
						</PanelBody> : '' }

						{ layout == 'grid' ? <PanelBody title={ __( 'Grid', 'post-grid-carousel-ultimate' ) } initialOpen={ false }>
							
							<SelectControl
								label={ __( 'Select Theme', 'directorist' ) }
								labelPosition='side'
								value={ g_theme }
								options={ [
									{ label: __( 'Theme 1', 'post-grid-carousel-ultimate' ), value: 'grid-theme-1' },
									{ label: __( 'Theme 2', 'post-grid-carousel-ultimate' ), value: 'grid-theme-2' },
									{ label: __( 'Theme 3', 'post-grid-carousel-ultimate' ), value: 'grid-theme-3' }
								] }
								onChange={ newState => setAttributes( { g_theme: newState } ) }
							/>

							<TextControl
								label={ __( 'Grid Columns', 'directorist' ) }
								type='text'
								value={ g_columns }
								onChange={ newState => setAttributes( { g_columns: newState } ) }
							/>

							<TextControl
								label={ __( 'Select Columns for Tablet', 'directorist' ) }
								type='text'
								value={ g_columns_tablet }
								onChange={ newState => setAttributes( { g_columns_tablet: newState } ) }
							/>

							<TextControl
								label={ __( 'Select Columns for Mobile', 'directorist' ) }
								type='text'
								value={ g_columns_mobile }
								onChange={ newState => setAttributes( { g_columns_mobile: newState } ) }
							/>

						</PanelBody> : '' }

						<PanelBody title={ __( 'Image', 'post-grid-carousel-ultimate' ) } initialOpen={ false }>

							<ToggleControl
								label={ __( 'Image Resize & Crop', 'directorist' ) }
								checked={ image_crop }
								onChange={ newState => setAttributes( { image_crop: newState } ) }
							/>

							<TextControl
								label={ __( 'Cropping Width', 'directorist' ) }
								type='text'
								value={ image_width }
								onChange={ newState => setAttributes( { image_width: newState } ) }
							/>

							<TextControl
								label={ __( 'Cropping Height', 'directorist' ) }
								type='text'
								value={ image_hight }
								onChange={ newState => setAttributes( { image_hight: newState } ) }
							/>

							<SelectControl
								label={ __( 'Open Logo Link in', 'post-grid-carousel-ultimate' ) }
								labelPosition='side'
								value={ target }
								options={ [
									{ label: __( 'New Window or Tab', 'post-grid-carousel-ultimate' ), value: '_blank' },
									{ label: __( 'Same Window or Tab', 'post-grid-carousel-ultimate' ), value: '_self' },
								] }
								onChange={ newState => setAttributes( { target: newState } ) }
							/>

							<ToggleControl
								label={ __( 'Image Hover Effect', 'directorist' ) }
								checked={ image_hover }
								onChange={ newState => setAttributes( { image_hover: newState } ) }
							/>

						</PanelBody>

                    </InspectorControls>
                
			    	<ServerSideRender block="lcg/block" attributes={ attributes } />
                 </div>
            </Fragment>
		)
	},

    save( { attributes } ){

    }
} );

