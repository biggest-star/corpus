<?php
/*
*	Helper Functions for meta options ( Post / Page)
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Function to print menu selector
 */
function eut_print_menu_selection( $menu_id, $id, $name, $default = 'none' ) {

	?>
	<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>">
		<option value="" <?php selected( '', $menu_id ); ?>>
			<?php
				if ( 'none' == $default ){
					_e( 'None', 'corpus' );
				} else {
					_e( 'Default', 'corpus' );
				}
			?>
		</option>
	<?php
		$menus = wp_get_nav_menus();
		if ( ! empty( $menus ) ) {
			foreach ( $menus as $item ) {
	?>
				<option value="<?php echo esc_attr( $item->term_id ); ?>" <?php selected( $item->term_id, $menu_id ); ?>>
					<?php echo esc_html( $item->name ); ?>
				</option>
	<?php
			}
		}
	?>
	</select>
	<?php
}

/**
 * Function to print menu type selector
 */
function eut_print_menu_type_selection( $menu_type, $id, $name, $default = '' ) {

	$menu_types = array(
		'' => __( 'Default', 'corpus' ),
		'simply' => __( 'Simple', 'corpus' ),
		'hidden' => __( 'Hidden', 'corpus' ),
	);

	?>
	<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>">
	<?php
		foreach ( $menu_types as $key => $value ) {
			if ( $value ) {
	?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $menu_type ); ?>><?php echo esc_html( $value ); ?></option>
	<?php
			}
		}
	?>
	</select>
	<?php
}

/**
 * Function to print layout selector
 */
function eut_print_layout_selection( $layout, $id, $name ) {

	$layouts = array(
		'' => __( 'Default', 'corpus' ),
		'none' => __( 'Full Width', 'corpus' ),
		'left' => __( 'Left Sidebar', 'corpus' ),
		'right' => __( 'Right Sidebar', 'corpus' ),
	);

	?>
	<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>">
	<?php
		foreach ( $layouts as $key => $value ) {
			if ( $value ) {
	?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $layout ); ?>><?php echo esc_html( $value ); ?></option>
	<?php
			}
		}
	?>
	</select>
	<?php
}

/**
 * Function to print sidebar selector
 */
function eut_print_sidebar_selection( $sidebar, $id, $name ) {
	global $wp_registered_sidebars;


	?>
	<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>">
		<option value="" <?php selected( '', $sidebar ); ?>><?php echo esc_html__( 'Default', 'corpus' ); ?></option>
	<?php
	foreach ( $wp_registered_sidebars as $key => $value ) {
		?>
		<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $sidebar ); ?>><?php echo esc_html( $value['name'] ); ?></option>
		<?php
	}
	?>
	</select>
	<?php
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
