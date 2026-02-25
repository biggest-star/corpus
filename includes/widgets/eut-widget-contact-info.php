<?php
/**
 * Plugin Name: Euthemians Contact Info
 * Description: A widget that displays Contact Info e.g: Address, Phone number.etc.
 * @author		Euthemians Team
 * @URI			http://euthemians.com
 */

add_action( 'widgets_init', 'eut_widget_contact_info' );

function eut_widget_contact_info() {
	register_widget( 'EUT_Widget_Contact_Info' );
}

class EUT_Widget_Contact_Info extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'eut-contact-info',
			'description' => esc_html__( 'A widget that displays contact info', 'corpus' ),
		);
		$control_ops = array(
			'width' => 300,
			'height' => 400,
			'id_base' => 'eut-widget-contact-info',
		);
		parent::__construct( 'eut-widget-contact-info', '(Euthemians) ' . esc_html__( 'Contact Info', 'corpus' ), $widget_ops, $control_ops );
	}

	function EUT_Widget_Contact_Info() {
		$this->__construct();
	}

	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$address = $instance['address'];
		$phone = $instance['phone'];
		$mobile = $instance['mobile'];
		$fax = $instance['fax'];
		$mail = $instance['mail'];
		$web = $instance['web'];

		echo $before_widget;

		// Display the widget title
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		?>

		<ul>
			<?php if ( ! empty( $address ) ) { ?>
			<li class="eut-address"><?php echo wp_kses_post( $address ); ?></li>
			<?php } ?>

			<?php if ( ! empty( $phone ) ) { ?>
			<li class="eut-phone"><?php echo esc_html( $phone ); ?></li>
			<?php } ?>

			<?php if ( ! empty( $mobile ) ) { ?>
			<li class="eut-mobile-number"><?php echo esc_html( $mobile ); ?></li>
			<?php } ?>

			<?php if ( ! empty( $fax ) ) { ?>
			<li class="eut-fax"><?php echo esc_html( $fax ); ?></li>
			<?php } ?>

			<?php if ( ! empty( $mail ) ) { ?>
			<li class="eut-email"><a href="mailto:<?php echo antispambot( $mail ); ?>"><?php echo antispambot( $mail ); ?></a></li>
			<?php } ?>

			<?php if ( ! empty( $web ) ) { ?>
			<li class="eut-web"><a href="<?php echo esc_url( $web ); ?>" target="_blank"><?php echo esc_html( $web ); ?></a></li>
			<?php } ?>
		</ul>


		<?php
		echo $after_widget;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = strip_tags( $new_instance['phone'] );
		$instance['mobile'] = strip_tags( $new_instance['mobile'] );
		$instance['fax'] = strip_tags( $new_instance['fax'] );
		$instance['mail'] = strip_tags( $new_instance['mail'] );
		$instance['web'] = strip_tags( $new_instance['web'] );

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array(
			'title' => '',
			'address' => '',
			'phone' => '',
			'mobile' => '',
			'fax' => '',
			'mail' => '',
			'web' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" value="<?php echo esc_attr( $instance['address'] ); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" value="<?php echo esc_attr( $instance['phone'] ); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'mobile' ) ); ?>"><?php esc_html_e( 'Mobile Phone:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'mobile' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mobile' ) ); ?>" value="<?php echo esc_attr( $instance['mobile'] ); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>"><?php esc_html_e( 'Fax:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr(  $this->get_field_id( 'fax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fax' ) ); ?>" value="<?php echo esc_attr( $instance['fax'] ); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>"><?php esc_html_e( 'Mail:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mail' ) ); ?>" value="<?php echo esc_attr( $instance['mail'] ); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'web' ) ); ?>"><?php esc_html_e( 'Website:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'web' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'web' ) ); ?>" value="<?php echo esc_attr( $instance['web'] ); ?>" style="width:100%;" />
		</p>

	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
