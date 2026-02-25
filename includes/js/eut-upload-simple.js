jQuery(document).ready(function($) {

	"use strict";

	var eutMediaFrame;
	var eutMediaInputField;
	var eutMediaInputType;


	$('.eut-remove-simple-media-button').click(function() {
		$(this).bindRemoveSimpleMedia();
	});
	$('.eut-upload-simple-media-button').click(function() {
		$(this).bindUploadSimpleMedia();
	});

	$.fn.bindRemoveSimpleMedia = function(){
		$(this).parent().find('.eut-upload-simple-media-field').val('');
	}

	$.fn.bindUploadSimpleMedia = function(){
		eutMediaInputField = $(this).parent().find('.eut-upload-simple-media-field');
		eutMediaInputType = $(this).data('media-type');
		
        eutMediaFrame = wp.media.frames.eutMediaFrame = wp.media({
            className: 'media-frame eut-media-frame',
            frame: 'select',
            multiple: false,
            title: eut_upload_media_texts.modal_title,
            library: {
                type: eutMediaInputType
            },
            button: {
                text:  eut_upload_media_texts.modal_button_title
            }
        });
        eutMediaFrame.on('select', function(){
            var mediaAttachment = eutMediaFrame.state().get('selection').first().toJSON();
            eutMediaInputField.val( mediaAttachment.url );
        });

        eutMediaFrame.open();
    }


});