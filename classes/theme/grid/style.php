<style>
    .tooltip-inner {
        max-width: 200px;
        padding: 10px 15px;
        color: <?php echo !empty($tooltip_text_color) ? $tooltip_text_color : '#f4f4f4'?>;
        text-align: center;
        background-color: <?php echo !empty($tooltip_back) ? $tooltip_back : '#202428'?>;
        -webkit-border-radius: 0.25rem;
        border-radius: 0.25rem;
        font-size: <?php echo !empty($tooltip_size) ? $tooltip_size : '16px'?>;
    }
</style>