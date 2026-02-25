<?php
/**
 * Plugin Name: Euthemians Latest Comments
 * Description: A widget that displays latest comments.
 * @author		Euthemians Team
 * @URI			http://euthemians.com
 */


add_action( 'widgets_init', 'eut_widget_latest_comments' );

function eut_widget_latest_comments() {
	register_widget( 'EUT_Widget_Latest_Comments' );
}

class EUT_Widget_Latest_Comments extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'eut-comments',
			'description' => esc_html__( 'A widget that displays latest comments', 'corpus' ),
		);
		$control_ops = array(
			'width' => 300,
			'height' => 400,
			'id_base' => 'eut-widget-latest-comments',
		);
		parent::__construct( 'eut-widget-latest-comments', '(Euthemians) ' . esc_html__('Latest Comments', 'corpus' ), $widget_ops, $control_ops );
	}

	function EUT_Widget_Latest_Comments() {
		$this->__construct();
	}

	function widget( $args, $instance ) {

		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$num_of_comments = $instance['num_of_comments'];
		$show_avatar = $instance['show_avatar'];
		if ( empty( $num_of_comments ) ) {
			$num_of_comments = 5;
		}

		echo $before_widget;

		// Display the widget title
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$comments = get_comments(
			array(
				'number' => $num_of_comments,
				'status' =>
				'approve',
				'post_status' => 'publish',
			)
		);
		$avatar = "";
		//Loop comments
		if ( $comments ) {
		?>
			<ul>
		<?php
			foreach ( (array) $comments as $comment ) {
		?>
				<li>
					<?php if( $show_avatar && '1' == $show_avatar ) { ?>
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php } ?>
					<div class="eut-comment-content">
						<div class="eut-author">
							<?php echo sprintf( _x('%1$s on %2$s', 'Author *on* Post Title', 'corpus'), get_comment_author_link( $comment->comment_ID ), '<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a>'); ?>
						</div>
						<?php if ( eut_visibility( 'blog_date_visibility', '1' ) ) { ?>
						<div class="eut-comment-date"><?php echo esc_html( get_the_date() ); ?></div>
						<?php } ?>
					</div>
				</li>
		<?php

			}
		?>
			</ul>
		<?php
 		} else {
			_e( 'No Comments Found!', 'corpus' );
		}

		echo $after_widget;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_of_comments'] = strip_tags( $new_instance['num_of_comments'] );
		$instance['show_avatar'] = strip_tags( $new_instance['show_avatar'] );

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array(
			'title' => '',
			'num_of_comments' => '5',
			'show_avatar' => '1',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num_of_comments' ) ); ?>"><?php echo esc_html__( 'Number of comments:', 'corpus' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'num_of_comments' ) ); ?>" style="width:100%;">
				<?php
				for ( $i = 1; $i <= 20; $i++ ) {
				?>
				    <option value="<?php echo esc_attr($i); ?>" <?php selected( $instance['num_of_comments'], $i ); ?>><?php echo esc_html($i) ; ?></option>
				<?php
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_avatar' ) ); ?>"><?php echo esc_html__( 'Show Avatar:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id('show_avatar') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_avatar') ); ?>" type="checkbox" value="1" <?php checked( $instance['show_avatar'], 1 ); ?> />
		</p>

	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
