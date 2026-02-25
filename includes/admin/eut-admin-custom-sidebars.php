<?php
/*
*	Admin Custom Sidebars
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

	function eut_add_sidebar_settings() {



		if ( isset( $_POST['eut_sidebar_nonce'] ) && wp_verify_nonce( $_POST['eut_sidebar_nonce'], 'save_sidebars' ) ) {

			$sidebars_items = array();
			if( isset( $_POST['eut_custom_sidebar_item_id'] ) ) {
				$num_of_sidebars = sizeof( $_POST['eut_custom_sidebar_item_id'] );
				for ( $i=0; $i < $num_of_sidebars; $i++ ) {
					$this_sidebar = array (
						'id' => $_POST['eut_custom_sidebar_item_id'][ $i ],
						'name' => $_POST['eut_custom_sidebar_item_name'][ $i ],
					);
					array_push( $sidebars_items, $this_sidebar );
				}
			}
			if ( empty( $sidebars_items ) ) {
				delete_option( 'eut-corpus-custom-sidebars' );
			} else {
				update_option( 'eut-corpus-custom-sidebars', $sidebars_items );
			}
			//Update Sidebar list
			wp_get_sidebars_widgets();
			wp_safe_redirect( 'themes.php?page=eut-custom-sidebar-settings&sidebar-settings=saved' );

		}

		add_theme_page(
			esc_html__( 'Sidebars', 'corpus' ),
			esc_html__( 'Sidebars', 'corpus' ),
			'manage_options',
			'eut-custom-sidebar-settings',
			'eut_show_sidebar_settings'
		);
	}

	add_action( 'admin_menu', 'eut_add_sidebar_settings' );

	function eut_show_sidebar_settings() {
		$eut_custom_sidebars = get_option( 'eut-corpus-custom-sidebars' );
?>
	<div id="eut-sidebar-wrap" class="wrap">
		<h2><?php echo esc_html__( "Sidebars", 'corpus' ); ?></h2>

		<?php if( isset( $_GET['sidebar-settings'] ) ) { ?>
		<div class="eut-sidebar-saved eut-notice-green">
			<strong><?php esc_html_e( 'Settings Saved!', 'corpus' ); ?></strong>
		</div>
		<?php } ?>
		<input type="text" id="eut_custom_sidebar_item_name_new" value=""/>
		<input type="button" id="eut-add-custom-sidebar-item" class="button button-primary" value="<?php esc_attr_e( 'Add New', 'corpus' ); ?>"/>
		<span class="eut-sidebar-spinner"></span>
		<div class="eut-sidebar-notice eut-notice-red" style="display:none;">
			<strong><?php esc_html_e( 'Field must not be empty!', 'corpus' ); ?></strong>
		</div>
		<div class="eut-sidebar-notice-exists eut-notice-red" style="display:none;">
			<strong><?php esc_html_e( 'Sidebar with this name already exists!', 'corpus' ); ?></strong>
		</div>
		<form method="post" action="themes.php?page=eut-custom-sidebar-settings">
			<?php wp_nonce_field( 'save_sidebars', 'eut_sidebar_nonce' ); ?>
			<div id="eut-custom-sidebar-container">
				<?php eut_print_admin_custom_sidebars( $eut_custom_sidebars ); ?>
			</div>
			<?php submit_button(); ?>
		</form>
	</div>
<?php
	}

	function  eut_print_admin_custom_sidebars( $eut_custom_sidebars ) {


		if ( ! empty( $eut_custom_sidebars ) ) {
			foreach ( $eut_custom_sidebars as $eut_custom_sidebar ) {
				eut_print_admin_single_custom_sidebar( $eut_custom_sidebar );
			}
		}
	}

	function  eut_print_admin_single_custom_sidebar( $sidebar_item, $mode = '' ) {

		$eut_button_class = "eut-custom-sidebar-item-delete-button";
		$sidebar_item_id = uniqid('eut_sidebar_');

		if( $mode = "new" ) {
			$eut_button_class = "eut-custom-sidebar-item-delete-button eut-item-new";
		}
?>


	<div class="eut-custom-sidebar-item">
		<input class="<?php echo esc_attr( $eut_button_class ); ?> button" type="button" value="<?php esc_attr_e( 'Delete', 'corpus' ); ?>">
		<h3 class="eut-custom-sidebar-title">
			<span><?php esc_html_e( 'Custom Sidebar', 'corpus' ); ?>: <?php echo eut_array_value( $sidebar_item, 'name' ); ?></span>
		</h3>
		<div class="eut-custom-sidebar-settings">
			<input type="hidden" name="eut_custom_sidebar_item_id[]" value="<?php echo eut_array_value( $sidebar_item, 'id', $sidebar_item_id ); ?>">
			<input type="hidden" class="eut-custom-sidebar-item-name" name="eut_custom_sidebar_item_name[]" value="<?php echo eut_array_value( $sidebar_item, 'name' ); ?>"/>
		</div>
	</div>

<?php

	}

	add_action( 'wp_ajax_eut_get_custom_sidebar', 'eut_get_custom_sidebar' );

	function eut_get_custom_sidebar() {



		if( isset( $_POST['eut_sidebar_name'] ) ) {

			$sidebar_item_name = $_POST['eut_sidebar_name'];
			$sidebar_item_id = uniqid('eut_sidebar_');
			if( empty( $sidebar_item_name ) ) {
				$sidebar_item_name = $sidebar_item_id;
			}

			$this_sidebar = array (
				'id' => $sidebar_item_id,
				'name' => $sidebar_item_name,
			);

			eut_print_admin_single_custom_sidebar( $this_sidebar, 'new' );
		}
		die();

	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
