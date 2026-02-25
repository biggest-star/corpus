<?php
/*
*	Euthemians Post Items
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

	add_action( 'add_meta_boxes', 'eut_post_options_add_custom_boxes' );
	add_action( 'save_post', 'eut_post_options_save_postdata', 10, 2 );

	$eut_post_options = array (

		array(
			'name' => 'Post Layout',
			'id' => 'eut_post_layout',
		),
		array(
			'name' => 'Post Sidebar',
			'id' => 'eut_post_sidebar',
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
			'name' => 'Disable Title',
			'id' => 'eut_disable_title',
		),
		array(
			'name' => 'Disable Meta Fields',
			'id' => 'eut_disable_meta_fields',
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
			'name' => 'Disable Media Area',
			'id' => 'eut_disable_media',
		),

		//Gallery Format
		array(
			'name' => 'Media Mode',
			'id' => 'eut_post_type_gallery_mode',
		),
		array(
			'name' => 'Media Image Mode',
			'id' => 'eut_post_type_gallery_image_mode',
		),
		//Link Format
		array(
			'name' => 'Link URL',
			'id' => 'eut_post_link_url',
		),
		array(
			'name' => 'Open Link in a new window',
			'id' => 'eut_post_link_new_window',
		),
		//Audio Format
		array(
			'name' => 'Audio mode',
			'id' => 'eut_post_type_audio_mode',
		),
		array(
			'name' => 'Audio mp3 format',
			'id' => 'eut_post_audio_mp3',
		),
		array(
			'name' => 'Audio ogg format',
			'id' => 'eut_post_audio_ogg',
		),
		array(
			'name' => 'Audio wav format',
			'id' => 'eut_post_audio_wav',
		),
		array(
			'name' => 'Audio embed',
			'id' => 'eut_post_audio_embed',
		),
		//Video Format
		array(
			'name' => 'Video Mode',
			'id' => 'eut_post_type_video_mode',
		),
		array(
			'name' => 'Video webm format',
			'id' => 'eut_post_video_webm',
		),
		array(
			'name' => 'Video mp4 format',
			'id' => 'eut_post_video_mp4',
		),
		array(
			'name' => 'Video ogv format',
			'id' => 'eut_post_video_ogv',
		),
		array(
			'name' => 'Video Poster',
			'id' => 'eut_post_video_poster',
		),		
		array(
			'name' => 'Video embed Vimeo/Youtube',
			'id' => 'eut_post_video_embed',
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

	function eut_post_options_add_custom_boxes() {

		if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
			return;
		}
		
		add_meta_box(
			'eut-meta-box-post-format-gallery',
			__( 'Gallery Format Options', 'corpus' ),
			'eut_meta_box_post_format_gallery',
			'post'
		);
		add_meta_box(
			'eut-meta-box-post-format-link',
			__( 'Link Format Options', 'corpus' ),
			'eut_meta_box_post_format_link',
			'post'
		);
		add_meta_box(
			'eut-meta-box-post-format-quote',
			__( 'Quote Format Options', 'corpus' ),
			'eut_meta_box_post_format_quote',
			'post'
		);
		add_meta_box(
			'eut-meta-box-post-format-video',
			__( 'Video Format Options', 'corpus' ),
			'eut_meta_box_post_format_video',
			'post'
		);
		add_meta_box(
			'eut-meta-box-post-format-audio',
			__( 'Audio Format Options', 'corpus' ),
			'eut_meta_box_post_format_audio',
			'post'
		);

		add_meta_box(
			'eut-meta-box-post-options',
			__( 'Post Options', 'corpus' ),
			'eut_post_options_box',
			'post'
		);

		add_meta_box(
			'post_feature_section',
			__( 'Feature Section', 'corpus' ),
			'eut_post_feature_section_box',
			'post'
		);


	}

	function eut_post_options_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_post_save_nonce' );

		$post_layout = get_post_meta( $post->ID, 'eut_post_layout', true );
		$post_sidebar = get_post_meta( $post->ID, 'eut_post_sidebar', true );
		$fixed_sidebar = get_post_meta( $post->ID, 'eut_fixed_sidebar', true );
		$eut_disable_title = get_post_meta( $post->ID, 'eut_disable_title', true );
		$eut_disable_meta_fields = get_post_meta( $post->ID, 'eut_disable_meta_fields', true );
		$eut_disable_media = get_post_meta( $post->ID, 'eut_disable_media', true );
		$sidebar_style = get_post_meta( $post->ID, 'eut_sidebar_style', true );
		$eut_disable_sidearea = get_post_meta( $post->ID, 'eut_disable_sidearea', true );
		$eut_disable_footer = get_post_meta( $post->ID, 'eut_disable_footer', true );

		$eut_post_title_bg = get_post_meta( $post->ID, 'eut_post_title_bg', true );
		$eut_post_title_bg_mode = eut_array_value( $eut_post_title_bg, 'mode' );
		$eut_post_title_bg_image = eut_array_value( $eut_post_title_bg, 'image' );
		$eut_post_title_bg_position = eut_array_value( $eut_post_title_bg, 'position', 'center-center' );
		$eut_post_title_bg_height = eut_array_value( $eut_post_title_bg, 'height', '350' );

	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr>
					<th>
						<label for="eut-post-layout">
							<strong><?php esc_html_e( 'Layout', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select post content and sidebar alignment.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Blog Options - Single Post.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_layout_selection( $post_layout, 'eut-post-layout', 'eut_post_layout' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-post-sidebar">
							<strong><?php esc_html_e( 'Sidebar', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select post sidebar.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Blog Options - Single Post.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_sidebar_selection( $post_sidebar, 'eut-post-sidebar', 'eut_post_sidebar' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-sidebar-style">
							<strong><?php esc_html_e( 'Sidebar Style', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select sidebar style.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - Blog Options - Single Post.', 'corpus' ); ?></strong>
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
						<label for="eut-disable-title">
							<strong><?php esc_html_e( 'Disable Title', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, title will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-title" name="eut_disable_title" value="yes" <?php checked( $eut_disable_title, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-meta-fields">
							<strong><?php esc_html_e( 'Disable Meta Fields', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, meta fields will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-meta-fields" name="eut_disable_meta_fields" value="yes" <?php checked( $eut_disable_meta_fields, 'yes' ); ?>/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-disable-media">
							<strong><?php esc_html_e( 'Disable Media Area', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, media area will be hidden in single post.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-media" name="eut_disable_media" value="yes" <?php checked( $eut_disable_media, 'yes' ); ?>/>
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
			</tbody>
		</table>


	<?php
	}


	function eut_meta_box_post_format_gallery( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_post_format_gallery_save_nonce' );
		$gallery_mode = get_post_meta( $post->ID, 'eut_post_type_gallery_mode', true );
		$gallery_image_mode = get_post_meta( $post->ID, 'eut_post_type_gallery_image_mode', true );

		$slider_items = get_post_meta( $post->ID, 'eut_post_slider_items', true );
		$media_slider_settings = get_post_meta( $post->ID, 'eut_post_slider_settings', true );
		$media_slider_speed = eut_array_value( $media_slider_settings, 'slideshow_speed', '3500' );
		$media_slider_dir_nav = eut_array_value( $media_slider_settings, 'direction_nav', '2' );

	?>
			<table class="form-table eut-metabox">
				<tbody>
					<tr class="eut-border-bottom">
						<th>
							<label for="eut-post-gallery-mode">
								<strong><?php esc_html_e( 'Gallery Mode', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Select Gallery mode.', 'corpus' ); ?>
								</span>
							</label>
						</th>
						<td>
							<select id="eut-post-gallery-mode" name="eut_post_type_gallery_mode">
								<option value="" <?php selected( '', $gallery_mode ); ?>><?php esc_html_e( 'Gallery', 'corpus' ); ?></option>
								<option value="slider" <?php selected( 'slider', $gallery_mode ); ?>><?php esc_html_e( 'Slider', 'corpus' ); ?></option>
							</select>
						</td>
					</tr>
					<tr id="eut-post-gallery-image-mode-section" class="eut-post-media-item" <?php if ( "" == $gallery_mode ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-post-gallery-image-mode">
								<strong><?php esc_html_e( 'Image Mode', 'corpus' ); ?></strong>
								<span>
									<?php esc_html_e( 'Select image mode.', 'corpus' ); ?>
								</span>
							</label>
						</th>
						<td>
							<select id="eut-post-gallery-image-mode" name="eut_post_type_gallery_image_mode">
								<option value="" <?php selected( '', $gallery_image_mode ); ?>><?php esc_html_e( 'Auto Crop', 'corpus' ); ?></option>
								<option value="resize" <?php selected( 'resize', $gallery_image_mode ); ?>><?php esc_html_e( 'Resize', 'corpus' ); ?></option>
							</select>
						</td>
					</tr>
					<tr id="eut-post-media-slider-speed" class="eut-post-media-item" <?php if ( "" == $gallery_mode ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-post-slider-speed">
								<strong><?php esc_html_e( 'Slideshow Speed', 'corpus' ); ?></strong>
							</label>
						</th>
						<td>
							<input type="text" id="eut-post-slider-speed" name="eut_post_slider_settings_speed" value="<?php echo esc_attr( $media_slider_speed ); ?>" /> ms
						</td>
					</tr>
					<tr id="eut-post-media-slider-direction-nav" class="eut-post-media-item" <?php if ( "" == $gallery_mode ) { ?> style="display:none;" <?php } ?>>
						<th>
							<label for="eut-post-slider-direction-nav">
								<strong><?php esc_html_e( 'Navigation Buttons', 'corpus' ); ?></strong>
							</label>
						</th>
						<td>
							<select id="eut-post-slider-direction-nav" name="eut_post_slider_settings_direction_nav">
								<option value="1" <?php selected( "1", $media_slider_dir_nav ); ?>><?php esc_html_e( 'Style 1', 'corpus' ); ?></option>
								<option value="2" <?php selected( "2", $media_slider_dir_nav ); ?>><?php esc_html_e( 'Style 2', 'corpus' ); ?></option>
								<option value="3" <?php selected( "3", $media_slider_dir_nav ); ?>><?php esc_html_e( 'Style 3', 'corpus' ); ?></option>
								<option value="4" <?php selected( "4", $media_slider_dir_nav ); ?>><?php esc_html_e( 'Style 4', 'corpus' ); ?></option>
								<option value="0" <?php selected( "0", $media_slider_dir_nav ); ?>><?php esc_html_e( 'No Navigation', 'corpus' ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label><?php esc_html_e( 'Images', 'corpus' ); ?></label>
						</th>
						<td>
							<input type="button" class="eut-upload-slider-button button-primary" value="<?php esc_attr_e( 'Insert Images to Gallery/Slider', 'corpus' ); ?>"/>
							<span id="eut-upload-slider-button-spinner" class="eut-action-spinner"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div id="eut-slider-container" class="eut-slider-container-minimal" data-mode="minimal">
				<?php
					if( !empty( $slider_items ) ) {
						eut_print_admin_media_slider_items( $slider_items );
					}
				?>
			</div>
	<?php
	}


	function eut_meta_box_post_format_link( $post ) {
		$link_url = get_post_meta( $post->ID, 'eut_post_link_url', true );
		$new_window = get_post_meta( $post->ID, 'eut_post_link_new_window', true );
	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Add your text in the content area. The text will be wrapped with a link.', 'corpus' ); ?></p>
					</td>
				</tr>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-post-link-url">
							<strong><?php esc_html_e( 'Link URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter the full URL of your link.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-link-url" class="eut-meta-text" name="eut_post_link_url" value="<?php echo esc_attr( $link_url ); ?>" />
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-post-link-new-window">
							<strong><?php esc_html_e( 'Open Link in new window', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, link will open in a new window.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-post-link-new-window" name="eut_post_link_new_window" value="yes" <?php checked( $new_window, 'yes' ); ?>/>
					</td>
				</tr>
			</tbody>
		</table>


	<?php
	}

	function eut_meta_box_post_format_quote( $post ) {
	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Simply add some text in the content area. This text will automatically displayed as quote.', 'corpus' ); ?></p>
					</td>
				</tr>
			</tbody>
		</table>

	<?php
	}

	function eut_meta_box_post_format_video( $post ) {

		$video_mode = get_post_meta( $post->ID, 'eut_post_type_video_mode', true );
		$eut_post_video_webm = get_post_meta( $post->ID, 'eut_post_video_webm', true );
		$eut_post_video_mp4 = get_post_meta( $post->ID, 'eut_post_video_mp4', true );
		$eut_post_video_ogv = get_post_meta( $post->ID, 'eut_post_video_ogv', true );
		$eut_post_video_poster = get_post_meta( $post->ID, 'eut_post_video_poster', true );
		$eut_post_video_embed = get_post_meta( $post->ID, 'eut_post_video_embed', true );

	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Select one of the choices below for the featured video.', 'corpus' ); ?></p>
					</td>
				</tr>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-post-type-video-mode">
							<strong><?php esc_html_e( 'Video Mode', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select your Video Mode', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select id="eut-post-type-video-mode" name="eut_post_type_video_mode">
							<option value="" <?php selected( "", $video_mode ); ?>><?php esc_html_e( 'YouTube/Vimeo Video', 'corpus' ); ?></option>
							<option value="html5" <?php selected( "html5", $video_mode ); ?>><?php esc_html_e( 'HTML5 Video', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr class="eut-post-video-html5"<?php if ( "" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-video-webm">
							<strong><?php esc_html_e( 'WebM File URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .webm video file.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'This Format must be included for HTML5 Video.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-video-webm" class="eut-upload-simple-media-field eut-meta-text" name="eut_post_video_webm" value="<?php echo esc_attr( $eut_post_video_webm ); ?>"/>
						<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</td>
				</tr>
				<tr class="eut-post-video-html5"<?php if ( "" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-video-mp4">
							<strong><?php esc_html_e( 'MP4 File URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .mp4 video file.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'This Format must be included for HTML5 Video.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-video-mp4" class="eut-upload-simple-media-field eut-meta-text" name="eut_post_video_mp4" value="<?php echo esc_attr( $eut_post_video_mp4 ); ?>"/>
						<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</td>
				</tr>
				<tr class="eut-post-video-html5"<?php if ( "" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-video-ogv">
							<strong><?php esc_html_e( 'OGV File URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .ogv video file (optional).', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-video-ogv" class="eut-upload-simple-media-field eut-meta-text" name="eut_post_video_ogv" value="<?php echo esc_attr( $eut_post_video_ogv ); ?>"/>
						<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</td>
				</tr>
				<tr class="eut-post-video-html5"<?php if ( "" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-video-poster">
							<strong><?php esc_html_e( 'Poster Image', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Use same resolution as video.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-video-poster" class="eut-upload-simple-media-field eut-meta-text" name="eut_post_video_poster" value="<?php echo esc_attr( $eut_post_video_poster ); ?>"/>
						<input type="button" data-media-type="image" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</td>
				</tr>				
				<tr class="eut-post-video-embed"<?php if ( "html5" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-video-embed">
							<strong><?php esc_html_e( 'Vimeo/YouTube URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter the full URL of your video from Vimeo or YouTube.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-video-embed" class="eut-meta-text" name="eut_post_video_embed" value="<?php echo esc_attr( $eut_post_video_embed ); ?>"/>
					</td>
				</tr>
			</tbody>
		</table>

	<?php
	}

	function eut_meta_box_post_format_audio( $post ) {

		$audio_mode = get_post_meta( $post->ID, 'eut_post_type_audio_mode', true );
		$eut_post_audio_mp3 = get_post_meta( $post->ID, 'eut_post_audio_mp3', true );
		$eut_post_audio_ogg = get_post_meta( $post->ID, 'eut_post_audio_ogg', true );
		$eut_post_audio_wav = get_post_meta( $post->ID, 'eut_post_audio_wav', true );
		$eut_post_audio_embed = get_post_meta( $post->ID, 'eut_post_audio_embed', true );

	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Select one of the choices below for the featured audio.', 'corpus' ); ?></p>
					</td>
				</tr>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-post-type-audio-mode">
							<strong><?php esc_html_e( 'Audio Mode', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select your Audio Mode', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select id="eut-post-type-audio-mode" name="eut_post_type_audio_mode">
							<option value="" <?php selected( "", $audio_mode ); ?>><?php esc_html_e( 'Embed Audio', 'corpus' ); ?></option>
							<option value="html5" <?php selected( "html5", $audio_mode ); ?>><?php esc_html_e( 'HTML5 Audio', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr class="eut-post-audio-html5"<?php if ( "" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-audio-mp3">
							<strong><?php esc_html_e( 'MP3 File URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .mp3 audio file.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-audio-mp3" class="eut-upload-simple-media-field eut-meta-text" name="eut_post_audio_mp3" value="<?php echo esc_attr( $eut_post_audio_mp3 ); ?>"/>
						<input type="button" data-media-type="audio" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</td>
				</tr>
				<tr class="eut-post-audio-html5"<?php if ( "" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-audio-ogg">
							<strong><?php esc_html_e( 'OGG File URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .ogg audio file.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-audio-ogg" class="eut-upload-simple-media-field eut-meta-text" name="eut_post_audio_ogg" value="<?php echo esc_attr( $eut_post_audio_ogg ); ?>"/>
						<input type="button" data-media-type="audio" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</td>
				</tr>
				<tr class="eut-post-audio-html5"<?php if ( "" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-audio-wav">
							<strong><?php esc_html_e( 'WAV File URL', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .wav audio file (optional).', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-post-audio-wav" class="eut-upload-simple-media-field eut-meta-text" name="eut_post_audio_wav" value="<?php echo esc_attr( $eut_post_audio_wav ); ?>"/>
						<input type="button" data-media-type="audio" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</td>
				</tr>
				<tr class="eut-post-audio-embed"<?php if ( "html5" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-post-audio-embed">
							<strong><?php esc_html_e( 'Audio embed code', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Type your audio embed code.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<textarea id="eut-post-audio-embed" name="eut_post_audio_embed" cols="40" rows="5"><?php echo esc_textarea( $eut_post_audio_embed ); ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>

	<?php
	}

	function eut_post_feature_section_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_post_feature_save_nonce' );

		$post_id = $post->ID;
		eut_admin_get_feature_section( $post_id );

	}

	function eut_post_options_save_postdata( $post_id , $post ) {
		global $eut_post_options;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! isset( $_POST['eut_post_save_nonce'] ) || !wp_verify_nonce( $_POST['eut_post_save_nonce'], 'eut_nonce_save' ) ) {
			return;
		}

		// Check permissions
		if ( 'post' == $_POST['post_type'] )
		{
			if ( !current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		foreach ( $eut_post_options as $value ) {
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

		if ( isset( $_POST['eut_post_format_gallery_save_nonce'] ) && wp_verify_nonce( $_POST['eut_post_format_gallery_save_nonce'], 'eut_nonce_save' ) ) {


			//Feature Slider Items
			$slider_items = array();
			if ( isset( $_POST['eut_media_slider_item_id'] ) ) {

				$num_of_images = sizeof( $_POST['eut_media_slider_item_id'] );
				for ( $i=0; $i < $num_of_images; $i++ ) {

					$this_image = array (
						'id' => $_POST['eut_media_slider_item_id'][ $i ],
					);
					array_push( $slider_items, $this_image );
				}

			}

			if( empty( $slider_items ) ) {
				delete_post_meta( $post->ID, 'eut_post_slider_items' );
				delete_post_meta( $post->ID, 'eut_post_slider_settings' );
			} else{
				update_post_meta( $post->ID, 'eut_post_slider_items', $slider_items );
				$media_slider_speed = 3500;
				$media_slider_direction_nav = '1';
				if ( isset( $_POST['eut_post_slider_settings_speed'] ) ) {
					$media_slider_speed = $_POST['eut_post_slider_settings_speed'];
				}
				if ( isset( $_POST['eut_post_slider_settings_direction_nav'] ) ) {
					$media_slider_direction_nav = $_POST['eut_post_slider_settings_direction_nav'];
				}
				$media_slider_settings = array (
					'slideshow_speed' => $media_slider_speed,
					'direction_nav' => $media_slider_direction_nav,
				);
				update_post_meta( $post->ID, 'eut_post_slider_settings', $media_slider_settings );
			}

		}

		if ( isset( $_POST['eut_post_feature_save_nonce'] ) && wp_verify_nonce( $_POST['eut_post_feature_save_nonce'], 'eut_nonce_save' ) ) {

			eut_admin_save_feature_section( $post_id );

		}

	}
	
//Omit closing PHP tag to avoid accidental whitespace output errors.
