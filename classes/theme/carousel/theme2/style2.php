<style>
    #alc_style2 .alc_item {
       min-height: 130px;
    }

    #alc_style2 .alc_slider_controls .slider_control {
        position: absolute;
        left: -22px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-border-radius: 50%;
        border-radius: 50%;
        z-index: 1;
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
    #alc_style2 .alc_slider_controls .slider_control.icon-arrow-right {
        left: auto;
        right: -22px;
    }
    #alc_style2 .alc_slider_controls .slider_control {
        color: <?php echo !empty($c2_navarro_color) ? $c2_navarro_color : '#9192a3'?>;
        background: <?php echo !empty($c2_nav_background) ? $c1_nav_background : '#fff'?>;
        border-color: <?php echo !empty($c2_nav_border) ? $c2_nav_border : '#EAEAF1'?>
    }

    #alc_style2 .alc_slider_controls .slider_control:hover {
        background:  <?php echo !empty($c2_nav_hov_back_color) ? $c2_nav_hov_back_color : '#ff5500'?>;
        border-color: <?php echo !empty($c2_nav_hov_border_color) ? $c2_nav_hov_border_color : '#ff5500'?>;
        color: <?php echo !empty($c2_nav_hov_arrow_color) ? $c2_nav_hov_arrow_color : '#fff'?>;
    }
    /*# sourceMappingURL=maps/theme2.css.map */
</style>