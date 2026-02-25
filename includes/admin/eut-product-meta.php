<?php
/*
*	Euthemians Woo Product Meta
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

	add_action( 'add_meta_boxes', 'eut_product_options_add_custom_boxes' );
	add_action( 'save_post', 'eut_product_options_save_postdata', 10, 2 );

	$eut_product_options = array (

		array(
			'name' => 'Product Layout',
			'id' => 'eut_product_layout',
		),
		array(
			'name' => 'Product Sidebar',
			'id' => 'eut_product_sidebar',
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
			'name' => 'Disable Side Area',
			'id' => 'eut_disable_sidearea',
		),
		array(
			'name' => 'Disable Footer',
			'id' => 'eut_disable_footer',
		),
	);

	function eut_product_options_add_custom_boxes() {

		add_meta_box(
			'product_layout_options',
			esc_html__( 'Product Layout Options', 'corpus' ),
			'eut_layout_options_box',
			'product'
		);

	}

	function eut_layout_options_box( $post ) {

		wp_nonce_field( 'eut_nonce_product_save', 'eut_nonce_product_save' );

		$product_layout = get_post_meta( $post->ID, 'eut_product_layout', true );
		$product_sidebar = get_post_meta( $post->ID, 'eut_product_sidebar', true );
		$fixed_sidebar = get_post_meta( $post->ID, 'eut_fixed_sidebar', true );
		$sidebar_style = get_post_meta( $post->ID, 'eut_sidebar_style', true );
		$disable_sidearea = get_post_meta( $post->ID, 'eut_disable_sidearea', true );
		$disable_footer = get_post_meta( $post->ID, 'eut_disable_footer', true );

	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr>
					<th>
						<label for="eut-product-layout">
							<strong><?php esc_html_e( 'Layout', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select product content and sidebar alignment.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - WooCommerce Options - Single Product Settings.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_layout_selection( $product_layout, 'eut-product-layout', 'eut_product_layout' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-product-sidebar">
							<strong><?php esc_html_e( 'Sidebar', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select product sidebar.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - WooCommerce Options - Single Product Settings.', 'corpus' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<?php eut_print_sidebar_selection( $product_sidebar, 'eut-product-sidebar', 'eut_product_sidebar' ); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-sidebar-style">
							<strong><?php esc_html_e( 'Sidebar Style', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select sidebar style.', 'corpus' ); ?>
								<br/>
								<strong><?php esc_html_e( 'Default is configured in Theme Options - WooCommerce Options - Single Product Settings.', 'corpus' ); ?></strong>
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
						<label for="eut-disable-sidearea">
							<strong><?php esc_html_e( 'Disable Smart Button', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, Smart Button Side Area will be hidden.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-disable-sidearea" name="eut_disable_sidearea" value="yes" <?php checked( $disable_sidearea, 'yes' ); ?>/>
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
						<input type="checkbox" id="eut-disable-footer" name="eut_disable_footer" value="yes" <?php checked( $disable_footer, 'yes' ); ?>/>
					</td>
				</tr>
			</tbody>
		</table>


	<?php
	}

	function eut_product_options_save_postdata( $post_id , $post ) {
		global $eut_product_options;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! isset( $_POST['eut_nonce_product_save'] ) || !wp_verify_nonce( $_POST['eut_nonce_product_save'], 'eut_nonce_product_save' ) ) {
			return;
		}

		// Check permissions
		if ( 'product' == $_POST['post_type'] )
		{
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		}

		foreach ( $eut_product_options as $value ) {
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

	}

?>