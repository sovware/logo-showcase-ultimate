
<?php if( 'carousel' == $layout ) { ?>
<div class="wpwax-lsu-carousel-pagination" style="
    --lsu-dotsColor: <?php echo $pagination_dots_color; ?>;
    --lsu-dotsActiveColor: <?php echo $pagination_dots_active_color; ?>;
"></div>

<?php } elseif( 'grid' == $layout && 'number_pagi' == $pagination_type) { ?>

<div class="lsu-pagination">

<?php  
    $navigation = '';
    $largeNumber = 999999999; // we need a large number here
    $links = paginate_links( array(
        'base' => str_replace( $largeNumber, '%#%', esc_url( get_pagenum_link( $largeNumber ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $adl_logo->max_num_pages,
        'prev_text' => apply_filters('wcpcsu_pagination_prev_text', '<img src="' .  LCG_PLUGIN_URI . 'assets/icons/arrow-left.svg" alt="" class="lsu-svg">'),
        'next_text' => apply_filters('wcpcsu_pagination_next_text', '<img src="' .  LCG_PLUGIN_URI . 'assets/icons/arrow-right.svg" alt="" class="lsu-svg">'),
    ) );
    if( $links ) {
        $navigation = _navigation_markup($links, 'pagination', ' ');
    }
    echo apply_filters('lsu_pagination', $navigation, $links, $adl_logo, $paged);
?>



</div>



<?php } else { ?>    


    <?php if (  $adl_logo->max_num_pages > 1 ) { ?>
                    <div class="wpwax-loadmore-btn">
                        <div class='lsu_load_more' data-id='<?php echo $post_id; ?>'>Load More</div>
                    </div>
    <?php } ?>

<?php } ?>