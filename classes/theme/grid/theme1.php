<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access is not allow' );
$g1_border			= !empty($g1_border) ? $g1_border : 'yes';
$g1_border_size        = !empty($g1_border_size) ? $g1_border_size : '1px';
$g1_border_color        = !empty($g1_border_color) ? $g1_border_color : '#EAEAF1';
?>

<style>
    #alc_style14 .alc_grid_wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    #alc_style14 .alc_item {
        padding: 0 29px;
        margin-right: -1px;
        margin-top: -1px;
        min-height: 150px;
        border: <?php if($g1_border == 'yes'){ echo $g1_border_size . ' solid ' . $g1_border_color ;} else { echo 'none';}?>;
    }

    #alc_style14 .alc_item figure a img {
        width: 100%;
    }
    #alc_style14 .alc_single_grid-6 {
        width: 16.66%;
    }
    #alc_style14 .alc_single_grid-5 {
        width: 20%;
    }
    #alc_style14 .alc_single_grid-4 {
        width: 25%;
    }
    #alc_style14 .alc_single_grid-3 {
        width: 33.33%;
    }
    #alc_style14 .alc_single_grid-2 {
        width: 50%;
    }
    #alc_style14 .alc_single_grid-1 {
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

        #alc_style14 .alc_column_tab-4 {
            width: 25%;
        }
        #alc_style14 .alc_column_tab-3 {
            width: 33.33%;
        }
        #alc_style14 .alc_column_tab-2 {
            width: 50%;
        }
        #alc_style14 .alc_column_tab-1 {
            width: 100%;
        }


    }

    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

        #alc_style14 .alc_column_tab-4 {
            width: 25%;
        }
        #alc_style14 .alc_column_tab-3 {
            width: 33.33%;
        }
        #alc_style14 .alc_column_tab-2 {
            width: 50%;
        }
        #alc_style14 .alc_column_tab-1 {
            width: 100%;
        }

    }

    @media (min-width: 481px) and (max-width: 767px) {

        #alc_style14 .alc_column_mobile-4 {
            width: 25%;
        }
        #alc_style14 .alc_column_mobile-3 {
            width: 33.33%;
        }
        #alc_style14 .alc_column_mobile-2 {
            width: 50%;
        }
        #alc_style14 .alc_column_mobile-1 {
            width: 100%;
        }

    }

    @media (min-width: 320px) and (max-width: 480px) {

        #alc_style14 .alc_column_mobile-4 {
            width: 25%;
        }
        #alc_style14 .alc_column_mobile-3 {
            width: 33.33%;
        }
        #alc_style14 .alc_column_mobile-2 {
            width: 50%;
        }
        #alc_style14 .alc_column_mobile-1 {
            width: 100%;
        }

    }



    /*# sourceMappingURL=maps/theme14.css.map */

</style>
