<style>
    #alc_style16 .alc_grid_wrapper {
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

    #alc_style16 .alc_item {
        padding: 0 29px;
        min-height: 150px;
    }

    #alc_style16 .alc_item figure a img {
        max-width: 100%;
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

    #alc_style16 .alc_single_grid-6 {
        width: 16.66%;
    }
    #alc_style16 .alc_single_grid-5 {
        width: 20%;
    }
    #alc_style16 .alc_single_grid-4 {
        width: 25%;
    }
    #alc_style16 .alc_single_grid-3 {
        width: 33.33%;
    }
    #alc_style16 .alc_single_grid-2 {
        width: 50%;
    }
    #alc_style16 .alc_single_grid-1 {
        width: 100%;
    }
    @media (min-width: 768px) and (max-width: 1024px) {

        #alc_style16 .alc_column_tab-4 {
            width: 25%;
        }
        #alc_style16 .alc_column_tab-3 {
            width: 33.33%;
        }
        #alc_style16 .alc_column_tab-2 {
            width: 50%;
        }
        #alc_style16 .alc_column_tab-1 {
            width: 100%;
        }


    }

    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

        #alc_style16 .alc_column_tab-4 {
            width: 25%;
        }
        #alc_style16 .alc_column_tab-3 {
            width: 33.33%;
        }
        #alc_style16 .alc_column_tab-2 {
            width: 50%;
        }
        #alc_style16 .alc_column_tab-1 {
            width: 100%;
        }

    }

    @media (min-width: 481px) and (max-width: 767px) {

        #alc_style16 .alc_column_mobile-4 {
            width: 25%;
        }
        #alc_style16 .alc_column_mobile-3 {
            width: 33.33%;
        }
        #alc_style16 .alc_column_mobile-2 {
            width: 50%;
        }
        #alc_style16 .alc_column_mobile-1 {
            width: 100%;
        }

    }

    @media (min-width: 320px) and (max-width: 480px) {

        #alc_style16 .alc_column_mobile-4 {
            width: 25%;
        }
        #alc_style16 .alc_column_mobile-3 {
            width: 33.33%;
        }
        #alc_style16 .alc_column_mobile-2 {
            width: 50%;
        }
        #alc_style16 .alc_column_mobile-1 {
            width: 100%;
        }

    }

    /*# sourceMappingURL=maps/theme16.css.map */

</style>