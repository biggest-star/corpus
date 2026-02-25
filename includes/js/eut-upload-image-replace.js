jQuery(document).ready(function($) {

	"use strict";

	var eutMediaImageReplaceFrame;
	var eutMediaImageReplaceContainer;
	var eutMediaImageReplaceMode;
	var eutMediaImageReplaceImage;

	$('.eut-upload-replace-image').bind("click",(function(){
		$(this).bindUploadReplaceImage();
	}));


	$.fn.bindUploadReplaceImage = function(){

		eutMediaImageReplaceContainer = $(this).parent().find('.eut-thumb-container');
		eutMediaImageReplaceMode = eutMediaImageReplaceContainer.data('mode');
		eutMediaImageReplaceImage = $(this).parent().find('.eut-thumb');

        if ( eutMediaImageReplaceFrame ) {
            eutMediaImageReplaceFrame.open();
            return;
        }


        eutMediaImageReplaceFrame = wp.media.frames.eutMediaImageReplaceFrame = wp.media({
            className: 'media-frame eut-media-replace-image-frame',
            frame: 'select',
            multiple: false,
            title: eut_upload_image_replace_texts.modal_title,
            library: {
                type: 'image'
            },
            button: {
                text:  eut_upload_image_replace_texts.modal_button_title
            }

        });

        eutMediaImageReplaceFrame.on('select', function(){
			var selection = eutMediaImageReplaceFrame.state().get('selection');
			var ids = selection.pluck('id');
			$('.eut-upload-replace-image').unbind("click").css({ 'cursor': 'wait' });
			eutMediaImageReplaceImage.remove();
			$.post( eut_upload_image_replace_texts.ajaxurl, { action:'eut_get_replaced_image', attachment_id: ids.toString(), attachment_mode: eutMediaImageReplaceMode } , function( mediaHtml ) {
				eutMediaImageReplaceContainer.html(mediaHtml);
				$('.eut-upload-replace-image').bind("click",(function(){
					$(this).bindUploadReplaceImage();
				})).css({ 'cursor': 'pointer' });
			});
        });

        eutMediaImageReplaceFrame.open();
    }


});