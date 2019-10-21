<?php

// Register and load the widget
function social_media_counter_widget_load() {
    register_widget( 'social_media_counter_widget' );
}
add_action( 'widgets_init', 'social_media_counter_widget_load' );

// Creating the widget 
class social_media_counter_widget extends WP_Widget {
	
	function __construct() 
	{
		parent::__construct(
 			// Base ID of your widget
			'social_media_counter_widget', 
 			// Widget name will appear in UI
			__('Social Media Counter Widget', 'social_media_counter_widget_domain'), 
 			// Widget description
			array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'social_media_counter_widget_domain' ), ) 
		);
	}
 	
 	// Creating widget front-end
	public function widget( $args, $instance ) 
	{
		$facebook_url = apply_filters( 'widget_title', $instance['facebook_url'] );
		$twitter_url = apply_filters( 'widget_title', $instance['twitter_url'] );
		$instagram_url = apply_filters( 'instagram_url', $instance['instagram_url'] );
		$youtube_url = apply_filters( 'youtube_url', $instance['youtube_url'] );
		$soundcloud_url = apply_filters( 'soundcloud_url', $instance['soundcloud_url'] );
		$dribbble_url = apply_filters( 'dribbble_url', $instance['dribbble_url'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $facebook_url ) )
			$args['before_title'] . $facebook_url . $args['after_title'];
		if ( ! empty( $twitter_url ) )
			$args['before_title'] . $twitter_url . $args['after_title'];
		if ( ! empty( $twitter_url ) )
			$args['before_title'] . $instagram_url . $args['after_title'];
		if ( ! empty( $youtube_url ) )
			 $args['before_title'] . $youtube_url . $args['after_title'];
		if ( ! empty( $soundcloud_url ) )
			 $args['before_title'] . $soundcloud_url . $args['after_title'];
		if ( ! empty( $dribbble_url ) )
			 $args['before_title'] . $dribbble_url . $args['after_title'];
 			// This is where you run the code and display the output
			
			$shortcode = "[asmcounter";

			if(!empty($facebook_url))
			$shortcode .=" facebook=".$facebook_url;
			if(!empty($twitter_url))
			$shortcode .=" twitter=".$twitter_url;
			if(!empty($instagram_url))
			$shortcode .=" instagram=".$instagram_url;
			if(!empty($youtube_url))
			$shortcode .=" youtube=".$youtube_url;
			if(!empty($soundcloud_url))
			$shortcode .=" soundcloud=".$soundcloud_url;
			if(!empty($dribbble_url))
			$shortcode .=" dribbble=".$dribbble_url;
			$shortcode .=" ]";

			echo do_shortcode($shortcode);

		echo $args['after_widget'];
	}
         
	// Widget Backend 
	public function form( $instance ) 
	{
		
		if ( isset( $instance[ 'facebook_url' ] ) ) {
			$facebook_url = $instance[ 'facebook_url' ];
		}
		else 
		{
			//$facebook_url = __( 'New title', 'social_media_counter_widget_domain' );
		}

		if ( isset( $instance[ 'twitter_url' ] ) ) {
			$twitter_url = $instance[ 'twitter_url' ];
		}
		else 
		{
			//$twitter_url = __( 'New title', 'social_media_counter_widget_domain' );
		}

		if ( isset( $instance[ 'instagram_url' ] ) ) {
			$instagram_url = $instance[ 'instagram_url' ];
		}
		else 
		{
			//$instagram_url = __( 'New title', 'social_media_counter_widget_domain' );
		}

		if ( isset( $instance[ 'youtube_url' ] ) ) {
			$youtube_url = $instance[ 'youtube_url' ];
		}
		else 
		{
			//$youtube_url = __( 'New title', 'social_media_counter_widget_domain' );
		}

		if ( isset( $instance[ 'soundcloud_url' ] ) ) {
			$soundcloud_url = $instance[ 'soundcloud_url' ];
		}
		else 
		{
			//$soundcloud_url = __( 'New title', 'social_media_counter_widget_domain' );
		}

		if ( isset( $instance[ 'dribbble_url' ] ) ) {
			$dribbble_url = $instance[ 'dribbble_url' ];
		}
		else 
		{
			//$dribbble_url = __( 'New title', 'social_media_counter_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook Page Url:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php _e( 'Twitter Page Url:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php echo esc_attr( $twitter_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_url' ); ?>"><?php _e( 'Instagram Page Url:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" type="text" value="<?php echo esc_attr( $instagram_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube_url' ); ?>"><?php _e( 'Youtube Page Url:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'youtube_url' ); ?>" name="<?php echo $this->get_field_name( 'youtube_url' ); ?>" type="text" value="<?php echo esc_attr( $youtube_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'soundcloud_url' ); ?>"><?php _e( 'Sound Cloud Page Url:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'soundcloud_url' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud_url' ); ?>" type="text" value="<?php echo esc_attr( $soundcloud_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble_url' ); ?>"><?php _e( 'Dribbble Page Url:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_url' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_url' ); ?>" type="text" value="<?php echo esc_attr( $dribbble_url ); ?>" />
		</p>
	<?php 
	}
     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['facebook_url'] = ( ! empty( $new_instance['facebook_url'] ) ) ? strip_tags( $new_instance['facebook_url'] ) : '';
		$instance['twitter_url'] = ( ! empty( $new_instance['twitter_url'] ) ) ? strip_tags( $new_instance['twitter_url'] ) : '';
		$instance['instagram_url'] = ( ! empty( $new_instance['instagram_url'] ) ) ? strip_tags( $new_instance['instagram_url'] ) : '';
		$instance['youtube_url'] = ( ! empty( $new_instance['youtube_url'] ) ) ? strip_tags( $new_instance['youtube_url'] ) : '';
		$instance['soundcloud_url'] = ( ! empty( $new_instance['soundcloud_url'] ) ) ? strip_tags( $new_instance['soundcloud_url'] ) : '';
		$instance['dribbble_url'] = ( ! empty( $new_instance['dribbble_url'] ) ) ? strip_tags( $new_instance['dribbble_url'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here