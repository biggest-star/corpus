jQuery(document).ready(function($) {

	"use strict";

	var eutFeatureSliderFrame;
	var eutFeatureSliderContainer = $( "#eut-feature-slider-container" );
	eutFeatureSliderContainer.sortable();

	$('.eut-feature-slider-item-delete-button').click(function() {
		$(this).parent().remove();
	});

	$('.eut-upload-feature-slider-button').click(function() {

        if ( eutFeatureSliderFrame ) {
            eutFeatureSliderFrame.open();
            return;
        }

        eutFeatureSliderFrame = wp.media.frames.eutFeatureSliderFrame = wp.media({
            className: 'media-frame eut-media-feature-slider-frame',
            frame: 'select',
            multiple: 'toggle',
            title: eut_upload_feature_slider_texts.modal_title,
            library: {
                type: 'image'
            },
            button: {
                text:  eut_upload_feature_slider_texts.modal_button_title
            }

        });
        eutFeatureSliderFrame.on('select', function(){
			var selection = eutFeatureSliderFrame.state().get('selection');
			var ids = selection.pluck('id');

			$('#eut-upload-feature-slider-button-spinner').show();

			$.post( eut_upload_feature_slider_texts.ajaxurl, { action:'eut_get_admin_feature_slider_media', attachment_ids: ids.toString() } , function( mediaHtml ) {
				eutFeatureSliderContainer.append(mediaHtml);
				$('.eut-feature-slider-item-delete-button.eut-item-new').click(function() {
					$(this).parent().remove();
				}).removeClass('eut-item-new');

				$('.eut-upload-replace-image.eut-item-new').bind("click",(function(){
					$(this).bindUploadReplaceImage();
				})).removeClass('eut-item-new');

				$('.eut-open-slider-modal.eut-item-new').bind("click",(function(e){
					e.preventDefault();
					$(this).bindOpenSliderModal();
				})).removeClass('eut-item-new');

				$('.postbox.eut-item-new .handlediv').bind('click', function() {
					var p = $(this).parent('.postbox');

					p.removeClass('eut-item-new');
					p.toggleClass('closed');

				});


				$('#eut-upload-feature-slider-button-spinner').hide();


			});
        });
        eutFeatureSliderFrame.on('ready', function(){
			$( '.media-modal' ).addClass( 'eut-media-no-sidebar' );
        });


        eutFeatureSliderFrame.open();
    });


});