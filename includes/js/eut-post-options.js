jQuery(document).ready(function($) {

	"use strict";

	$('#eut-post-type-video-mode').change(function() {

		$( '.eut-post-video-embed' ).hide();
		$( '.eut-post-video-html5' ).hide();

		if( 'html5' == $(this).val() ) {
			$( '.eut-post-video-html5' ).stop( true, true ).fadeIn(500);
		} else {
			$( '.eut-post-video-embed' ).stop( true, true ).fadeIn(500);
		}

    });

	$('#eut-post-type-audio-mode').change(function() {

		$( '.eut-post-audio-embed' ).hide();
		$( '.eut-post-audio-html5' ).hide();

		if( 'html5' == $(this).val() ) {
			$( '.eut-post-audio-html5' ).stop( true, true ).fadeIn(500);
		} else {
			$( '.eut-post-audio-embed' ).stop( true, true ).fadeIn(500);
		}

    });

	function eutCheckPostFormat() {
		var format = $('#post-formats-select input:checked').attr('value');
		if(typeof format != 'undefined') {

			$( '#post-body div[id^=eut-meta-box-post-format-]' ).hide();
			$( '#post-body #eut-meta-box-post-format-' + format ).stop( true, true ).fadeIn(500);

		}
	}

	$('#eut-post-gallery-mode').change(function() {

		$( '.eut-post-media-item' ).hide();

		if ( 'slider' == $(this).val() ) {
			$( '#eut-post-gallery-image-mode-section' ).stop( true, true ).fadeIn(500);
			$( '#eut-post-media-slider-speed' ).stop( true, true ).fadeIn(500);
			$( '#eut-post-media-slider-direction-nav' ).stop( true, true ).fadeIn(500);
		}

    });

	$(window).load(function(){
		eutCheckPostFormat();
		$('#eut-post-gallery-mode').change();
		$('#eut-post-type-video-mode').change();
		$('#eut-post-type-audio-mode').change();
		$('#post-formats-select input').change(eutCheckPostFormat);
	})

});