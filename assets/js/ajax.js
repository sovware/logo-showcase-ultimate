(function($) {

    "use strict";

    $('.lsu_load_more').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'lsu_loadmore',
			'query': lsu_ajax.posts, // that's how we get params from wp_localize_script() function
			'page' : lsu_ajax.current_page,
            'id'   : $(this).attr('data-id')
		};
 
		$.ajax({ // you can also use $.post here
			url : lsu_ajax.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
                button.text('Load More');
				if( data ) { 
					$('.wpwax-lsu-content').append(data); // insert new posts
					lsu_ajax.current_page++;
 
					if ( lsu_ajax.current_page == lsu_ajax.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});

})(jQuery);