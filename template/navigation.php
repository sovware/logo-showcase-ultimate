<!--

    Classes:
    -wpwax-lsu-carousel-nav--top-right
    -wpwax-lsu-carousel-nav--top-left
    -wpwax-lsu-carousel-nav--top-middle
    -wpwax-lsu-carousel-nav--bottom-right
    -wpwax-lsu-carousel-nav--bottom-left
    -wpwax-lsu-carousel-nav--bottom-middle
    -wpwax-lsu-carousel-nav-around

 -->

<div class="wpwax-lsu-carousel-nav wpwax-lsu-carousel-nav--<?php echo $nav_position; ?>" style="
  --lsu-navArrowColor: <?php echo $navarro_color; ?>;
  --lsu-navArrowColorHover: <?php echo $nav_hov_arrow_color; ?>;
  --lsu-navBgColor: <?php echo $nav_background; ?>;
  --lsu-navBgColorHover: <?php echo $nav_hov_back_color; ?>;
  --lsu-navBorderColor: <?php echo $nav_border; ?>;
  --lsu-navBorderColorHover: <?php echo $nav_hov_border_color; ?>;
">

    <div class="wpwax-lsu-carousel-nav__btn wpwax-lsu-carousel-nav__btn-prev">

        <img src="<?php echo LCG_PLUGIN_URI . 'assets/icons/arrow-left.svg'; ?>" alt="" class="wpwax-lsu-svg">

    </div>

    <div class="wpwax-lsu-carousel-nav__btn wpwax-lsu-carousel-nav__btn-next">

        <img src="<?php echo LCG_PLUGIN_URI . 'assets/icons/arrow-right.svg'; ?>" alt="" class="wpwax-lsu-svg">

    </div>

</div>