<?php
/**
 * Plugin Name: Euthemians Social Networking
 * Description: A widget that displays social networking links.
 * @author		Euthemians Team
 * @URI			http://euthemians.com
 */

add_action( 'widgets_init', 'eut_widget_social' );

function eut_widget_social() {
	register_widget( 'EUT_Widget_Social' );
}

class EUT_Widget_Social extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'eut-social',
			'description' => esc_html__( 'A widget that displays social networking links', 'corpus' ),
		);
		$control_ops = array(
			'width' => 400,
			'height' => 600,
			'id_base' => 'eut-widget-social',
		);
		parent::__construct( 'eut-widget-social', '(Euthemians) ' . esc_html__( 'Social Networking', 'corpus' ), $widget_ops, $control_ops );
	}

	function EUT_Widget_Social() {
		$this->__construct();
	}

	function widget( $args, $instance ) {
	
		global $eut_social_list_extended;
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;

		// Display the widget title
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
	?>

		<ul>
		<?php

		$icon_size = eut_array_value( $instance, 'icon_size' );
		$shape = eut_array_value( $instance, 'shape' );
		$shape_type = eut_array_value( $instance, 'shape_type' );

		$social_shape_classes = array();

		array_push( $social_shape_classes, 'eut-' . $icon_size );
		if ( !empty( $shape ) ) {
			array_push( $social_shape_classes, 'eut-' . $shape );
			array_push( $social_shape_classes, 'eut-' . $shape_type );
		}

		$social_shape_class_string = implode( ' ', $social_shape_classes );

		foreach ( $eut_social_list_extended as $social_item ) {

			$social_item_url = eut_array_value( $instance, $social_item['url'] );
			if ( ! empty( $social_item_url ) ) {

				if ( 'skype' == $social_item['id'] ) {
		?>
					<li>
						<a href="<?php echo esc_url( $social_item_url, array( 'skype', 'http', 'https' ) ); ?>" class="<?php echo esc_attr( $social_shape_class_string ); ?> <?php echo esc_attr( $social_item['class'] ); ?>"></a>
					</li>
		<?php
				} else {
		?>
					<li>
						<a href="<?php echo esc_url( $social_item_url ); ?>" class="<?php echo esc_attr( $social_shape_class_string ); ?> <?php echo esc_attr( $social_item['class'] ); ?>" target="_blank"></a>
					</li>
		<?php
				}
			}
		}
		?>
		</ul>


	<?php

		echo $after_widget;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
	
		global $eut_social_list_extended;
		$instance = $old_instance;
		//Strip tags from title to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['icon_size'] = strip_tags( $new_instance['icon_size'] );
		$instance['shape'] = strip_tags( $new_instance['shape'] );
		$instance['shape_type'] = strip_tags( $new_instance['shape_type'] );
		
		foreach ( $eut_social_list_extended as $social_item ) {
			$instance[ $social_item['url'] ] = strip_tags( $new_instance[ $social_item['url'] ] );
		}

		return $instance;
	}


	function form( $instance ) {
	
		global $eut_social_list_extended;
		//Set up some default widget settings.
		$defaults = array(
			'title' => '',
			'icon_size' => 'medium',
			'shape' => 'square',
			'shape_type' => 'outline',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>"><?php echo esc_html__( 'Icon Size:', 'corpus' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'icon_size' ) ); ?>" style="width:100%;">
				<option value="large" <?php selected( "large", eut_array_value( $instance, 'icon_size' ) ); ?>><?php echo esc_html__( "Large", "corpus" ); ?></option>
				<option value="medium" <?php selected( "medium", eut_array_value( $instance, 'icon_size' ) ); ?>><?php echo esc_html__( "Medium", "corpus" ); ?></option>
				<option value="small" <?php selected( "small", eut_array_value( $instance, 'icon_size' ) ); ?>><?php echo esc_html__( "Small", "corpus" ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'shape' ) ); ?>"><?php echo esc_html__( 'Shape:', 'corpus' ); ?></label>
			<select  name="<?php echo esc_attr( $this->get_field_name( 'shape' ) ); ?>" style="width:100%;">
				<option value="square" <?php selected( "square", eut_array_value( $instance, 'shape' ) ); ?>><?php echo esc_html__( "Square", "corpus" ); ?></option>
				<option value="round" <?php selected( "round", eut_array_value( $instance, 'shape' ) ); ?>><?php echo esc_html__( "Round", "corpus" ); ?></option>
				<option value="circle" <?php selected( "circle", eut_array_value( $instance, 'shape' ) ); ?>><?php echo esc_html__( "Circle", "corpus" ); ?></option>
				<option value="" <?php selected( "", eut_array_value( $instance, 'shape' ) ); ?>><?php echo esc_html__( "None", "corpus" ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'shape_type' ) ); ?>"><?php echo esc_html__( 'Shape Type:', 'corpus' ); ?></label>
			<select  name="<?php echo esc_attr( $this->get_field_name( 'shape_type' ) ); ?>" style="width:100%;">
				<option value="simple" <?php selected( "simple", eut_array_value( $instance, 'shape_type' ) ); ?>><?php echo esc_html__( "Simple", "corpus" ); ?></option>
				<option value="outline" <?php selected( "outline", eut_array_value( $instance, 'shape_type' ) ); ?>><?php echo esc_html__( "Outline", "corpus" ); ?></option>
			</select>
		</p>
		<p>
			<em><?php echo esc_html__( 'Note: Make sure you include the full URL (i.e. http://www.samplesite.com)', 'corpus' ); ?></em>
			<br>
			 <?php echo esc_html__( 'If you do not want a social to be visible, simply delete the supplied URL.', 'corpus' ); ?>
		</p>
		<?php
		foreach ( $eut_social_list_extended as $social_item ) {

			$social_item_url = eut_array_value( $instance, $social_item['url'] );
		?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( $social_item['url'] ) ); ?>"><?php echo esc_html( $social_item['title'] ); ?>:</label>
					<input style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id( $social_item['url'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $social_item['url'] ) ); ?>" value="<?php echo esc_attr( $social_item_url ); ?>" />
				</p>

		<?php
		}
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
