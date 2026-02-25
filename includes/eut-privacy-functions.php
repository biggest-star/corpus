<?php

/*
*	Privacy Helper functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Get Privacy Switch
 */
if ( !function_exists('eut_get_privacy_switch') ) {
	function eut_get_privacy_switch ( $cookie , $content ) {
		$output = "";
		if ( eut_visibility('privacy_content_blocking_enabled', 1 ) ) {
			$output .= '<div class="eut-privacy-switch">';
			$output .= '<span class="eut-switch-label">' . esc_html( $content ) . '</span>';
			$output .= '<div class="eut-switch">';
			$output .= '<input type="checkbox" checked name="' . esc_attr( $cookie ) . '" class="' . esc_attr( $cookie ) . '" />';
			$output .= '<span class="eut-switch-slider"></span>';
			$output .= '</div>';
			$output .= '</div>';
		} else {
			if( current_user_can( 'administrator' ) ) {
				$output .= '<div class="eut-privacy-switch">';
				$output .= '<span class="eut-switch-label">' . esc_html__( 'Content blocking is disabled ( Theme Options > Privacy / Cookies )', 'corpus'  ) . '</span>';
				$output .= '</div>';
			}
		}
		return $output;
	}
}

/**
 * Get Privacy Required
 */
if ( !function_exists('eut_get_privacy_required') ) {
	function eut_get_privacy_required ( $value , $content ) {
		$output = "";
		$output .= '<div class="eut-privacy-switch">';
		$output .= '<span class="eut-switch-label">' . esc_html( $content ) . '</span>';
		$output .= '<div class="eut-switch eut-switch-text">';
		$output .= '<span class="eut-switch-value">' . esc_html( $value ) . '</span>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}
}

/**
 * Get Privacy Preferences Link
 */
function eut_get_privacy_preferences_link( $content = "" ) {

	$output = "";

	$preferences_label = eut_option( 'privacy_preferences_button_label' );
	if( empty( $content ) ) {
		$content = $preferences_label;
	}
	$preferences_button_link = eut_option( 'privacy_preferences_button_link', 'modal' );
	$preferences_link_url = eut_option( 'privacy_preferences_link_url', '#' );
	$preferences_link_target = eut_option( 'privacy_preferences_link_target', '_self' );

	if ( eut_visibility('privacy_consent_bar_enabled') ) {

		if ( 'modal' == $preferences_button_link ) {
			$output .= '<a href="#" class="eut-privacy-popup-btn">' . esc_html( $content ) . '</a>';
		} elseif( 'privacy_page' == $preferences_button_link ) {
			$page_id = get_option('wp_page_for_privacy_policy');
			if ( !empty( $page_id ) ) {
				if( empty( $content ) ) {
					$content = get_the_title( $page_id );
				}
				$url = get_permalink( $page_id );
				if ( !empty( $url ) ) {
					$output .= '<a href="' . esc_url( $url ) . ' ">' . esc_html( $content ) . '</a>';
				}
			}
		} else {
			$output .= '<a href="' . esc_url( $preferences_link_url ) . ' " target="' . esc_attr( $preferences_link_target ) . '">' . esc_html( $content ) . '</a>';
		}
	}

	return $output;
}

/**
 * Check Privacy Visibility
 */
function eut_is_privacy_key_enabled( $privacy_key ) {
	$enabled = true;
	if ( eut_visibility('privacy_content_blocking_enabled', 1 ) ) {
		$cookie_key = 'eut-privacy-content-' . trim( $privacy_key );

		if ( isset( $_COOKIE[$cookie_key] ) ) {
			if ( 'false' == $_COOKIE[$cookie_key] ) {
				$enabled = false;
			} else {
				$enabled = true;
			}
		} else {
			$initial_switches_disabled = eut_option( 'privacy_initial_state', array() );
			if( !empty( $initial_switches_disabled ) ) {
				foreach( $initial_switches_disabled as $key => $value ) {
					if ( $key == $privacy_key && 1 == $value ) {
						$enabled = false;
					}
				}
			}
		}
	}
	return $enabled;
}

/**
 * Get Privacy Cookie Script
 */
function eut_get_privacy_cookie_script() {

	$output = "";

	$output .= "
		function eutReadCookie(name) {
			var nameEQ = name + '=';
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		}
		function eutPrivacyCookieConsent( cookie_name, cookie_days ) {
			var privacyAgreement = jQuery('.eut-privacy-agreement');
			privacyAgreement.on( 'click', function() {
				var theDate = new Date();
				var later = new Date( theDate.getTime() + cookie_days*24*60*60*1000 );
				document.cookie = cookie_name + '=true; Path=/; Expires='+later.toGMTString()+';';
				jQuery('#eut-privacy-bar').fadeOut(900);
			});
			if( !document.cookie.match( cookie_name ) ) {
				jQuery('#eut-privacy-bar').fadeIn(900);
			}
		}
		function eutPrivacyPopupConsent() {
			var privacyPopupButton = jQuery('.eut-privacy-popup-btn'),
				privacyRefreshButton = jQuery('.eut-privacy-refresh-btn'),
				privacyPopup = jQuery('#eut-privacy-popup'),
				privacyOverlay = jQuery('#eut-privacy-overlay');
			privacyPopupButton.on( 'click', function(e) {
				e.preventDefault();
				privacyPopup.fadeIn(600,function(){
					jQuery(window).on( 'click.eut_close_privacy_popup', function( event ) {
						if( !jQuery(event.target).closest('.eut-privacy-popup-wrapper').length ) {
							privacyPopup.fadeOut(600,function(){
								jQuery(window).off( 'click.eut_close_privacy_popup' );
							});
							privacyOverlay.fadeOut(600);
						}
					});
				});
				privacyOverlay.fadeIn(600);
			});
			privacyRefreshButton.on( 'click', function() {
				window.location.reload(true);
			});
		}
	";

	$output .= " eutPrivacyCookieConsent('eut-privacy-consent', '30');";
	$output .= " eutPrivacyPopupConsent();";

	if ( eut_visibility('privacy_content_blocking_enabled', 1 ) ) {

		$cookie_key_prefix = 'eut-privacy-content-';

		$eut_cookies_switches = array (
			$cookie_key_prefix . 'gtracking' => true,
			$cookie_key_prefix . 'gfonts' => true,
			$cookie_key_prefix . 'gmaps' => true,
			$cookie_key_prefix . 'video-embeds' => true,
		);

		$initial_switches_disabled = eut_option( 'privacy_initial_state', array() );
		if( !empty( $initial_switches_disabled ) ) {
			foreach( $initial_switches_disabled as $key => $value ) {
				if( $value ) {
					$eut_cookies_switches[ $cookie_key_prefix . $key ] = false;
				}
			}
		}

		$output .= "
			function eutPrivacyCookieSwitch( cookie_name, initial_state ) {

				var theDate = new Date();
				var oneYearLater = new Date( theDate.getTime() + 31536000000 );
				var privacySwitch = jQuery('.' + cookie_name);

				privacySwitch.each( function() {
					if( document.cookie.match( cookie_name ) ) {
						if ( 'false' == eutReadCookie(cookie_name) ) {
							this.checked = false;
						} else {
							this.checked = true;
						}
					} else {
						if( !initial_state ) {
							this.checked = false;
						}
					}
				});
				privacySwitch.on( 'click', function() {
					if( this.checked ) {
						document.cookie = cookie_name + '=true; Path=/; Expires='+oneYearLater.toGMTString()+';';
						privacySwitch.each( function() {
							this.checked = true;
						});
					} else {
						document.cookie = cookie_name + '=false; Path=/; Expires='+oneYearLater.toGMTString()+';';
						privacySwitch.each( function() {
							this.checked = false;
						});
					}
				});
			}
		";
		foreach( $eut_cookies_switches as $cookie => $initial_value ) {
			$output .= " eutPrivacyCookieSwitch('" . esc_attr( $cookie ) . "', '" . esc_attr( $initial_value ) . "' );";
		}
	}

	return preg_replace('/\r|\n|\t/', '', $output);

}

/**
 * Privacy Disable Fallback
 */
function eut_privacy_disable_fallback( $url = "", $title = "", $icon_url = "" ) {

	$output = "";

	if ( !eut_visibility('privacy_fallback_preferences_link_visibility') ) {
		$preferences_link = "";
	} else{
		$preferences_link = eut_get_privacy_preferences_link();
	}

	if ( !eut_visibility('privacy_fallback_content_link_visibility') ) {
		$url = "";
	}

	$output .= '<div class="eut-privacy-fallback-content eut-align-center">';
	$output .= '<div class="eut-privacy-fallback-inner">';
	if ( !empty( $icon_url ) ){
		$output .= '<img class="eut-privacy-fallback-icon" src="' . esc_url( $icon_url ) . '" alt="' . esc_attr( $title ) . '">';
	}
	$output .= wp_kses_post( eut_option( 'privacy_fallback_content' ) );
	$output .= '<div class="clear"></div>';
	if ( !empty( $preferences_link ) ) {
		$output .= $preferences_link;
	}
	if ( !empty( $url ) ){
		if ( !empty( $preferences_link ) ) {
			$output .= " / ";
		}
		$output .= '<a href="' . esc_url( $url ) . '" target="_blank">' . esc_html( $title ) . '</a>';
	}
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

/**
 * Privacy Disable Google Maps
 */
function eut_privacy_disable_map_fallback( $output = '', $latitude = '0.0', $longitude = '0.0' ) {
	if ( !eut_is_privacy_key_enabled( 'gmaps' ) ) {
		$adr = trim( $latitude ) . ',' . trim( $longitude );
		$url = 'https://www.google.com/maps/search/?api=1&query=' . $adr  ;
		$icon_url = get_template_directory_uri() . '/images/privacy/google-map-icon.png';
		$output = eut_privacy_disable_fallback( $url, 'Google Maps', $icon_url );
	}
	return $output;
}
add_filter("eut_privacy_gmap_fallback", 'eut_privacy_disable_map_fallback', 10, 3 );

function eut_privacy_disable_map_scripts() {
	if ( !eut_is_privacy_key_enabled( 'gmaps' ) ) {
		wp_deregister_script( 'eut-maps-script' );
		wp_deregister_script( 'eut-googleapi-script' );
		wp_deregister_script( 'leaflet-maps-api' );
	}
}
add_action( 'wp_footer', 'eut_privacy_disable_map_scripts', 12 );

/**
 * Privacy Disable Video Embeds
 */
function eut_privacy_disable_oembed_html( $cache, $url, $attr, $post_ID ) {
	if ( !eut_is_privacy_key_enabled( 'video-embeds' ) ) {
	    // Check for different providers
	    if ( false !== strpos( $url, 'vimeo.com' ) ) {
	    	$icon_url = get_template_directory_uri() . '/images/privacy/vimeo-icon.png';
			return eut_privacy_disable_fallback( $url, 'Vimeo', $icon_url );
	    }
	    if ( false !== strpos( $url, 'youtube.com' ) ) {
	    	$icon_url = get_template_directory_uri() . '/images/privacy/youtube-icon.png';
	        return eut_privacy_disable_fallback( $url, 'YouTube', $icon_url );
	    }
    }
    return $cache;
}
add_filter( 'embed_oembed_html', 'eut_privacy_disable_oembed_html', 99, 4 );

function eut_privacy_disable_embed_scripts() {
	if ( !eut_is_privacy_key_enabled( 'video-embeds' ) ) {
		wp_dequeue_script( 'vc_youtube_iframe_api_js' );
		wp_dequeue_script( 'youtube-iframe-api' );
	}
}
add_action( 'wp_footer', 'eut_privacy_disable_embed_scripts', 12 );

//Remove YouTube ID in Youtube Background Videos
function eut_privacy_disable_bg_youtube_embed( $args ) {
	if ( !eut_is_privacy_key_enabled( 'video-embeds' ) ) {
		return "";
	}
	return $args;
}
add_filter( 'eut_privacy_bg_youtube_id', 'eut_privacy_disable_bg_youtube_embed' );


/**
 * Privacy Disable Google Fonts / Google Analytics
 */
function eut_privacy_disable_styles() {
	if ( !eut_is_privacy_key_enabled( 'gfonts' ) ) {
		if ( wp_style_is( 'redux-google-fonts-eut_corpus_options', 'registered' ) ) {
			wp_deregister_style( 'redux-google-fonts-eut_corpus_options' );
		}
	}
	if ( !eut_is_privacy_key_enabled( 'gtracking' ) ) {
		remove_action('wp_head', 'eut_print_tracking_code');
		remove_action('wp_head', 'eut_print_tracking_code_custom');
	}
}
add_action( 'wp_print_styles', 'eut_privacy_disable_styles', 2000 );

/**
 * Print Privacy Bar
 */
function eut_print_privacy_bar() {

	if ( eut_visibility('privacy_consent_bar_enabled') ) {
		$agreement_label = eut_option( 'privacy_agreement_button_label' );
		$preferences_label = eut_option( 'privacy_preferences_button_label' );
		$preferences_button_link = eut_option( 'privacy_preferences_button_link', 'modal' );
		$preferences_link_url = eut_option( 'privacy_preferences_link_url', '#' );
		$preferences_link_target = eut_option( 'privacy_preferences_link_target', '_self' );
?>
	<div id="eut-privacy-bar">
		<div class="eut-privacy-wrapper">
			<div class="eut-privacy-content">
				<?php echo do_shortcode( wp_kses_post( eut_option( 'privacy_consent_bar_content' ) ) ); ?>
			</div>
			<div class="eut-privacy-buttons-wrapper">
				<?php
					if ( !empty( $preferences_label ) ) {
						if ( 'modal' == $preferences_button_link ) {
				?>
							<button class="eut-privacy-btn eut-privacy-preferences eut-privacy-popup-btn" type="button"><?php echo esc_html( $preferences_label ); ?></button>
				<?php
						} elseif( 'privacy_page' == $preferences_button_link ) {
							$page_id = get_option('wp_page_for_privacy_policy');
							if ( !empty( $page_id ) ) {
								$url = get_permalink( $page_id );
								if ( !empty( $url ) ) {
				?>
							<a href="<?php echo esc_url( $url ); ?>" class="eut-privacy-btn eut-privacy-preferences eut-link-text"><?php echo esc_html( $preferences_label ); ?></a>
				<?php
								}
							}
						} else {
				?>
							<a href="<?php echo esc_url( $preferences_link_url ); ?>" target="<?php echo esc_attr( $preferences_link_target ); ?>" class="eut-privacy-btn eut-privacy-preferences eut-link-text"><?php echo esc_html( $preferences_label ); ?></a>
				<?php
						}
					}
					if ( !empty( $agreement_label ) ) {
				?>
					<button class="eut-privacy-btn eut-privacy-agreement" type="button"><?php echo esc_html( $agreement_label ); ?></button>
				<?php
					}
				?>
			</div>
		</div>
	</div>
<?php
	}
}

add_action( 'wp_footer', 'eut_print_privacy_bar', 9);

/**
 * Print Privacy Bar
 */
function eut_print_privacy_popup() {
	if ( eut_visibility('privacy_consent_bar_enabled') && 'modal' == eut_option( 'privacy_preferences_button_link', 'modal' ) ) {
	$refresh_label = eut_option( 'privacy_refresh_button_label' );
?>
	<div id="eut-privacy-popup">
		<div class="eut-close-privacy-popup"></div>
		<div class="eut-privacy-popup-wrapper">
			<div class="eut-privacy-popup-inner">
				<div class="eut-privacy-popup-content">
					<?php echo do_shortcode( wp_kses_post( eut_option( 'privacy_consent_modal_content' ) ) ); ?>
				</div>
			</div>
			<?php if ( !empty( $refresh_label ) ) { ?>
			<div class="eut-privacy-refresh-btn-wrapper">
				<button class="eut-privacy-btn eut-privacy-refresh-btn" type="button"><?php echo esc_html( $refresh_label ); ?></button>
			</div>
			<?php } ?>
		</div>
	</div>
	<div id="eut-privacy-overlay"></div>
<?php
	}
}

add_action( 'wp_footer', 'eut_print_privacy_popup', 8);


/**
 * Add Body Class
 */
function eut_privacy_body_class( $classes ){
	$privacy_disabled_classes = array();

	if( !eut_is_privacy_key_enabled('video-embeds') ) {
		$privacy_disabled_classes[] = 'eut-privacy-video-embeds-disabled';
	}
	if( !eut_is_privacy_key_enabled('gmaps') ) {
		$privacy_disabled_classes[] = 'eut-privacy-gmaps-disabled';
	}
	if ( empty( $privacy_disabled_classes ) ) {
		return $classes;
	} else {
		return array_merge( $classes, $privacy_disabled_classes );
	}
}
add_filter( 'body_class', 'eut_privacy_body_class', 12 );

//Omit closing PHP tag to avoid accidental whitespace output errors.
