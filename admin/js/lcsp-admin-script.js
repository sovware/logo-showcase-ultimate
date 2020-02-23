jQuery(document).ready(function($) {

    $(".lcsp-tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".lcsp-tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

    //color picker
    jQuery( '.cpa-color-picker' ).wpColorPicker();





    //Layout select
    $("#lcg").change(function() {

    	if($(this).val() === 'carousel') {
            $("#tab2").css('display', 'block');
            $("#tab3").css('display', 'none');
        }


      	if($(this).val() === 'grid'){
          $("#tab2").css('display', 'none');
          $("#tab3").css('display', 'block');
      	}

    });


    $('#c_theme1, #c_theme2, #c_theme3').hide();

    var $theme = $('#c_theme'); // get theme jQuery object

    var currentTheme = $theme.val(); // get current theme

    $('#' + currentTheme).show() // show current theme
    $theme.on('change',function(){
        var $this = $(this);


        ('c_theme1' == $this.val() ) ? $('#c_theme1').show() : $('#c_theme1').hide();
        ('c_theme2' == $this.val() ) ? $('#c_theme2').show() : $('#c_theme2').hide();
        ('c_theme3' == $this.val() ) ? $('#c_theme3').show() : $('#c_theme3').hide();





    });

    $('#g_theme1, #g_theme2').hide();

    var $theme = $('#g_theme'); // get theme jQuery object

    var currentTheme = $theme.val(); // get current theme

    $('#' + currentTheme).show() // show current theme
    $theme.on('change',function(){
        var $this = $(this);


        ('g_theme1' == $this.val() ) ? $('#g_theme1').show() : $('#g_theme1').hide();
        ('g_theme2' == $this.val() ) ? $('#g_theme2').show() : $('#g_theme2').hide();

    });
    
    // hide all theme setting on load then show them based on selected value
    // $('#c_theme1, #c_theme2, #c_theme3').hide();

    // var $theme = $('#c_theme');
    // var $laya = $('#lcg');
    // var currentTheme = $theme.val();
    // $('#' + currentTheme).show();

    // // change theme setting based on selection value
    // $theme.on('change',function(){
    //     var $this = $(this);


    //     ('c_theme1' == $this.val() ) ? $('#c_theme1').show() : $('#c_theme1').hide();
    //     ('c_theme2' == $this.val() ) ? $('#c_theme2').show() : $('#c_theme2').hide();
    //     ('c_theme3' == $this.val() ) ? $('#c_theme3').show() : $('#c_theme3').hide();
        
        

    // });

    // // change theme setting based on selection value
    // $laya.on('change',function(){
    //     var $this = $(this);


    //     ('grid' == $this.val() ) ? $('#c_theme1, #c_theme2, #c_theme3').hide() : $('#c_theme1, #c_theme2, #c_theme3').show();
        
        

    // });


});

