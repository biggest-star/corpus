<?php
/*
*	Euthemians Testimonial Items
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

	add_action( 'add_meta_boxes', 'eut_testimonial_options_add_custom_boxes' );
	add_action( 'save_post', 'eut_testimonial_options_save_postdata', 10, 2 );

	$eut_testimonial_options = array (
		array(
			'name' => 'Name',
			'id' => 'eut_testimonial_name',
		),
		array(
			'name' => 'Identity',
			'id' => 'eut_testimonial_identity',
		),
	);

	function eut_testimonial_options_add_custom_boxes() {

		add_meta_box(
			'testimonial_oprions',
			__( 'Testimonial Options', 'corpus' ),
			'eut_testimonial_options_box',
			'testimonial'
		);

	}

	function eut_testimonial_options_box( $post ) {

		wp_nonce_field( 'eut_nonce_save', 'eut_testimonial_save_nonce' );

		$eut_testimonial_name = get_post_meta( $post->ID, 'eut_testimonial_name', true );
		$eut_testimonial_identity = get_post_meta( $post->ID, 'eut_testimonial_identity', true );

	?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-testimonial-name">
							<strong><?php esc_html_e( 'Name', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Type the name.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-testimonial-name" class="eut-meta-text" name="eut_testimonial_name" value="<?php echo esc_attr( $eut_testimonial_name ); ?>"/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="eut-testimonial-identity">
							<strong><?php esc_html_e( 'Identity', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Type the identity', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="eut-testimonial-identity" class="eut-meta-text" name="eut_testimonial_identity" value="<?php echo esc_attr( $eut_testimonial_identity ); ?>"/>
					</td>
				</tr>
			</tbody>
		</table>


	<?php
	}


	function eut_testimonial_options_save_postdata( $post_id , $post ) {
		global $eut_testimonial_options;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! isset( $_POST['eut_testimonial_save_nonce'] ) || !wp_verify_nonce( $_POST['eut_testimonial_save_nonce'], 'eut_nonce_save' ) ) {
			return;
		}

		// Check permissions
		if ( 'testimonial' == $_POST['post_type'] )
		{
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		}

		foreach ( $eut_testimonial_options as $value ) {
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

//Omit closing PHP tag to avoid accidental whitespace output errors.
	