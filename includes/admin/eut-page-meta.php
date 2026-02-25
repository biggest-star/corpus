<?php
/*
*	Euthemians Page Items
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

	add_action( 'add_meta_boxes', 'eut_page_options_add_custom_boxes' );
	add_action( 'save_post', 'eut_page_options_save_postdata', 10, 2 );

	$eut_page_options = array (
		array(
			'name' => 'Description',
			'id' => 'eut_page_description',
		),
		array(
			'name' => 'Page Layout',
			'id' => 'eut_page_layout',
		),
		array(
			'name' => 'Page Sidebar',
			'id' => 'eut_page_sidebar',
		),
		array(
			'name' => 'Sidebar Style',
			'id' => 'eut_sidebar_style',
		),
		array(
			'name' => 'Fixed Sidebar',
			'id' => 'eut_fixed_sidebar',
		),
		array(
			'name' => 'Page Navigation Anchor Menu',
			'id' => 'eut_page_navigation_menu',
		),
		array(
			'name' => 'Main Navigation Menu',
			'id' => 'eut_main_navigation_menu',
		),
		array(
			'name' => 'Main Navigation Menu Type',
			'id' => 'eut_main_navigation_menu_type',
		),
		array(
			'name' => 'Sticky Header Type',
			'id' => 'eut_sticky_header_type',
		),
		array(
			'name' => 'Disable Sticky',
			'id' => 'eut_disable_sticky',
		),
		array(
			'name' => 'Disable Logo',
			'id' => 'eut_disable_logo',
		),
		array(
			'name' => 'Disable Menu',
			'id' => 'eut_disable_menu',
		),
		array(
			'name' => 'Disable Menu Items',
			'id' => 'eut_disable_menu_items',
		),
		array(
			'name' => 'Disable Title',
			'id' => 'eut_disable_title',
		),
		array(
			'name' => 'Disable Top Bar',
			'id' => 'eut_disable_top_bar',
		),
		array(
			'name' => 'Disable Content',
			'id' => 'eut_disable_content',
		),
		array(
			'name' => 'Disable Side Area',
			'id' => 'eut_disable_sidearea',
		),
		array(
			'name' => 'Disable Footer',
			'id' => 'eut_disable_footer',
		),
		array(
			'name' => 'Disable Copyright',
			'id' => 'eut_disable_copyright',
		),
		//Feature Section
		array(
			'name' => 'Feature Element',
			'id' => 'eut_page_feature_element',
		),
		array(
			'name' => 'Feature Size',
			'id' => 'eut_page_feature_size',
		),
		array(
			'name' => 'Feature Height',
			'id' => 'eut_page_feature_height',
		),
		array(
			'name' => 'Feature Header Integration',
			'id' => 'eut_page_feature_header_integration',
		),
		array(
			'name' => 'Feature Header Position',
			'id' => 'eut_page_feature_header_position',
		),
		array(
			'name' => 'Feature Header Style',
			'id' => 'eut_page_feature_header_style',
		),
		array(
			'name' => 'Feature effect',
			'id' => 'eut_page_feature_effect',
		),
		array(
			'name' => 'Feature go to section',
			'id' => 'eut_page_feature_go_to_section',
		),
		array(
			'name' => 'Feature Revslider',
			'id' => 'eut_page_feature_revslider',
		),
	);

	function eut_page_options_add_custom_boxes() {

		if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
			return;
		}

		add_meta_box(
			'page_description',
			__( 'Page Options', 'corpus' ),
			'eut_page_options_box',
			'page'
		);

		add_meta_box(
			'page_feature_section',
			__( 'Feature Section', 'corpus' ),
			'eut_page_feature_section_box',
			'page'
		);
	}

	function eut_page_options_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_page_save_nonce' );

		$page_description = get_post_meta( $post->ID, 'eut_page_description', true );
		$page_layout = get_post_meta( $post->ID, 'eut_page_layout', true );
		$page_sidebar = get_post_meta( $post->ID, 'eut_page_sidebar', true );
		$fixed_sidebar = get_post_meta( $post->ID, 'eut_fixed_sidebar', true );
		$sidebar_style = get_post_meta( $post->ID, 'eut_sidebar_style', true );

		$page_navigation_menu = get_post_meta( $post->ID, 'eut_page_navigation_menu', true );
		$eut_main_navigation_menu = get_post_meta( $post->ID, 'eut_main_navigation_menu', true );
		$eut_main_navigation_menu_type = get_post_meta( $post->ID, 'eut_main_navigation_menu_type', true );
		$eut_sticky_header_type = get_post_meta( $post->ID, 'eut_sticky_header_type', true );

		$eut_disable_sticky = get_post_meta( $post->ID, 'eut_disable_sticky', true );
		$eut_disable_logo = get_post_meta( $post->ID, 'eut_disable_logo', true );
		$eut_disable_menu = get_post_meta( $post->ID, 'eut_disable_menu', true );
		$eut_disable_menu_items = get_post_meta( $post->ID, 'eut_disable_menu_items', true );
		$eut_disable_title = get_post_meta( $post->ID, 'eut_disable_title', true );
		$eut_disable_content = get_post_meta( $post->ID, 'eut_disable_content', true );
		$eut_disable_top_bar= get_post_meta( $post->ID, 'eut_disable_top_bar', true );
		$eut_disable_sidearea = get_post_meta( $post->ID, 'eut_disable_sidearea', true );
		$eut_disable_footer = get_post_meta( $post->ID, 'eut_disable_footer', true );
		$eut_disable_copyright = get_post_meta( $post->ID, 'eut_disable_copyright', true );

	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-page-description">
							<strong><?php esc_html_e( 'Description', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter your page description.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-page-description" class="eut-meta-text" name="eut_page_description" value="<?php echo esc_attr( $page_description ); ?>"/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-page-layout">
							<strong><?php esc_html_e( 'Layout', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select page content and sidebar alignment.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Page Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_layout_selection( $page_layout, 'eut-page-layout', 'eut_page_layout' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-page-sidebar">
							<strong><?php esc_html_e( 'Sidebar', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select page sidebar.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Page Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_sidebar_selection( $page_sidebar, 'eut-page-sidebar', 'eut_page_sidebar' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-sidebar-style">
							<strong><?php esc_html_e( 'Sidebar Style', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select sidebar style.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Page Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<select id="eut-sidebar-style" name="eut_sidebar_style">
							<option value="" <?php selected( '', $sidebar_style ); ?>><?php esc_html_e( 'Default', 'corpus' ); ?></option>
							<option value="simple" <?php selected( 'simple', $sidebar_style ); ?>><?php esc_html_e( 'Simple', 'corpus' ); ?></option>
							<option value="box" <?php selected( 'box', $sidebar_style ); ?>><?php esc_html_e( 'Box', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-fixed-sidebar">
							<strong><?php esc_html_e( 'Fixed Sidebar', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, sidebar will be fixed.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-fixed-sidebar" name="eut_fixed_sidebar" value="yes" <?php checked( $fixed_sidebar, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-page-navigation-menu">
							<strong><?php esc_html_e( 'Anchor Navigation Menu', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select page anchor navigation menu.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Only first level will be displayed.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_menu_selection( $page_navigation_menu, 'eut-page-navigation-menu', 'eut_page_navigation_menu' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-main-navigation-menu">
							<strong><?php esc_html_e( 'Main Navigation Menu', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select alternative main navigation menu.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default: Menus - Theme Locations - Header Menu.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_menu_selection( $eut_main_navigation_menu, 'eut-main-navigation-menu', 'eut_main_navigation_menu', 'default' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-main-navigation-menu-type">
							<strong><?php esc_html_e( 'Main Navigation Menu Type', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select main navigation menu type.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Header Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_menu_type_selection( $eut_main_navigation_menu_type, 'eut-main-navigation-menu-type', 'eut_main_navigation_menu_type' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-sticky-header-type">
							<strong><?php esc_html_e( 'Sticky Header Type', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select sticky header type.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Header Options - Sticky Header Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<select id="eut-sticky-header-type" name="eut_sticky_header_type">
							<option value="" <?php selected( '', $eut_sticky_header_type ); ?>><?php esc_html_e( 'Default', 'corpus' ); ?></option>
							<option value="simply" <?php selected( 'simply', $eut_sticky_header_type ); ?>><?php esc_html_e( 'Simple', 'corpus' ); ?></option>
							<option value="advanced" <?php selected( 'advanced', $eut_sticky_header_type ); ?>><?php esc_html_e( 'Advanced', 'corpus' ); ?></option>
							<option value="shrink" <?php selected( 'shrink', $eut_sticky_header_type ); ?>><?php esc_html_e( 'Shrink', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-sticky-header">
							<strong><?php esc_html_e( 'Disable Sticky Header', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, sticky header will be disabled.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-sticky-header" name="eut_disable_sticky" value="yes" <?php checked( $eut_disable_sticky, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-logo">
							<strong><?php esc_html_e( 'Disable Logo', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, logo will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-logo" name="eut_disable_logo" value="yes" <?php checked( $eut_disable_logo, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-menu">
							<strong><?php esc_html_e( 'Disable Main Menu', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, main menu will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-menu" name="eut_disable_menu" value="yes" <?php checked( $eut_disable_menu, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-menu-items">
							<strong><?php esc_html_e( 'Disable Main Menu Items', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, main menu items will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-menu-items" name="eut_disable_menu_items" value="yes" <?php checked( $eut_disable_menu_items, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-title">
							<strong><?php esc_html_e( 'Disable Title/Description', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, title and decription will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-title" name="eut_disable_title" value="yes" <?php checked( $eut_disable_title, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-top-bar">
							<strong><?php esc_html_e( 'Disable Top Bar', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, top bar will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-top-bar" name="eut_disable_top_bar" value="yes" <?php checked( $eut_disable_top_bar, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-content">
							<strong><?php esc_html_e( 'Disable Content Area', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, content area will be hidden (including sidebar and comments).', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-content" name="eut_disable_content" value="yes" <?php checked( $eut_disable_content, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-sidearea">
							<strong><?php esc_html_e( 'Disable Smart Button', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, Smart Button Side Area will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-sidearea" name="eut_disable_sidearea" value="yes" <?php checked( $eut_disable_sidearea, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-footer">
							<strong><?php esc_html_e( 'Disable Footer Widgets', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, footer widgets will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-footer" name="eut_disable_footer" value="yes" <?php checked( $eut_disable_footer, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-copyright">
							<strong><?php esc_html_e( 'Disable Footer Copyright', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, footer copyright area will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-copyright" name="eut_disable_copyright" value="yes" <?php checked( $eut_disable_copyright, 'yes' ); ?>/>
					</td>
				</tr>
			</tbody>
		</table>


	<?php
	}

	function eut_page_feature_section_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_page_feature_save_nonce' );

		$post_id = $post->ID;
		eut_admin_get_feature_section( $post_id );

	}

	function eut_page_options_save_postdata( $post_id , $post ) {
		global $eut_page_options;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! isset( $_POST['eut_page_save_nonce'] ) || !wp_verify_nonce( $_POST['eut_page_save_nonce'], 'eut_nonce_save' ) ) {
			return;
		}

		// Check permissions
		if ( 'page' == $_POST['post_type'] )
		{
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		}

		foreach ( $eut_page_options as $value ) {
			$new_meta_value = ( isset( $_POST[$value['id']] ) ? $_POST[$value['id']] : '' );
			$meta_key = $value['id'];


			$meta_value = get_post_meta( $post_id, $meta_key, true );

			if ( $new_meta_value && '' == $meta_value ) {
				add_post_meta( $post_id, $meta_key, $new_meta_value, true );
			} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
				update_post_meta( $post_id, $meta_key, $new_meta_value );
			} elseif ( '' == $new_meta_value && $meta_value ) {
				delete_post_meta( $post_id, $meta_key, $meta_value );
			}
		}

		if ( isset( $_POST['eut_page_feature_save_nonce'] ) && wp_verify_nonce( $_POST['eut_page_feature_save_nonce'], 'eut_nonce_save' ) ) {

			eut_admin_save_feature_section( $post_id );

		}

	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
