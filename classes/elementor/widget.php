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
					'rand' 			=> __( 'Random', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'title_asc' 	=> __( 'A to Z (title)', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'title_desc' 	=> __( 'Z to A (title)', 'woocommerce-product-carousel-slider-and-ultimate' ),
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
					'carousel-theme-4' 		=> __( 'Theme-4', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-5' 		=> __( 'Theme-5', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-6' 		=> __( 'Theme-6', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-7' 		=> __( 'Theme-7', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-8' 		=> __( 'Theme-8', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-9' 		=> __( 'Theme-9', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-10' 	=> __( 'Theme-10', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-11' 	=> __( 'Theme-11', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-12' 	=> __( 'Theme-12', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-13' 	=> __( 'Theme-13', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-14' 	=> __( 'Theme-14', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-15' 	=> __( 'Theme-15', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'carousel-theme-16' 	=> __( 'Theme-16', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'carousel-theme-1',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'A_play',
				'label'     => __( 'Auto Play', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'repeat_product',
				'label'     => __( 'Repeat Post', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'stop_hover',
				'label'     => __( 'Pause on Hover', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'no',
			),
			array(
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'marquee',
				'label'     => __( 'Marquee', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'no',
				'separator' => 'after'
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
				'type'    => Controls_Manager::SELECT,
				'id'      => 'nav_position',
				'label'   => __( 'Position', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'top-left' 		=> __( 'Top Left', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'top-right' 	=> __( 'Top Right', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'around' 		=> __( 'Middle', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'bottom-left' 	=> __( 'Bottom Left', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'bottom-right' 	=> __( 'Bottom Right', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'bottom-left',
				'condition'    => [
					'navigation'          => 'yes',
				],
				'separator' => 'after'
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
					'grid-theme-4' 		=> __( 'Theme-4', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grid-theme-5' 		=> __( 'Theme-5', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grid-theme-6' 		=> __( 'Theme-6', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grid-theme-7' 		=> __( 'Theme-7', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grid-theme-8' 		=> __( 'Theme-8', 'woocommerce-product-carousel-slider-and-ultimate' ),
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
				'type'      => Controls_Manager::SWITCHER,
				'id'        => 'grid_pagination',
				'label'     => __( 'Display Pagination', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'default'   => 'yes',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'pagination_type',
				'label'   => __( 'Pagination Type', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'number_pagi' 	=> __( 'Number Pagination', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'ajax_pagi' 	=> __( 'Ajax Pagination', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'number_pagi',
				'condition'    => [
					'grid_pagination'          => 'yes',
				],
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
				'type'    => Controls_Manager::SELECT,
				'id'      => 'img_animation',
				'label'   => __( 'Image Animation', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'options' => array(
					'zoom-in' 		=> __( 'Zoom In', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'zoom-out' 		=> __( 'Zoom Out', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'blur-in' 		=> __( 'Blur In', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'blur-out' 		=> __( 'Blur Out', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grayscale-in' 	=> __( 'Grayscale In', 'woocommerce-product-carousel-slider-and-ultimate' ),
					'grayscale-out' => __( 'Grayscale Out', 'woocommerce-product-carousel-slider-and-ultimate' ),
				),
				'default' => 'zoom-in',
				'condition' => array( 
					'image_hover'   => 'yes',
				)
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
				'tab'       => Controls_Manager::TAB_STYLE,
				'id'      => 'post_title_tab',
				'label'   => __( 'Logo Title', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition'    => [
					'layout'           => 'carousel',
					'c_theme'          => [ 'carousel-theme-7', 'carousel-theme-9', 'carousel-theme-11' ],
				],
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'title_style_tab',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'title_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-title' => 'color: {{VALUE}} !important'
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .wpwax-title' => 'background-color: {{VALUE}}'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-title' => 'border-color: {{VALUE}}'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'title_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-title' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'title_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-title',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'title_border_type',
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
					'{{WRAPPER}} .wpwax-title' => 'border-style: {{VALUE}}'
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'title_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'title_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'title_hover_tab',
				'label'   => __( 'HOVER', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_hover_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-title:hover' => 'color: {{VALUE}} !important'
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_hover_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .wpwax-title:hover' => 'background-color: {{VALUE}} !important'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_hover_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-title:hover' => 'border-color: {{VALUE}}'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'title_hover_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .wpwax-title:hover' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'id'     	=> 'title_hover_title_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .wpwax-title:hover',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'title_hover_border_type',
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
					'{{WRAPPER}} .wpwax-title:hover' => 'border-style: {{VALUE}}'
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'title_hover_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-title:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'title_hover_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .wpwax-title:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'id'      => 'grid_pagination_tab',
				'label'   => __( 'Grid Pagination', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition'    => [
					'layout'				=> 'grid',
					'display_pagination'    => 'yes',
					'pagination_type' 		=> 'number',
				],
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'grid_pagi_style_tab',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'grid_pagi_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'grid_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-pagination .page-numbers' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .pgcu-pagination .page-numbers svg' => 'fill: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'grid_pagi_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .pgcu-pagination .page-numbers' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'grid_pagi_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-pagination .page-numbers' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'grid_page_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-pagination .page-numbers' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'grid_pagi_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu-pagination .page-numbers',
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'grid_pagi_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu-pagination .page-numbers',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'grid_pagi_border_type',
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
					'{{WRAPPER}} .pgcu-pagination .page-numbers' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination .page-numbers' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'grid_pagi_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'grid_pagi_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'grid_pagi_hover_tab',
				'label'   => __( 'Hover', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'grid_hover_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .pgcu-pagination .page-numbers svg:hover' => 'fill: {{VALUE}} !important;',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current' => 'color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'grid_pagi_hover_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .pgcu-pagination .page-numbers:hover' => 'background-color: {{VALUE}} !important;',
				'{{WRAPPER}} .pgcu-pagination .nav-links .current' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'grid_pagi_hover_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover' => 'border-color: {{VALUE}} !important;',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'grid_page_hover_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover' => 'transition-duration: {{VALUE}} !important',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'grid_pagi_hover_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> [ 
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current',
				]
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'grid_pagi_hover_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> [
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current',
				],
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'grid_pagi_hover_border_type',
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
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover' => 'border-style: {{VALUE}} !important;',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current' => 'border-style: {{VALUE}} !important;',
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_hover_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'grid_pagi_hover_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_hover_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination .page-numbers:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .pgcu-pagination .nav-links .current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'grid_pagi_hover_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_hover_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'grid_pagi_hover_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-pagination:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
					'display_pagination'    => 'yes',
					'pagination_type' 		=> 'ajax',
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
					'{{WRAPPER}} .pgcu_load_more' => 'color: {{VALUE}} !important',
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .pgcu_load_more' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu_load_more' => 'border-color: {{VALUE}} !important;'
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
					'{{WRAPPER}} .pgcu_load_more' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu_load_more',
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu_load_more',
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
					'{{WRAPPER}} .pgcu_load_more' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu_load_more' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
					'{{WRAPPER}} .pgcu_load_more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
					'{{WRAPPER}} .pgcu_load_more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu_load_more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
					'{{WRAPPER}} .pgcu_load_more:hover' => 'color: {{VALUE}} !important',
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_hover_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .pgcu_load_more:hover' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'load_hover_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu_load_more:hover' => 'border-color: {{VALUE}} !important;'
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
					'{{WRAPPER}} .pgcu_load_more:hover' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_shadow_hover',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu_load_more:hover',
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'load_hover_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu_load_more:hover',
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
					'{{WRAPPER}} .pgcu_load_more:hover' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_hover_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu_load_more:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
					'{{WRAPPER}} .pgcu_load_more:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
					'{{WRAPPER}} .pgcu_load_more:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'load_hover_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu_load_more:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'id'      => 'filter_tab',
				'label'   => __( 'Filters', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'condition'    => [
					'layout'				=> 'isotope',
				],
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'filter_style_tab',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'filter_normal_tab',
				'label'   => __( 'NORMAL', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'filter_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn' => 'color: {{VALUE}} !important;',
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'filter_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'filter_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'filter_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'filter_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn',
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'filter_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'filter_border_type',
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
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'filter_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'filter_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'filter_hover_tab',
				'label'   => __( 'Hover', 'woocommerce-product-carousel-slider-and-ultimate' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'filter_hover_font_color',
				'label'     => __( 'Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn--active' => 'color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'filter_hover_back_color',
				'label'     => __( 'Background Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
				'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover' => 'background-color: {{VALUE}} !important;',
				'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn--active' => 'background-color: {{VALUE}} !important;'
				],
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'filter_hover_border_color',
				'label'     => __( 'Border Color', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover' => 'border-color: {{VALUE}} !important;',
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn--active' => 'border-color: {{VALUE}} !important;'
					],
			),
			array(
				'type'      => Controls_Manager::NUMBER,
				'id'        => 'filter_hover_transition_duration',
				'label'     => __( 'Transition Duration', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
				'selectors' 	=> [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover' => 'transition-duration: {{VALUE}} !important',
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn--active' => 'transition-duration: {{VALUE}} !important'
					],
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Box Shadow', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'filter_hover_shadow',
				'type'		=> \Elementor\Group_Control_Box_Shadow::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover',
			),
			array(
				'mode'		=> 'group',
				'label'     => __( 'Typography', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'id'     	=> 'filter_hover_typography',
				'type'		=> Group_Control_Typography::get_type(),
				'selector' 	=> '{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover',
				'scheme' => Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'filter_hover_border_type',
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
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover' => 'border-style: {{VALUE}} !important;',
					
					],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_hover_border_width',
				'label'     	=> __( 'Border Width', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'filter_hover_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_hover_border_radius',
				'label'     	=> __( 'Border Radius', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav .pgcu-post-sortable__btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				'condition' => [
					'filter_border_type!' => 'none',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_hover_padding',
				'label'     	=> __( 'Padding', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'mode'			=> 'responsive',
				'type'      	=> Controls_Manager::DIMENSIONS,
				'id'        	=> 'filter_hover_margin',
				'label'     	=> __( 'Margin', 'woocommerce-product-carousel-slider-and-ultimate' ),
				'selectors' => [
					'{{WRAPPER}} .pgcu-post-sortable__nav:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
			'A_play'						=> $settings['A_play'] ? $settings['A_play'] : 'no',
			'repeat_product'				=> $settings['repeat_product'] ? $settings['repeat_product'] : 'no',
			'stop_hover'					=> $settings['stop_hover'] ? $settings['stop_hover'] : 'no',
			'marquee'						=> $settings['marquee'] ? $settings['marquee'] : 'no',
			'c_desktop'						=> $settings['c_desktop'] ? $settings['c_desktop'] : '2',
			'c_desktop_small'				=> $settings['c_desktop_small'] ? $settings['c_desktop_small'] : '2',
			'c_tablet'						=> $settings['c_tablet'] ? $settings['c_tablet'] : '2',
			'c_mobile'						=> $settings['c_mobile'] ? $settings['c_mobile'] : '1',
			'slide_speed'					=> $settings['slide_speed'] ? $settings['slide_speed'] : '2000',
			'slide_time'					=> $settings['slide_time'] ? $settings['slide_time'] : '2000',
			'scrol_direction'				=> $settings['scrol_direction'] ? $settings['scrol_direction'] : 'left',
			'navigation'					=> $settings['navigation'] ? $settings['navigation'] : 'no',
			'nav_position'					=> $settings['nav_position'] ? $settings['nav_position'] : 'around',
			'carousel_pagination'			=> $settings['carousel_pagination'] ? $settings['carousel_pagination'] : 'no',
			'g_theme'						=> $settings['g_theme'] ? $settings['g_theme'] : 'grid-theme-1',
			'g_columns'						=> $settings['g_columns'] ? $settings['g_columns'] : '3',
			'g_columns_tablet'				=> $settings['g_columns_tablet'] ? $settings['g_columns_tablet'] : '2',
			'g_columns_mobile'				=> $settings['g_columns_mobile'] ? $settings['g_columns_mobile'] : 'no',
			'grid_pagination'				=> $settings['grid_pagination'] ? $settings['grid_pagination'] : 'no',
			'pagination_type'				=> $settings['pagination_type'] ? $settings['pagination_type'] : 'number_pagi',

			'image_crop'					=> $settings['image_crop'] ? $settings['image_crop'] : 'no',
			'image_width'					=> $settings['image_width'] ? $settings['image_width'] : '185',
			'image_height'					=> $settings['image_height'] ? $settings['image_height'] : '119',
			'target'						=> $settings['target'] ? $settings['target'] : '_blank',
			'image_hover'				    => $settings['image_hover'] ? $settings['image_hover'] : 'no',
			'img_animation'					=> $settings['img_animation'] ? $settings['img_animation'] : 'zoom-in',

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