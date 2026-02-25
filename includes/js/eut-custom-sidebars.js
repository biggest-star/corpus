jQuery(document).ready(function($) {

	"use strict";

	$('.eut-custom-sidebar-item-delete-button').click(function() {
		$(this).parent().remove();
	});

	$('#eut-add-custom-sidebar-item').click(function() {

		$('#eut-sidebar-wrap .button').attr('disabled','disabled').addClass('disabled');
		$('.eut-sidebar-notice').hide();
		$('.eut-sidebar-notice-exists').hide();
		$('.eut-sidebar-spinner').show();

		var sidebarName = $('#eut_custom_sidebar_item_name_new').val();

		if ( '' == $.trim(sidebarName) ) {
			$('.eut-sidebar-notice').show();
			$('.eut-sidebar-spinner').hide();
			$('#eut-sidebar-wrap .button').removeAttr('disabled').removeClass('disabled');
		} else {

			var alreadyExists = false;
			$('#eut-sidebar-wrap .eut-custom-sidebar-item-name').each(function () {
				if( $(this).val() == sidebarName ) {
					alreadyExists = true;
					return false;
				}
			});
			if ( alreadyExists ) {
				$('.eut-sidebar-notice-exists').show();
				$('.eut-sidebar-spinner').hide();
				$('#eut-sidebar-wrap .button').removeAttr('disabled').removeClass('disabled');
			} else {
				$.post( eut_custom_sidebar_texts.ajaxurl, { action:'eut_get_custom_sidebar', eut_sidebar_name: sidebarName } , function( sidebarHtml ) {
					$('#eut-custom-sidebar-container').append(sidebarHtml);

					$('.eut-custom-sidebar-item-delete-button.eut-item-new').click(function() {
						$(this).parent().remove();
					}).removeClass('eut-item-new');

					$('#eut_custom_sidebar_item_name_new').val('');
					$('.eut-sidebar-spinner').hide();
					$('#eut-sidebar-wrap .button').removeAttr('disabled').removeClass('disabled');
				});
			}
		}
	});

	$( "#eut-custom-sidebar-container" ).sortable();
	$('.eut-sidebar-saved').delay(4000).slideUp();


});