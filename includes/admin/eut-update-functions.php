<?php

/*
*	Theme update functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Envato Upgrader Check for updates
 */
function eut_envato_toolkit_update_check() {

	if ( is_super_admin() && 1 == eut_option('update_enabled') ) {

		$envato_username = eut_option('update_user_name');
		$envato_api_key = eut_option('update_api_key');
		$show_admin_notice = false;

		if ( empty( $envato_username ) || empty( $envato_api_key ) ) {
			$message = esc_html__( "To enable theme update notifications, please enter your Envato Marketplace credentials via:", 'corpus' ) . " " . esc_html__( "Theme Options - Theme Update", 'corpus' );
			$message_id = 'theme_update_error';
			$message_type = 'error';
			$show_admin_notice = true;
		} else {

			$current_screen = get_current_screen();

			if ( 'themes' == $current_screen->id || 'toplevel_page_eut_options' == $current_screen->id ) {

				// Check for updates
				$upgrader = new Envato_WordPress_Theme_Upgrader( $envato_username, $envato_api_key );
				$updates = $upgrader->check_for_theme_update( EUT_THEME_NAME );

				$current_theme = wp_get_theme( EUT_THEME_SHORT_NAME );
				$update_needed = false;

				//check is current theme up to date
				if ( isset($updates->updated_themes) ) {
					foreach ( $updates->updated_themes as $updated_theme ) {

						if ( $updated_theme->version == $current_theme->version && $updated_theme->name == $current_theme->name ) {
							$update_needed = true;
						}
					}
				}

				if ( !empty( $updates->errors ) ) {
					$message = esc_html__( "Theme Updater Error:", 'corpus' ) . implode( '<br \>', $updates->errors );
					$message_id = 'theme_update_error';
					$message_type = 'error';
					$show_admin_notice = true;
				} else if ( $update_needed ) {
					$change_log_url = "http://euthemians.com/themes/updates/corpus/";

					$message = esc_html__( "New version of Corpus theme is available!", 'corpus' ) . " " .
						__( "View", 'corpus' ) . " " .
						"<a href='" . esc_url( $change_log_url ) . "' target='_blank'>" .
						__( "changelog", 'corpus' ) .
						"</a>.<br/>" . esc_html__( "It is recommended to make a backup before performing an update.", 'corpus' ) . "<br/>" .
						__( "To update click", 'corpus' ) . " " .
						"<a href='" . admin_url() . "themes.php?theme=" . EUT_THEME_SHORT_NAME . "&eut-theme-update=update'>" .
						__( "here", 'corpus' ) .
						"</a>.";
					$message_id = 'theme_update_available';
					$message_type = 'updated';
					$show_admin_notice = true;
				}
			}
		}

		if ( $show_admin_notice ) {
			add_settings_error(
				'eut-theme-update-message',
				esc_attr( $message_id ),
				$message,
				$message_type
			);
		}
	}

}
add_action( 'admin_head', 'eut_envato_toolkit_update_check' );

/**
 * Envato Upgrader Theme Update
 */
function eut_envato_toolkit_update() {

	if ( isset($_GET['eut-theme-update']) && 'update' == $_GET['eut-theme-update'] ) {
		if ( is_super_admin() && 1 == eut_option('update_enabled') ) {

			$envato_username = eut_option('update_user_name');
			$envato_api_key = eut_option('update_api_key');

			if ( empty( $envato_username ) || empty( $envato_api_key ) ) {
				return;
			} else {
				$upgrader = new Envato_WordPress_Theme_Upgrader( $envato_username, $envato_api_key );
				$update_response = $upgrader->upgrade_theme( EUT_THEME_NAME );
			}
			wp_safe_redirect( esc_url( remove_query_arg('eut-theme-update') ) );
		}
	}

}
add_action( 'admin_init', 'eut_envato_toolkit_update' );

/**
 * Display theme update notices in the admin area
 */
function eut_theme_update_admin_notices() {
     settings_errors( 'eut-theme-update-message' );
}
add_action( 'admin_notices', 'eut_theme_update_admin_notices' );

//Omit closing PHP tag to avoid accidental whitespace output errors.
