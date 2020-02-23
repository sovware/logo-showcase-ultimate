<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access is not allow' );
$g2_border			= !empty($g2_border) ? $g2_border : 'yes';
$g2_border_size        = !empty($g2_border_size) ? $g2_border_size : '1px';
$g2_border_color        = !empty($g2_border_color) ? $g2_border_color : '#EAEAF1';
?>
<style>
    #alc_style15 .alc_grid_wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-flow: row wrap;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    #alc_style15 .alc_item {
        padding: 0 15px;
        margin-bottom: 30px;
        min-height: 125px;
        width: 127px;
        border: <?php if($g2_border == 'yes'){ echo $g2_border_size . ' solid ' . $g2_border_color ;} else { echo 'none';}?>;

    }

    #alc_style15 .alc_item figure a img {
        width: 100%;
    }

    #alc_style15 .alc_single_grid-6 {
        width: 16.66%;
    }
    #alc_style15 .alc_single_grid-5 {
        width: 20%;
    }
    #alc_style15 .alc_single_grid-4 {
        width: 25%;
    }
    #alc_style15 .alc_single_grid-3 {
        width: 33.33%;
    }
    #alc_style15 .alc_single_grid-2 {
        width: 50%;
    }
    #alc_style15 .alc_single_grid-1 {
        width: 100%;
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

    @media (min-width: 768px) and (max-width: 1024px) {

        #alc_style15 .alc_column_tab-4 {
            width: 25%;
        }
        #alc_style15 .alc_column_tab-3 {
            width: 33.33%;
        }
        #alc_style15 .alc_column_tab-2 {
            width: 50%;
        }
        #alc_style15 .alc_column_tab-1 {
            width: 100%;
        }


    }

    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

        #alc_style15 .alc_column_tab-4 {
            width: 25%;
        }
        #alc_style15 .alc_column_tab-3 {
            width: 33.33%;
        }
        #alc_style15 .alc_column_tab-2 {
            width: 50%;
        }
        #alc_style15 .alc_column_tab-1 {
            width: 100%;
        }

    }

    @media (min-width: 481px) and (max-width: 767px) {

        #alc_style15 .alc_column_mobile-4 {
            width: 25%;
        }
        #alc_style15 .alc_column_mobile-3 {
            width: 33.33%;
        }
        #alc_style15 .alc_column_mobile-2 {
            width: 50%;
        }
        #alc_style15 .alc_column_mobile-1 {
            width: 100%;
        }

    }

    @media (min-width: 320px) and (max-width: 480px) {

        #alc_style15 .alc_column_mobile-4 {
            width: 25%;
        }
        #alc_style15 .alc_column_mobile-3 {
            width: 33.33%;
        }
        #alc_style15 .alc_column_mobile-2 {
            width: 50%;
        }
        #alc_style15 .alc_column_mobile-1 {
            width: 100%;
        }

    }

    /*# sourceMappingURL=maps/theme15.css.map */

</style>