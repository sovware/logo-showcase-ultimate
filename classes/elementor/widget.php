<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
class Elementor_Logo_Ultimate_Widget extends \Elementor\Widget_Base {

	public function register_controls() {
		$fields = $this->pgcu_fields();
		foreach ( $fields as $field ) {
			if ( isset( $field['mode'] ) && $field['mode'] == 'section_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_section( $id, $field );
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'section_end' ) {
				$this->end_controls_section();
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'tabs_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tabs( $id );
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'tabs_end' ) {
				$this->end_controls_tabs();
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'tab_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tab( $id, $field );
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'tab_end' ) {
				$this->end_controls_tab();
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'group' ) {
				$type = $field['type'];
				$field['name'] = $field['id'];
				unset( $field['mode'] );
				unset( $field['type'] );
				unset( $field['id'] );
				$this->add_group_control( $type, $field );
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'responsive' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->add_responsive_control( $id, $field );
			}
			else {
				$id = $field['id'];
				unset( $field['id'] );
				$this->add_control( $id, $field );
			}
		}
	}

	public function pgcu_fields() {
		$fields = array(
			//layout section
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'Layout', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'layout',
				'label'   => __( 'Layout', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'carousel' => __( 'Carousel', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grid' 		=> __( 'Grid', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'carousel',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'cg_title_show',
				'label'     => __( 'Display Header', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'no',
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'cg_title',
				'label'     => __( 'Title', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => '',
				'condition'    => [
					'cg_title_show'          => 'yes',
				],
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'header_position',
				'label'   => __( 'Header Position', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'left' 		=> __( 'Left', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'right' 	=> __( 'Right', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'middle' 	=> __( 'Middle', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'middle',
				'condition'    => [
					'cg_title_show'          => 'yes',
				],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_query',
				'label'   => __( 'Query', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'lcg_type',
				'label'   => __( 'Logo Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'latest' 		=> __( 'Latest', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'older' 		=> __( 'Older', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'latest',
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'total_logos',
				'label'     => __( 'Display Total Logos', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 12,
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_carousel',
				'label'   => __( 'Carousel', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition'    => [
					'layout'          => 'carousel',
				],
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'c_theme',
				'label'   => __( 'Select Theme', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'carousel-theme-1' 		=> __( 'Theme-1', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-2' 		=> __( 'Theme-2', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-3' 		=> __( 'Theme-3', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'carousel-theme-1',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'auto_play',
				'label'     => __( 'Auto Play', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'repeat_product',
				'label'     => __( 'Repeat Logo', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'stop_hover',
				'label'     => __( 'Pause on Hover', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'no',
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'c_desktop',
				'label'     => __( 'Columns', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 3,
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'c_desktop_small',
				'label'     => __( 'Laptop Columns', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 3,
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'c_tablet',
				'label'     => __( 'Tablet Columns', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 2,
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'c_mobile',
				'label'     => __( 'Mobile Columns', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 1,
				'separator' => 'after'
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'slide_speed',
				'label'     => __( 'Slide Speed', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 2000,
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'slide_time',
				'label'     => __( 'Slide Timeout', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 2000,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'scrol_direction',
				'label'   => __( 'Scroll Direction', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'left' 	=> __( 'Right to Left', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'right' 	=> __( 'Left to Right', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'left',
				'separator' => 'after'
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'navigation',
				'label'     => __( 'Navigation', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'carousel_pagination',
				'label'     => __( 'Pagination', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'no',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_grid',
				'label'   => __( 'Grid', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition'    => [
					'layout'          => [ 'grid' ],
				],
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'g_theme',
				'label'   => __( 'Select Theme', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'grid-theme-1' 		=> __( 'Theme-1', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grid-theme-2' 		=> __( 'Theme-2', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grid-theme-3' 		=> __( 'Theme-3', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'grid-theme-1',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'g_columns',
				'label'   => __( 'Select Columns', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'1' 	=> __( 'Column-1', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'2' 	=> __( 'Column-2', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'3' 	=> __( 'Column-3', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'4' 	=> __( 'Column-4', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'5' 	=> __( 'Column-5', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'6' 	=> __( 'Column-6', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'g_columns_tablet',
				'label'   => __( 'Select Columns for Tablet', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'1' 	=> __( 'Column-1', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'2' 	=> __( 'Column-2', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'3' 	=> __( 'Column-3', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'4' 	=> __( 'Column-4', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => '2',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'g_columns_mobile',
				'label'   => __( 'Select Columns for Mobile', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'1' 	=> __( 'Column-1', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'2' 	=> __( 'Column-2', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'3' 	=> __( 'Column-3', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'4' 	=> __( 'Column-4', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => '1',
				'separator' => 'after'
			),
			
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_image',
				'label'   => __( 'Image', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'image_crop',
				'label'     => __( 'Image Resize & Crop', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'no',
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'image_width',
				'label'     => __( 'Cropping Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 185,
				'condition'    => [
					'image_crop'          => 'yes',
				],
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'image_height',
				'label'     => __( 'Cropping Height', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 119,
				'condition'    => [
					'image_crop'          => 'yes',
				],
				'separator' => 'after'
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'target',
				'label'   => __( 'Open Logo Link in', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'_blank' 		=> __( 'New Window or Tab', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'_self' 		=> __( 'Same Window or Tab', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => '_blank',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'image_hover',
				'label'     => __( 'Image Hover Effect', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			array(
				'mode' => 'section_end',
			),
			// header title style
			array(
				'mode'    => 'section_start',
				'tab'       => Controls_Manager::TAB_STYLE,
				'id'      => 'header_title_tab',
				'label'   => __( 'Header Title', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'header_style_tab',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'header_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'header_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title' => 'color: {{VALUE}} !important'
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'header_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .wpwax-lsu-title' => 'background-color: {{VALUE}}'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'header_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title' => 'border-color: {{VALUE}}'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'header_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'header_title_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-lsu-title',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'header_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title' => 'border-style: {{VALUE}}'
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'header_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'header_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'header_hover_tab',
				'label'   => __( 'HOVER', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'header_hover_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => '#303030',
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title:hover' => 'color: {{VALUE}} !important'
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'header_hover_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .wpwax-lsu-title:hover' => 'background-color: {{VALUE}}'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'header_hover_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title:hover' => 'border-color: {{VALUE}}'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'header_hover_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title:hover' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'id'     	=> 'header_hover_title_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-lsu-title:hover',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'header_hover_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-title:hover' => 'border-style: {{VALUE}}'
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'header_hover_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-title:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'header_hover_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-title:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'tab'     => Controls_Manager::TAB_STYLE,
				'id'      => 'carousel_navigation',
				'label'   => __( 'Navigation', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition' => array( 
					'layout'   => 'carousel',
					'navigation' => 'yes'
				)
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'nav_style_tab',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'nav_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'nav_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn svg' => 'fill: {{VALUE}} !important;',
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'nav_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'nav_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'nav_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'nav_pagi_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn',
			),
			array(
				'type'      => Controls_Manager::SLIDER,
				'id'        => 'nav_font_size',
				'label'     => __( 'Arrow Font Size', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn svg' => 'width: {{SIZE}}{{UNIT}} !important'
					],
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'nav_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'nav_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'nav_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'nav_hover_tab',
				'label'   => __( 'HOVER', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'nav_hover_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn svg:hover' => 'fill: {{VALUE}} !important;',
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'nav_hover_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn:hover' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'nav_hover_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn:hover' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'nav_hover_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn:hover' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'nav_hover_pagi_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn:hover',
			),
			array(
				'type'      => Controls_Manager::SLIDER,
				'id'        => 'nav_hover_font_size',
				'label'     => __( 'Arrow Font Size', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn svg:hover' => 'width: {{SIZE}}{{UNIT}} !important'
					],
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'nav_hover_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn:hover' => 'border-style: {{VALUE}} !important;',
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_hover_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'nav_hover_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_hover_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav .wpwax-lsu-carousel-nav__btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'nav_hover_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_hover_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'nav_hover_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-nav:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'tab'     => Controls_Manager::TAB_STYLE,
				'id'      => 'carousel_dots',
				'label'   => __( 'Carousel Dots Pagination', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition' => array( 
					'layout'   				=> 'carousel',
					'carousel_pagination' 	=> 'yes'
				)
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'dots_style_tab',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'dots_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'dots_back_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'dots_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet' => 'border-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::SLIDER,
				'id'        => 'dots_width',
				'label'     => __( 'Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}} !important'
					],
			),
			array(
				'type'      => Controls_Manager::SLIDER,
				'id'        => 'dots_height',
				'label'     => __( 'Height', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}} !important'
					],
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'dots_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'dots_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'dots_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'dots_active_tab',
				'label'   => __( 'ACTIVE', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'dots_active_back_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'dots_active_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'border-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::SLIDER,
				'id'        => 'dots_active_width',
				'label'     => __( 'Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'width: {{SIZE}}{{UNIT}} !important'
					],
			),
			array(
				'type'      => Controls_Manager::SLIDER,
				'id'        => 'dots_active_height',
				'label'     => __( 'Height', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'height: {{SIZE}}{{UNIT}} !important'
					],
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'dots_active_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_active_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'dots_active_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_active_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'dots_active_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_active_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'dots_active_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-lsu-carousel-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'tab'     => Controls_Manager::TAB_STYLE,
				'id'      => 'load_more_tab',
				'label'   => __( 'Load More', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition'    => [
					'layout'				=> 'grid',
					'grid_pagination'    	=> 'yes',
					'pagination_type' 		=> 'ajax_pagi',
				],
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'load_style_tab',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'load_more_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more' => 'color: {{VALUE}} !important',
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'load_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more',
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'load_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'load_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'load_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'load_more_hover_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_hover_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover' => 'color: {{VALUE}} !important',
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_hover_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_hover_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'load_hover_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_shadow_hover',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover',
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_hover_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'load_hover_border_type',
				'label'   => __( 'Border Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'none' 		=> __( 'None', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'solid' 	=> __( 'Solid', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'double' 	=> __( 'Double', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dotted' 	=> __( 'Dotted', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'dashed' 	=> __( 'Dashed', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'groove' 	=> __( 'Groove', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_hover_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'load_hover_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_hover_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn .lsu_load_more:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'load_hover_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_hover_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_hover_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-loadmore-btn:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'tab'     => Controls_Manager::TAB_STYLE,
				'id'      => 'tooltip_',
				'label'   => __( 'Tooltip', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'tooltip',
				'label'     => __( 'Display Tooltip', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	public function get_name() {
		return 'logo_showcase_ultimate';
	}

	public function get_title() {
		return esc_html__( 'Logo Showcase Ultimate', 'woocommerce-product-carousel-slider-and-ultimate' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'logo', 'grid', 'carousel', 'ultimate' ];
	}

	protected function render() {
		$settings = $this->get_settings();

		$atts = array(
			'layout'                		=> $settings['layout'] ? $settings['layout'] : 'carousel',
			'cg_title_show'          		=> $settings['cg_title_show'] ? $settings['cg_title_show'] : 'no',
			'cg_title'                 		=> $settings['cg_title'] ? $settings['cg_title'] : '',
			'header_position'				=> $settings['header_position'] ? $settings['header_position'] : 'middle',
			'lcg_type'						=> $settings['lcg_type'] ? $settings['lcg_type'] : 'latest',
			'total_logos'					=> $settings['total_logos'] ? $settings['total_logos'] : '12',
			'c_theme'						=> $settings['c_theme'] ? $settings['c_theme'] : 'carousel-theme-1',
			'auto_play'						=> $settings['auto_play'] ? $settings['auto_play'] : 'no',
			'repeat_product'				=> $settings['repeat_product'] ? $settings['repeat_product'] : 'no',
			'stop_hover'					=> $settings['stop_hover'] ? $settings['stop_hover'] : 'no',
			'c_desktop'						=> $settings['c_desktop'] ? $settings['c_desktop'] : '2',
			'c_desktop_small'				=> $settings['c_desktop_small'] ? $settings['c_desktop_small'] : '2',
			'c_tablet'						=> $settings['c_tablet'] ? $settings['c_tablet'] : '2',
			'c_mobile'						=> $settings['c_mobile'] ? $settings['c_mobile'] : '1',
			'slide_speed'					=> $settings['slide_speed'] ? $settings['slide_speed'] : '2000',
			'slide_time'					=> $settings['slide_time'] ? $settings['slide_time'] : '2000',
			'scrol_direction'				=> $settings['scrol_direction'] ? $settings['scrol_direction'] : 'left',
			'navigation'					=> $settings['navigation'] ? $settings['navigation'] : 'no',
			'carousel_pagination'			=> $settings['carousel_pagination'] ? $settings['carousel_pagination'] : 'no',
			'g_theme'						=> $settings['g_theme'] ? $settings['g_theme'] : 'grid-theme-1',
			'g_columns'						=> $settings['g_columns'] ? $settings['g_columns'] : '3',
			'g_columns_tablet'				=> $settings['g_columns_tablet'] ? $settings['g_columns_tablet'] : '2',
			'g_columns_mobile'				=> $settings['g_columns_mobile'] ? $settings['g_columns_mobile'] : 'no',
			'image_crop'					=> $settings['image_crop'] ? $settings['image_crop'] : 'no',
			'image_width'					=> $settings['image_width'] ? $settings['image_width'] : '185',
			'image_height'					=> $settings['image_height'] ? $settings['image_height'] : '119',
			'target'						=> $settings['target'] ? $settings['target'] : '_blank',
			'image_hover'				    => $settings['image_hover'] ? $settings['image_hover'] : 'no',
			'tooltip'				    	=> $settings['tooltip'] ? $settings['tooltip'] : 'no',
		);
		$this->run_shortcode( 'logo_showcase', $atts );
		
	}

	public function display_image( $atts ) {
		$layout  = ! empty( $atts['layout'] ) ? $atts['layout'] : 'carousel';
		$theme   = ! empty( $atts['theme'] ) ? $atts['theme'] . '.png' : 'theme_1.png';
		$img_src = WCPCSU_URL . 'includes/elementor/assets/img/' . $layout . '/' . $theme;
		ob_start();
		?>
		<div>
			<img src="<?php echo esc_attr( $img_src ); ?>" alt="">
		</div>
		<?php
		echo ob_get_clean();
	}

	public function run_shortcode( $shortcode, $atts = [] ) {
		$html = '';

		foreach ( $atts as $key => $value ) {
			$html .= sprintf( ' %s="%s"', $key, esc_html( $value ) );
		}

		$html = sprintf( '[%s%s]', $shortcode, $html );

		echo do_shortcode( $html );
	}
}