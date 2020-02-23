<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access is not allow' );
$c1_border			= !empty($c1_border) ? $c1_border : 'yes';
$c1_border_size        = !empty($c1_border_size) ? $c1_border_size : '1px';
$c1_border_color        = !empty($c1_border_color) ? $c1_border_color : '#EAEAF1';
?>

<style type="text/css">
    #alc_style1 {
        padding-top: 57px;
    }
	<?php
	if( !empty($image_hover) && 'no' != $image_hover) {
	?>
	.alc_wrapper .alc_item:hover figure a img {
	  -webkit-transform: scale(1.1);
	      -ms-transform: scale(1.1);
	          transform: scale(1.1);
	}
	<?php } ?>
	#alc_style1 .alc_title1 {
		margin-bottom: 35px;
		text-align: center;
	}

	#alc_style1 .alc_title1 h3 {
		padding-bottom: 0;
	}

	#alc_style1 .alc_title1 h3:before {
		content: none;
	}

	#alc_style1 .alc_item {
		border: <?php if($c1_border == 'yes'){ echo $c1_border_size . ' solid ' . $c1_border_color ;} else { echo 'none';}?>;
		min-height: 130px;
	}

	#alc_style1 .top_right {
		position: absolute;
		right: 0;
		top: -56px;
	}
    #alc_style1 .top_left {
        position: absolute;
        left: 0;
        top: -56px;
    }
    #alc_style1 .alc_slider_controls .slider_control {
        color: <?php echo !empty($c1_navarro_color) ? $c1_navarro_color : '#9192a3'?>;
        background: <?php echo !empty($c1_nav_background) ? $c1_nav_background : '#fff'?>;
        border-color: <?php echo !empty($c1_nav_border) ? $c1_nav_border : '#EAEAF1'?>
    }

    #alc_style1 .alc_slider_controls .slider_control:hover {
        background:  <?php echo !empty($c1_nav_hov_back_color) ? $c1_nav_hov_back_color : '#ff5500'?>;
        border-color: <?php echo !empty($c1_nav_hov_border_color) ? $c1_nav_hov_border_color : '#ff5500'?>;
        color: <?php echo !empty($c1_nav_hov_arrow_color) ? $c1_nav_hov_arrow_color : '#fff'?>;
    }

	
</style>