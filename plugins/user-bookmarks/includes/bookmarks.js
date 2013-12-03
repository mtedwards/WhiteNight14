jQuery(document).ready( function($) {
	
	var added_message = upb_vars.added_message;
	var delete_message = upb_vars.delete_message;

	$(".upb_add_bookmark").click( function() {
	  addBookBar();
	  _gaq.push(['_trackEvent', 'click', 'my night', 'add event']);
		var post_id = $(this).attr('rel');
		var data = {
			action: 'bookmark_post',
			post_read: post_id
		};
	 	$.post(upb_vars.ajaxurl, data, function(response) {
			//alert(added_message);
			$('.upb_bookmark_control_'+post_id).toggle();
			if($('.upb-bookmarks-list').length > 0 ) {
				var bookmark_data = {
					action: 'insert_bookmark',
					post_id: post_id
				};
				$.post(upb_vars.ajaxurl, bookmark_data, function(bookmark) {
					$(bookmark).appendTo('.upb-bookmarks-list');
					$('.no-bookmarks').fadeOut();
				});
			}
	 	});
	 	return false;
	});
	$(".upb_del_bookmark").click( function() {
	  _gaq.push(['_trackEvent', 'click', 'my night', 'minus event']);
		if(confirm(delete_message)) {
			var post_id = $(this).attr('rel');
			var data = {
				action: 'del_bookmark',
				del_post_id: post_id
			};
			$.post(upb_vars.ajaxurl, data, function(response) {
				$('.bookmark-'+post_id).fadeOut();
				$('.upb_bookmark_control_'+post_id).toggle();
				if($('.my-night').length) {
				  window.location.reload(true);
				}
			});
		}
	 	return false;
	});
	
	function addBookBar(){
    $('.added-event').slideDown(100).delay(10000).slideUp(100);
	}
});