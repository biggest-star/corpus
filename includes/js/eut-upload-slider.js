jQuery(document).ready(function($) {

	"use strict";

	var eutMediaSliderFrame;
	var eutMediaSliderContainer = $( "#eut-slider-container" );
	eutMediaSliderContainer.sortable();

	$('.eut-slider-item-delete-button').click(function() {
		$(this).parent().remove();
	});

	$('.eut-upload-slider-button').click(function() {

        if ( eutMediaSliderFrame ) {
            eutMediaSliderFrame.open();
            return;
        }

        eutMediaSliderFrame = wp.media.frames.eutMediaSliderFrame = wp.media({
            className: 'media-frame eut-media-slider-frame',
            frame: 'select',
            multiple: 'toggle',
            title: eut_upload_slider_texts.modal_title,
            library: {
                type: 'image'
            },
            button: {
                text:  eut_upload_slider_texts.modal_button_title
            }

        });
        eutMediaSliderFrame.on('select', function(){
			var selection = eutMediaSliderFrame.state().get('selection');
			var ids = selection.pluck('id');
			
			$('#eut-upload-slider-button-spinner').show();

			$.post( eut_upload_slider_texts.ajaxurl, { action:'eut_get_slider_media', attachment_ids: ids.toString() } , function( mediaHtml ) {
				eutMediaSliderContainer.append(mediaHtml);
				$('.eut-slider-item-delete-button.eut-item-new').click(function() {
					$(this).parent().remove();
				}).removeClass('eut-item-new');
				
				$('#eut-upload-slider-button-spinner').hide();
			});
        });
        eutMediaSliderFrame.on('ready', function(){
			$( '.media-modal' ).addClass( 'eut-media-no-sidebar' );
        });


        eutMediaSliderFrame.open();
    });


});