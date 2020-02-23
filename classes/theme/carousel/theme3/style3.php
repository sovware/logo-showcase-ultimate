<?php
$c3_border			= !empty($c3_border) ? $c3_border : 'yes';
$c3_border_size        = !empty($c3_border_size) ? $c3_border_size : '1px';
$c3_border_color        = !empty($c3_border_color) ? $c3_border_color : '#eaeaf1';
?>
<style>
    #alc_style11 .alc_item {
        border: <?php if($c3_border == 'yes'){ echo $c3_border_size . ' solid ' . $c3_border_color ;} else { echo 'none';}?>;
        min-height: 160px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
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
    #alc_style11 .alc_item figure a img {
        width: 100%;
    }

    #alc_style11 .alc_slider_controls {
        position: absolute;
        right: 0;
        top: -72px;
    }

    #alc_style11 .owl-controls {
        width: 100%;
        margin-top: 35px;
    }

    #alc_style11 .owl-controls .owl-dots {
        text-align: center;
    }

    #alc_style11 .owl-controls .owl-dots .owl-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        background: rgba(255, 85, 0, 0.2);
        -webkit-border-radius: 50%;
        border-radius: 50%;
        margin-right: 10px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
    }

    #alc_style11 .owl-controls .owl-dots .owl-dot:last-child {
        margin-right: 0;
    }

    #alc_style11 .owl-controls .owl-dots .owl-dot.active {
        background: <?php echo !empty($c3_pagination_color) ? $c3_pagination_color : '#ff5500'?>;
    }

    /*# sourceMappingURL=maps/theme11.css.map */

</style>