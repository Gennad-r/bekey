$(function() {

var postPerPage = JSON.parse(bekey_main_params.posts).posts_per_page;
	function scrollToNewPosts(n) {
		var postTarget = '.card:nth-child(' + (parseInt(n) + 1) + ')';
		$('html, body').animate({
			scrollTop: $(postTarget).offset().top
		}, 1000);
	}


	$('#load-more').click(function(e){
		e.preventDefault();
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': bekey_main_params.posts,
			'page' : bekey_main_params.current_page
		};
		$.ajax({
			url : bekey_main_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success : function( data ){
				var num = $('.card').length
				if( data ) { 
					button.text( 'Load more...' );
					$('.card').last().after(data);
					scrollToNewPosts(num);
					bekey_main_params.current_page++;
					if ( bekey_main_params.current_page == bekey_main_params.max_page ) 
						button.remove();
				} else {
					button.remove();
				}
			}
		});
	});
});
