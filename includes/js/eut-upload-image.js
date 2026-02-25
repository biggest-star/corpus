jQuery(document).ready(function($) {

	"use strict";

	var eutMediaImageFrame;
	var eutMediaImageContainer = $( "#eut-feature-image-container" );


	$('.eut-image-item-delete-button').click(function() {
		$(this).parent().remove();
		$('.eut-upload-image-button').removeAttr('disabled').removeClass('disabled');
	});


	$('.eut-upload-image-button').click(function() {

        if ( eutMediaImageFrame ) {
            eutMediaImageFrame.open();
            return;
        }
        eutMediaImageFrame = wp.media.frames.eutMediaImageFrame = wp.media({
            className: 'media-frame eut-media-frame',
            frame: 'select',
            multiple: false,
            title: eut_upload_image_texts.modal_title,
            library: {
                type: 'image'
            },
            button: {
                text:  eut_upload_image_texts.modal_button_title
            }
        });
        eutMediaImageFrame.on('select', function(){
			var selection = eutMediaImageFrame.state().get('selection');
			var ids = selection.pluck('id');

			$('#eut-upload-image-button-spinner').show();
			$('.eut-upload-image-button').attr('disabled','disabled').addClass('disabled');

			$.post( eut_upload_image_texts.ajaxurl, { action:'eut_get_image_media', attachment_id: ids.toString() } , function( mediaHtml ) {

				eutMediaImageContainer.html(mediaHtml);

				$('.eut-image-item-delete-button.eut-item-new').click(function() {
					$(this).parent().remove();
					$('.eut-upload-image-button').removeAttr('disabled').removeClass('disabled');
				}).removeClass('eut-item-new');
				$('.eut-open-image-modal.eut-item-new').bind("click",(function(e){
					e.preventDefault();
					$(this).bindOpenImageModal();
				})).removeClass('eut-item-new');
				$('.eut-upload-replace-image.eut-item-new').bind("click",(function(){
					$(this).bindUploadReplaceImage();
				})).removeClass('eut-item-new');

				$('#eut-upload-image-button-spinner').hide();
			});

        });

        eutMediaImageFrame.open();
    });


});