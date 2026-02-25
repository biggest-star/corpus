jQuery(document).ready(function($) {

	"use strict";

	//Feature Map
	$('.eut-map-item-delete-button').click(function() {
		$(this).parent().remove();
	});

	$('#eut-upload-multi-map-point').click(function() {

		$('#eut-upload-multi-map-point').attr('disabled','disabled').addClass('disabled');
		$('#eut-upload-multi-map-button-spinner').show();


		$.post( eut_feature_section_texts.ajaxurl, { action:'eut_get_map_point', map_mode:'new' } , function( mediaHtml ) {
			$('#eut-feature-map-container').append(mediaHtml);

			$('.eut-map-item-delete-button.eut-item-new').click(function() {
				$(this).parent().remove();
			}).removeClass('eut-item-new');

			$('.eut-open-map-modal.eut-item-new').bind("click",(function(e){
				e.preventDefault();
				$(this).bindOpenMapModal();
			})).removeClass('eut-item-new');

			$('.eut-remove-simple-media-button.eut-item-new').click(function() {
				$(this).bindRemoveSimpleMedia();
			}).removeClass('eut-item-new');
			$('.eut-upload-simple-media-button.eut-item-new').click(function() {
				$(this).bindUploadSimpleMedia();
			}).removeClass('eut-item-new');
			
			$('.postbox.eut-item-new .handlediv').on('click', function() {
				var p = $(this).parent('.postbox');
				p.removeClass('eut-item-new');
				p.toggleClass('closed');
			});


			$('#eut-upload-multi-map-point').removeAttr('disabled').removeClass('disabled');
			$('#eut-upload-multi-map-button-spinner').hide();
		});
	});



	$('#eut-page-feature-element').change(function() {

		$('.eut-feature-section-item').hide();

		switch($(this).val())
        {
			case "title":
				$('#eut-feature-section-size').stop( true, true ).fadeIn(500);
				$('#eut-page-feature-size').change();
				$('#eut-feature-section-header-position').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-integration').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-effect').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-style').stop( true, true ).fadeIn(500);
				$('#eut-feature-title-container').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-go-to-section').stop( true, true ).fadeIn(500);
            break;
            case "image":
				$('#eut-feature-section-size').stop( true, true ).fadeIn(500);
				$('#eut-page-feature-size').change();
				$('#eut-feature-section-header-position').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-integration').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-effect').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-style').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-image').stop( true, true ).fadeIn(500);
				$('#eut-feature-image-container').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-go-to-section').stop( true, true ).fadeIn(500);
            break;
			 case "video":
				$('#eut-feature-section-size').stop( true, true ).fadeIn(500);
				$('#eut-page-feature-size').change();
				$('#eut-feature-section-header-position').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-integration').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-effect').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-video').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-style').stop( true, true ).fadeIn(500);
				$('#eut-feature-video-container').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-go-to-section').stop( true, true ).fadeIn(500);
            break;
			case "slider":
				$('#eut-feature-section-size').stop( true, true ).fadeIn(500);
				$('#eut-page-feature-size').change();
				$('#eut-feature-section-header-position').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-integration').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-effect').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-slider').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-slider-speed').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-slider-pause').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-slider-direction-nav').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-slider-direction-nav-color').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-slider-transition').stop( true, true ).fadeIn(500);
				$('#eut-feature-slider-container').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-go-to-section').stop( true, true ).fadeIn(500);
            break;
			case "revslider":
				$('#eut-feature-section-size').stop( true, true ).fadeIn(500);
				$('#eut-page-feature-size').change();
				$('#eut-feature-section-header-position').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-integration').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-go-to-section').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-style').stop( true, true ).fadeIn(500);
				$('#eut-page-feature-revslider').stop( true, true ).fadeIn(500);
			break;
			case "map":
				$('#eut-feature-section-size').stop( true, true ).fadeIn(500);
				$('#eut-page-feature-size').change();
				$('#eut-feature-section-header-position').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-integration').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-header-style').stop( true, true ).fadeIn(500);
				$('#eut-feature-section-map').stop( true, true ).fadeIn(500);
				$('#eut-feature-map-container').stop( true, true ).fadeIn(500);
            break;
            default:
			break;
        }
    });

	$('#eut-page-feature-size').change(function() {

		if( 'custom' == $(this).val() )
        {
			if( 'revslider' == $('#eut-page-feature-element').val() ) {
				$('#eut-feature-section-height').hide();
				$('#eut-feature-section-height-rev').stop( true, true ).fadeIn(500);
			} else {
				$('#eut-feature-section-height-rev').hide();
				$('#eut-feature-section-height').stop( true, true ).fadeIn(500);
			}
		} else {
			$('#eut-feature-section-height').hide();
			$('#eut-feature-section-height-rev').hide();
		}

    });

	$(window).load(function(){
		$('#eut-page-feature-element').change();
		$('#eut-page-feature-size').change();
	});

	$('.wp-color-picker-field').wpColorPicker();


});