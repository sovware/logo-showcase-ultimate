

<div id="lcsp-tabs-container">

    <ul class="lcsp-tabs-menu">
        <li class="current"><a href="#lcsp-tab-1"><?php esc_html_e('Shortcodes', LCG_TEXTDOMAIN); ?></a></li>
        <li><a href="#lcsp-tab-5"><?php esc_html_e('General Settings', LCG_TEXTDOMAIN); ?></a></li>
        <li style="display: <?php if(!empty($layout) && $layout == "grid"){ echo "none";}else{ echo "block";}?>;" id="tab2"><a href="#lcsp-tab-2"><?php esc_html_e('Carousel Settings', LCG_TEXTDOMAIN); ?></a></li>
        <li style="display: <?php if(!empty($layout) && $layout == "grid"){ echo "block";}else{ echo "none";}?>;" id="tab3"><a href="#lcsp-tab-3"><?php esc_html_e('Grid Settings', LCG_TEXTDOMAIN); ?></a></li>
        <li><a href="#lcsp-tab-4"><?php esc_html_e('Style Settings', LCG_TEXTDOMAIN); ?></a></li>
    </ul>

    <div class="lcsp-tab">
        <!--TAB 1  Shortcode -->
        <div id="lcsp-tab-1" class="lcsp-tab-content">
            <div class="cmb2-wrap form-table">
                <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">


                    <p><?php esc_html_e('Shortcode',LCG_TEXTDOMAIN); ?></p>
                    <p><?php esc_html_e('Copy this shortcode and paste on page or post where you want to display logos.Use PHP code to your themes file to display them.',LCG_TEXTDOMAIN); ?></p>
                    <textarea cols="50" rows="1" style="background:#0074A8; color:#fff" onClick="this.select();" >[logo_showcase <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                    <br /><br />

                    <p><?php esc_html_e('PHP Code:',LCG_TEXTDOMAIN); ?></p>
                    <textarea cols="60" rows="1" style="background:#0074A8; color:#fff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[logo_showcase id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>


                </div> <!-- end cmb2-metabox -->
            </div> <!-- end cmb2-wrap -->
        </div> <!-- end lcsp-tab-2 -->
        <?php require_once( LCG_PLUGIN_DIR . '/classes/settings/general.php' );?>
        <?php require_once( LCG_PLUGIN_DIR . '/classes/settings/carousel.php' );?>
        <?php require_once( LCG_PLUGIN_DIR . '/classes/settings/grid.php' );?>
        <?php require_once( LCG_PLUGIN_DIR . '/classes/settings/style/style.php' );?>

    </div> <!-- end lcsp-tab -->
</div> <!-- end lcsp-tabs-container -->