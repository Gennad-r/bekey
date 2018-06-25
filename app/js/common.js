$(function() {

var postPerPage = 4;
	function scrollToNewPosts(n) {
		var postTarget = '.post-item:nth-child(' + (parseInt(n) + 1) + ')';
		$('html, body').animate({
			scrollTop: $(postTarget).offset().top
		}, 1000);
	}



	$('#load-more').click(function(){
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
				var num = $('.post-item').length
				if( data ) { 
					button.text( 'Load more...' );
					$('.post-item').last().after(data);
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
