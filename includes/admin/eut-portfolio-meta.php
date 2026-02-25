<?php
/*
*	Euthemians Portfolio Items
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

	add_action( 'add_meta_boxes', 'eut_portfolio_options_add_custom_boxes' );
	add_action( 'save_post', 'eut_portfolio_options_save_postdata', 10, 2 );

	$eut_portfolio_options = array (
		array(
			'name' => 'Description',
			'id' => 'eut_portfolio_description',
		),
		array(
			'name' => 'Layout',
			'id' => 'eut_portfolio_layout',
		),
		array(
			'name' => 'Sidebar',
			'id' => 'eut_portfolio_sidebar',
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
			'name' => 'Details Title',
			'id' => 'eut_portfolio_details_title',
		),
		array(
			'name' => 'Details',
			'id' => 'eut_portfolio_details',
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
			'name' => 'Disable Recent',
			'id' => 'eut_disable_portfolio_recent',
		),
		array(
			'name' => 'Disable Social Bar',
			'id' => 'eut_disable_social_bar',
		),		
		array(
			'name' => 'Disable Comments',
			'id' => 'eut_disable_comments',
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
		//Media
		array(
			'name' => 'Media Selection',
			'id' => 'eut_portfolio_media_selection',
		),
		array(
			'name' => 'Media Image Mode',
			'id' => 'eut_portfolio_media_image_mode',
		),
		array(
			'name' => 'Masonry Size',
			'id' => 'eut_portfolio_media_masonry_size',
		),
		array(
			'name' => 'Video webm format',
			'id' => 'eut_portfolio_video_webm',
		),
		array(
			'name' => 'Video mp4 format',
			'id' => 'eut_portfolio_video_mp4',
		),
		array(
			'name' => 'Video ogv format',
			'id' => 'eut_portfolio_video_ogv',
		),
		array(
			'name' => 'Video Poster',
			'id' => 'eut_portfolio_video_poster',
		),		
		array(
			'name' => 'Video embed Vimeo/Youtube',
			'id' => 'eut_portfolio_video_embed',
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
		//Link Mode
		array(
			'name' => 'Link Mode',
			'id' => 'eut_portfolio_link_mode',
		),
		array(
			'name' => 'Link URL',
			'id' => 'eut_portfolio_link_url',
		),
		array(
			'name' => 'Open Link in a new window',
			'id' => 'eut_portfolio_link_new_window',
		),
		array(
			'name' => 'Link Extra Class',
			'id' => 'eut_portfolio_link_extra_class',
		),
	);

	function eut_portfolio_options_add_custom_boxes() {

		if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
			return;
		}
		
		add_meta_box(
			'portfolio_options',
			__( 'Portfolio Options', 'corpus' ),
			'eut_portfolio_options_box',
			'portfolio'
		);
		add_meta_box(
			'portfolio_link_mode',
			__( 'Portfolio Link Options', 'corpus' ),
			'eut_portfolio_link_mode_box',
			'portfolio'
		);
		add_meta_box(
			'portfolio_media_section',
			__( 'Portfolio Media', 'corpus' ),
			'eut_portfolio_media_section_box',
			'portfolio'
		);
		add_meta_box(
			'portfolio_feature_section',
			__( 'Feature Section', 'corpus' ),
			'eut_portfolio_feature_section_box',
			'portfolio'
		);

	}

	function eut_portfolio_link_mode_box( $post ) {

		$link_mode = get_post_meta( $post->ID, 'eut_portfolio_link_mode', true );
		$link_url = get_post_meta( $post->ID, 'eut_portfolio_link_url', true );
		$new_window = get_post_meta( $post->ID, 'eut_portfolio_link_new_window', true );
		$link_class = get_post_meta( $post->ID, 'eut_portfolio_link_extra_class', true );
	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Select link mode for Portfolio Overview (Used in Portfolio Element Link Type: Custom Link).', 'corpus' ); ?></p>
					</td>
				</tr>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-portfolio-link-mode">
							<strong><?php esc_html_e( 'Link Mode', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select Link Mode', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select id="eut-portfolio-link-mode" name="eut_portfolio_link_mode">
							<option value="" <?php selected( '', $link_mode ); ?>><?php esc_html_e( 'Portfolio Item', 'corpus' ); ?></option>
							<option value="link" <?php selected( 'link', $link_mode ); ?>><?php esc_html_e( 'Custom Link', 'corpus' ); ?></option>
							<option value="none" <?php selected( 'none', $link_mode ); ?>><?php esc_html_e( 'None', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr class="eut-portfolio-custom-link-mode" <?php if ( "link" != $link_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-portfolio-link-url">
							<strong><?php esc_html_e( 'Link URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter the full URL of your link.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-portfolio-link-url" class="eut-meta-text" name="eut_portfolio_link_url" value="<?php echo esc_attr( $link_url ); ?>" />
					</td>
				</tr>
				<tr class="eut-portfolio-custom-link-mode" <?php if ( "link" != $link_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-portfolio-link-new-window">
							<strong><?php esc_html_e( 'Open Link in new window', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, link will open in a new window.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-portfolio-link-new-window" name="eut_portfolio_link_new_window" value="yes" <?php checked( $new_window, 'yes' ); ?>/>
					</td>
				</tr>
				<tr class="eut-portfolio-custom-link-mode" <?php if ( "link" != $link_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-portfolio-link-extra-class">
							<strong><?php esc_html_e( 'Link extra class name', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<input type="text" id="eut-portfolio-link-extra-class" class="eut-meta-text" name="eut_portfolio_link_extra_class" value="<?php echo esc_attr( $link_class ); ?>" />
					</td>
				</tr>
			</tbody>
		</table>


	<?php

	}
	function eut_portfolio_options_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_portfolio_save_nonce' );

		$portfolio_description = get_post_meta( $post->ID, 'eut_portfolio_description', true );
		$portfolio_details_title = get_post_meta( $post->ID, 'eut_portfolio_details_title', true );
		$portfolio_details = get_post_meta( $post->ID, 'eut_portfolio_details', true );
		$portfolio_layout = get_post_meta( $post->ID, 'eut_portfolio_layout', true );
		$portfolio_sidebar = get_post_meta( $post->ID, 'eut_portfolio_sidebar', true );
		$fixed_sidebar = get_post_meta( $post->ID, 'eut_fixed_sidebar', true );
		$sidebar_style = get_post_meta( $post->ID, 'eut_sidebar_style', true );

		$eut_main_navigation_menu = get_post_meta( $post->ID, 'eut_main_navigation_menu', true );
		$eut_main_navigation_menu_type = get_post_meta( $post->ID, 'eut_main_navigation_menu_type', true );
		$eut_sticky_header_type = get_post_meta( $post->ID, 'eut_sticky_header_type', true );

		$eut_disable_sticky = get_post_meta( $post->ID, 'eut_disable_sticky', true );
		$eut_disable_logo = get_post_meta( $post->ID, 'eut_disable_logo', true );
		$eut_disable_menu = get_post_meta( $post->ID, 'eut_disable_menu', true );
		$eut_disable_menu_items = get_post_meta( $post->ID, 'eut_disable_menu_items', true );
		$eut_disable_title = get_post_meta( $post->ID, 'eut_disable_title', true );
		$eut_disable_top_bar = get_post_meta( $post->ID, 'eut_disable_top_bar', true );
		$eut_disable_social_bar = get_post_meta( $post->ID, 'eut_disable_social_bar', true );
		$eut_disable_portfolio_recent = get_post_meta( $post->ID, 'eut_disable_portfolio_recent', true );
		$eut_disable_comments = get_post_meta( $post->ID, 'eut_disable_comments', true );
		$eut_disable_sidearea = get_post_meta( $post->ID, 'eut_disable_sidearea', true );
		$eut_disable_footer = get_post_meta( $post->ID, 'eut_disable_footer', true );
		$eut_disable_copyright = get_post_meta( $post->ID, 'eut_disable_copyright', true );

	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-portfolio-description">
							<strong><?php esc_html_e( 'Description', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter your portfolio description.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-portfolio-description" class="eut-meta-text" name="eut_portfolio_description" value="<?php echo esc_attr( $portfolio_description ); ?>"/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-portfolio-details-title">
							<strong><?php esc_html_e( 'Project Details Title', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter your project details title.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'If empty, text is configured from: Theme Options - Portfolio Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-portfolio-details-title" class="eut-meta-text" name="eut_portfolio_details_title" value="<?php echo esc_attr( $portfolio_details_title ); ?>"/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-portfolio-details">
							<strong><?php esc_html_e( 'Project Details', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter your project details.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<textarea id="eut-portfolio-details" name="eut_portfolio_details" cols="40" rows="5"><?php echo esc_html( $portfolio_details ); ?></textarea>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-portfolio-layout">
							<strong><?php esc_html_e( 'Layout', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select portfolio content and sidebar alignment.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Portfolio Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_layout_selection( $portfolio_layout, 'eut-portfolio-layout', 'eut_portfolio_layout' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-portfolio-sidebar">
							<strong><?php esc_html_e( 'Sidebar', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select portfolio sidebar.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Portfolio Options.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_sidebar_selection( $portfolio_sidebar, 'eut-portfolio-sidebar', 'eut_portfolio_sidebar' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-sidebar-style">
							<strong><?php esc_html_e( 'Sidebar Style', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select sidebar style.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Portfolio Options.', 'corpus' ); ?></strong>
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
						<label for="eut-disable-social-bar">
							<strong><?php esc_html_e( 'Disable Social Bar', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, social bar will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-social-bar" name="eut_disable_social_bar" value="yes" <?php checked( $eut_disable_social_bar, 'yes' ); ?>/>
					</td>
				</tr>				
				<tr>
					<th>
						<label for="eut-disable-portfolio-recent">
							<strong><?php esc_html_e( 'Disable Recent Entries', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, recent entries will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-portfolio-recent" name="eut_disable_portfolio_recent" value="yes" <?php checked( $eut_disable_portfolio_recent, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-comments">
							<strong><?php esc_html_e( 'Disable Comments', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, comments will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-comments" name="eut_disable_comments" value="yes" <?php checked( $eut_disable_comments, 'yes' ); ?>/>
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

	function eut_portfolio_media_section_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_portfolio_media_save_nonce' );

		$portfolio_masonry_size = get_post_meta( $post->ID, 'eut_portfolio_media_masonry_size', true );
		$portfolio_media = get_post_meta( $post->ID, 'eut_portfolio_media_selection', true );
		$portfolio_image_mode = get_post_meta( $post->ID, 'eut_portfolio_media_image_mode', true );

		$eut_portfolio_video_webm = get_post_meta( $post->ID, 'eut_portfolio_video_webm', true );
		$eut_portfolio_video_mp4 = get_post_meta( $post->ID, 'eut_portfolio_video_mp4', true );
		$eut_portfolio_video_ogv = get_post_meta( $post->ID, 'eut_portfolio_video_ogv', true );
		$eut_portfolio_video_poster = get_post_meta( $post->ID, 'eut_portfolio_video_poster', true );
		$eut_portfolio_video_embed = get_post_meta( $post->ID, 'eut_portfolio_video_embed', true );

		$media_slider_items = get_post_meta( $post->ID, 'eut_portfolio_slider_items', true );
		$media_slider_settings = get_post_meta( $post->ID, 'eut_portfolio_slider_settings', true );
		$media_slider_speed = eut_array_value( $media_slider_settings, 'slideshow_speed', '3500' );
		$media_slider_dir_nav = eut_array_value( $media_slider_settings, 'direction_nav', '2' );

	?>
			<table class="form-table eut-metabox">
				<tbody>
					<tr>
						<th>
							<label for="eut-portfolio-media-masonry-size">
								<strong><?php esc_html_e( 'Masonry Size', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Select your masonry image size.', 'corpus' ); ?>
									<br/>
									<strong><?php esc_html_e( 'Used in Portfolio Element with style Masonry.', 'corpus' ); ?></strong>
								</span>
							</label>
						</th>
						<td>
							<select id="eut-portfolio-media-masonry-size" name="eut_portfolio_media_masonry_size">
								<option value="square" <?php selected( 'square', $portfolio_masonry_size ); ?>><?php esc_html_e( 'Square', 'corpus' ); ?></option>
								<option value="large-square" <?php selected( 'large-square', $portfolio_masonry_size ); ?>><?php esc_html_e( 'Large Square', 'corpus' ); ?></option>
								<option value="landscape" <?php selected( 'landscape', $portfolio_masonry_size ); ?>><?php esc_html_e( 'Landscape', 'corpus' ); ?></option>
								<option value="portrait" <?php selected( 'portrait', $portfolio_masonry_size ); ?>><?php esc_html_e( 'Portrait', 'corpus' ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="eut-portfolio-media-selection">
								<strong><?php esc_html_e( 'Media Selection', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Choose your portfolio media.', 'corpus' ); ?>
									<br/>
									<strong><?php esc_html_e( 'In overview only Featured Image is displayed.', 'corpus' ); ?></strong>
								</span>
							</label>
						</th>
						<td>
							<select id="eut-portfolio-media-selection" name="eut_portfolio_media_selection">
								<option value="" <?php selected( "", $portfolio_media ); ?>><?php esc_html_e( 'Featured Image', 'corpus' ); ?></option>
								<option value="gallery" <?php selected( "gallery", $portfolio_media ); ?>><?php esc_html_e( 'Classic Gallery', 'corpus' ); ?></option>
								<option value="gallery-vertical" <?php selected( "gallery-vertical", $portfolio_media ); ?>><?php esc_html_e( 'Vertical Gallery', 'corpus' ); ?></option>
								<option value="slider" <?php selected( "slider", $portfolio_media ); ?>><?php esc_html_e( 'Slider', 'corpus' ); ?></option>
								<option value="video" <?php selected( "video", $portfolio_media ); ?>><?php esc_html_e( 'YouTube/Vimeo Video', 'corpus' ); ?></option>
								<option value="video-html5" <?php selected( "video-html5", $portfolio_media ); ?>><?php esc_html_e( 'HMTL5 Video', 'corpus' ); ?></option>
								<option value="none" <?php selected( "none", $portfolio_media ); ?>><?php esc_html_e( 'None', 'corpus' ); ?></option>
							</select>
						</td>
					</tr>
					<tr class="eut-portfolio-media-item eut-portfolio-video-html5"<?php if ( "video-html5" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-portfolio-video-webm">
								<strong><?php esc_html_e( 'WebM File URL', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Upload the .webm video file.', 'corpus' ); ?>
									<br/>
									<strong><?php esc_html_e( 'This Format must be included for HTML5 Video.', 'corpus' ); ?></strong>
								</span>
							</label>
						</th>
						<td>
							<input type="text" id="eut-portfolio-video-webm" class="eut-upload-simple-media-field eut-meta-text" name="eut_portfolio_video_webm" value="<?php echo esc_attr( $eut_portfolio_video_webm ); ?>"/>
							<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
							<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
						</td>
					</tr>
					<tr class="eut-portfolio-media-item eut-portfolio-video-html5"<?php if ( "video-html5" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-portfolio-video-mp4">
								<strong><?php esc_html_e( 'MP4 File URL', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Upload the .mp4 video file.', 'corpus' ); ?>
									<br/>
									<strong><?php esc_html_e( 'This Format must be included for HTML5 Video.', 'corpus' ); ?></strong>
								</span>
							</label>
						</th>
						<td>
							<input type="text" id="eut-portfolio-video-mp4" class="eut-upload-simple-media-field eut-meta-text" name="eut_portfolio_video_mp4" value="<?php echo esc_attr( $eut_portfolio_video_mp4 ); ?>"/>
							<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
							<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
						</td>
					</tr>
					<tr class="eut-portfolio-media-item eut-portfolio-video-html5"<?php if ( "video-html5" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-portfolio-video-ogv">
								<strong><?php esc_html_e( 'OGV File URL', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Upload the .ogv video file (optional).', 'corpus' ); ?>
								</span>
							</label>
						</th>
						<td>
							<input type="text" id="eut-portfolio-video-ogv" class="eut-upload-simple-media-field eut-meta-text" name="eut_portfolio_video_ogv" value="<?php echo esc_attr( $eut_portfolio_video_ogv ); ?>"/>
							<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
							<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
						</td>
					</tr>
					<tr class="eut-portfolio-media-item eut-portfolio-video-html5"<?php if ( "video-html5" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-portfolio-video-poster">
								<strong><?php esc_html_e( 'Poster Image', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Use same resolution as video.', 'corpus' ); ?>
								</span>
							</label>
						</th>
						<td>
							<input type="text" id="eut-portfolio-video-poster" class="eut-upload-simple-media-field eut-meta-text" name="eut_portfolio_video_poster" value="<?php echo esc_attr( $eut_portfolio_video_poster ); ?>"/>
							<input type="button" data-media-type="image" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
							<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
						</td>
					</tr>					
					<tr class="eut-portfolio-media-item eut-portfolio-video-embed"<?php if ( "video" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-portfolio-video-embed">
								<strong><?php esc_html_e( 'Vimeo/YouTube URL', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Enter the full URL of your video from Vimeo or YouTube.', 'corpus' ); ?>
								</span>
							</label>
						</th>
						<td>
							<input type="text" id="eut-portfolio-video-embed" class="eut-meta-text" name="eut_portfolio_video_embed" value="<?php echo esc_attr( $eut_portfolio_video_embed ); ?>"/>
						</td>
					</tr>
					<tr class="eut-portfolio-media-item eut-portfolio-media-image-mode"<?php if ( "slider" != $portfolio_media || "gallery-vertical" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-portfolio-media-image-mode">
								<strong><?php esc_html_e( 'Image Mode', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Select image mode.', 'corpus' ); ?>
								</span>
							</label>
						</th>
						<td>
							<select id="eut-portfolio-media-image-mode" name="eut_portfolio_media_image_mode">
								<option value="" <?php selected( '', $portfolio_image_mode ); ?>><?php esc_html_e( 'Auto Crop', 'corpus' ); ?></option>
								<option value="resize" <?php selected( 'resize', $portfolio_image_mode ); ?>><?php esc_html_e( 'Resize', 'corpus' ); ?></option>
							</select>
						</td>
					</tr>
					<tr id="eut-portfolio-media-slider-speed" class="eut-portfolio-media-item" <?php if ( "slider" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-page-slider-speed">
								<strong><?php esc_html_e( 'Slideshow Speed', 'corpus' ); ?></strong>
							</label>
						</th>
						<td>
							<input type="text" id="eut-page-slider-speed" name="eut_portfolio_slider_settings_speed" value="<?php echo esc_attr( $media_slider_speed ); ?>" /> ms
						</td>
					</tr>
					<tr id="eut-portfolio-media-slider-direction-nav" class="eut-portfolio-media-item" <?php if ( "slider" != $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-page-slider-direction-nav">
								<strong><?php esc_html_e( 'Navigation Buttons', 'corpus' ); ?></strong>
							</label>
						</th>
						<td>
							<select name="eut_portfolio_slider_settings_direction_nav">
								<option value="1" <?php selected( "1", $media_slider_dir_nav ); ?>>
									<?php esc_html_e( 'Style 1', 'corpus' ); ?>
								</option>
								<option value="2" <?php selected( "2", $media_slider_dir_nav ); ?>>
									<?php esc_html_e( 'Style 2', 'corpus' ); ?>
								</option>
								<option value="3" <?php selected( "3", $media_slider_dir_nav ); ?>>
									<?php esc_html_e( 'Style 3', 'corpus' ); ?>
								</option>
								<option value="4" <?php selected( "4", $media_slider_dir_nav ); ?>>
									<?php esc_html_e( 'Style 4', 'corpus' ); ?>
								</option>
								<option value="0" <?php selected( "0", $media_slider_dir_nav ); ?>>
									<?php esc_html_e( 'No Navigation', 'corpus' ); ?>
								</option>
							</select>
						</td>
					</tr>
					<tr id="eut-portfolio-media-slider" class="eut-portfolio-media-item" <?php if ( "" == $portfolio_media || "none" == $portfolio_media ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label><?php esc_html_e( 'Media Items', 'corpus' ); ?></label>
						</th>
						<td>
							<input type="button" class="eut-upload-slider-button button-primary" value="<?php esc_attr_e( 'Insert Images', 'corpus' ); ?>"/>
							<span id="eut-upload-slider-button-spinner" class="eut-action-spinner"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div id="eut-slider-container" data-mode="minimal" class="eut-portfolio-media-item" <?php if ( "" == $portfolio_media || "none" == $portfolio_media ) { ?> style="display:none;" <?php } ?>>
				<?php
					if( !empty( $media_slider_items ) ) {
						eut_print_admin_media_slider_items( $media_slider_items );
					}
				?>
			</div>


	<?php
	}

	function eut_portfolio_feature_section_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_portfolio_feature_save_nonce' );

		$post_id = $post->ID;
		eut_admin_get_feature_section( $post_id );

	}

	function eut_portfolio_options_save_postdata( $post_id , $post ) {
		global $eut_portfolio_options;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! isset( $_POST['eut_portfolio_save_nonce'] ) || !wp_verify_nonce( $_POST['eut_portfolio_save_nonce'], 'eut_nonce_save' ) ) {
			return;
		}

		// Check permissions
		if ( 'portfolio' == $_POST['post_type'] )
		{
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		}

		foreach ( $eut_portfolio_options as $value ) {
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

		if ( isset( $_POST['eut_portfolio_media_save_nonce'] ) && wp_verify_nonce( $_POST['eut_portfolio_media_save_nonce'], 'eut_nonce_save' ) ) {


			//Media Slider Items
			$media_slider_items = array();
			if ( isset( $_POST['eut_media_slider_item_id'] ) ) {

				$num_of_images = sizeof( $_POST['eut_media_slider_item_id'] );
				for ( $i=0; $i < $num_of_images; $i++ ) {

					$this_image = array (
						'id' => $_POST['eut_media_slider_item_id'][ $i ],
					);
					array_push( $media_slider_items, $this_image );
				}

			}

			if( empty( $media_slider_items ) ) {
				delete_post_meta( $post->ID, 'eut_portfolio_slider_items' );
				delete_post_meta( $post->ID, 'eut_portfolio_slider_settings' );
			} else{
				update_post_meta( $post->ID, 'eut_portfolio_slider_items', $media_slider_items );

				$media_slider_speed = 3500;
				$media_slider_direction_nav = 'yes';
				if ( isset( $_POST['eut_portfolio_slider_settings_speed'] ) ) {
					$media_slider_speed = $_POST['eut_portfolio_slider_settings_speed'];
				}
				if ( isset( $_POST['eut_portfolio_slider_settings_direction_nav'] ) ) {
					$media_slider_direction_nav = $_POST['eut_portfolio_slider_settings_direction_nav'];
				}
				$media_slider_settings = array (
					'slideshow_speed' => $media_slider_speed,
					'direction_nav' => $media_slider_direction_nav,
				);
				update_post_meta( $post->ID, 'eut_portfolio_slider_settings', $media_slider_settings );
			}

		}

		if ( isset( $_POST['eut_portfolio_feature_save_nonce'] ) && wp_verify_nonce( $_POST['eut_portfolio_feature_save_nonce'], 'eut_nonce_save' ) ) {

			eut_admin_save_feature_section( $post_id );

		}

	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
