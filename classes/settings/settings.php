

<div class="lcsp-withoutTab-content">
    <div class="cmb2-wrap form-table">
        <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
            <div class="cmb2-metabox-header">
                <div class="div">
                    <h4><span class="fas fa-cog"></span>Settings & Shortcode Generator</h4>
                </div>
                <div class="div">
                    <a href="#">
                        <p><span class="fas fa-question-circle"></span>Support</p>
                    </a>
                </div>
            </div>
            <div class="cmb2-metabox-content">
                <div class="cmb2-metabox-card cmb2-metabox-card2">
                    <h6><?php esc_html_e('Shortcode',LCG_TEXTDOMAIN); ?></h6>
                    <p><?php esc_html_e('Copy this shortcode and paste on page or post where you want to display logos.Use PHP code to your themes file to display them.',LCG_TEXTDOMAIN); ?>
                    </p>
                    <div class="cmb2-metabox-card-textarea">
                        <textarea onClick="this.select();">[logo_showcase <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                    </div>
                </div>
                <div class="cmb2-metabox-card cmb2-metabox-card3">
                    <h6><?php esc_html_e('PHP Code:',LCG_TEXTDOMAIN); ?></h6>
                    <p><?php esc_html_e('Copy this shortcode and paste on page or post where you want to display logos.Use PHP code to your themes file to display them.',LCG_TEXTDOMAIN); ?>
                    </p>
                    <div class="cmb2-metabox-card-textarea">
                        <textarea
                            onClick="this.select();"><?php echo '<?php echo do_shortcode("[logo_showcase id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>
                    </div>
                </div>
            </div>
        </div> <!-- end cmb2-metabox -->
    </div> <!-- end cmb2-wrap -->
</div> <!-- end lcsp-tab-2 -->

<div id="lcsp-tabs-container">
    <div class="lcsp-tabs-menu-wrapper">
        <ul class="lcsp-tabs-menu">
            <li class="current"><a href="#lcsp-tab-5"><span
                        class="fas fa-cog"></span><?php esc_html_e('General Settings', LCG_TEXTDOMAIN); ?></a></li>
            <li style="display: <?php if(!empty($layout) && $layout == "grid"){ echo "none";}else{ echo "block";}?>;"
                id="tab2"><a href="#lcsp-tab-2"><span
                        class="fas fa-sliders-h"></span><?php esc_html_e('Carousel Settings', LCG_TEXTDOMAIN); ?></a>
            </li>
            <li style="display: <?php if(!empty($layout) && $layout == "grid"){ echo "block";}else{ echo "none";}?>;"
                id="tab3"><a href="#lcsp-tab-3"><span
                        class="fas fa-th"></span><?php esc_html_e('Grid Settings', LCG_TEXTDOMAIN); ?></a></li>
            <li><a href="#lcsp-tab-4"><span
                        class="fas fa-palette"></span><?php esc_html_e('Style Settings', LCG_TEXTDOMAIN); ?></a></li>
        </ul>
    </div>

    <div class="lcsp-tab">
        <?php
                require_once( LCG_PLUGIN_DIR . '/classes/settings/general.php' );
                require_once( LCG_PLUGIN_DIR . '/classes/settings/carousel.php' );
                require_once( LCG_PLUGIN_DIR . '/classes/settings/grid.php' );
                require_once( LCG_PLUGIN_DIR . '/classes/settings/style/style.php' );
              ?>

    </div> <!-- end lcsp-tab -->
</div> <!-- end lcsp-tabs-container -->