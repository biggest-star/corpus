jQuery(document).ready(function($) {

	"use strict";

	$('#eut-portfolio-media-selection').change(function() {

		$('.eut-portfolio-media-item').hide();

		switch($(this).val())
        {
			case "gallery":
				$('#eut-portfolio-media-slider').stop( true, true ).fadeIn(500);
				$('#eut-slider-container').stop( true, true ).fadeIn(500);
            break;
			case "gallery-vertical":
				$('.eut-portfolio-media-image-mode').stop( true, true ).fadeIn(500);
				$('#eut-portfolio-media-slider').stop( true, true ).fadeIn(500);
				$('#eut-slider-container').stop( true, true ).fadeIn(500);
            break;
			case "slider":
				$('.eut-portfolio-media-image-mode').stop( true, true ).fadeIn(500);
				$('#eut-portfolio-media-slider').stop( true, true ).fadeIn(500);
				$('#eut-portfolio-media-slider-speed').stop( true, true ).fadeIn(500);
				$('#eut-portfolio-media-slider-direction-nav').stop( true, true ).fadeIn(500);
				$('#eut-slider-container').stop( true, true ).fadeIn(500);
            break;
			case "video":
				$('.eut-portfolio-video-embed').stop( true, true ).fadeIn(500);
			break;
			case "video-html5":
				$('.eut-portfolio-video-html5').stop( true, true ).fadeIn(500);
			break;
            default:
			break;
        }
    });

	$('#eut-portfolio-link-mode').change(function() {
		switch($(this).val())
        {
			case "link":
				$('.eut-portfolio-custom-link-mode').stop( true, true ).fadeIn(500);
            break;
            default:
				$('.eut-portfolio-custom-link-mode').hide();
			break;
        }
    });

	$(window).load(function(){
		$('#eut-portfolio-media-selection').change();
		$('#eut-portfolio-link-mode').change();
	})

});