<?php
/**
 * EW Social Widget
 */
if(!class_exists('WP_Widget_Ew_subscriptions')){
	class WP_Widget_Ew_subscriptions extends WP_Widget {

		function WP_Widget_Ew_subscriptions() {
			$widgetOps = array('classname' => 'widget_subscriptions', 'description' => __('Display Subscriptions Form','wpdance'));
			$controlOps = array('width' => 400, 'height' => 550);
			$this->WP_Widget('ew_subscriptions', __('WD - Feedburner Subscriptions','wpdance'), $widgetOps, $controlOps);
		}

		function widget( $args, $instance ) {
			extract($args);
			$title = esc_attr($instance['title']);
			$title = (strlen($title) <= 0 ? 'Sign up for Our Newsletter' : $title);
			
			$intro_text = esc_attr( $instance['intro_text'] );
			$intro_text = (strlen($intro_text) <= 0 ? 'Enter your email' : $intro_text);
			
			$button_text = isset($instance['button_text']) ? esc_attr($instance['button_text']) : "";
			$button_text = (strlen($button_text) <= 0 ? 'Subscribe' : $button_text);
			
			$feedburner_id = $instance['feedburner_id'];
			$feedburner_id = (strlen($feedburner_id) <= 0 ? 'wpdance' : $feedburner_id);
			
			echo $before_widget;
			echo $before_title . $title . $after_title;
			?>
			
			<div class="subscribe_widget">
				<div class="newsletter">
					<div class="newsletter-image"></div>
					<span><?php echo $intro_text;?></span>
				</div>
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner_id;?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
					<p class="subscribe-email"><input type="text" name="email" class="subscribe_email" value="<?php _e('enter your email address','wpdance');?>" /></p>
					<input type="hidden" value="<?php echo $feedburner_id;?>" name="uri"/>
					<input type="hidden" value="<?php echo get_bloginfo( 'name' );?>" name="title"/>
					<input type="hidden" name="loc" value="en_US"/>
					<button class="button" type="submit" title="Subscribe"><span><span><?php echo $button_text;?></span></span></button>
					<p style="display:none;">Delivered by <a href="<?php echo "http://www.feedburner.com"; ?>" target="_blank">FeedBurner</a></p>
				</form>
			</div>

			<?php
			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;		
			$instance['title'] = $new_instance['title'];
			$instance['intro_text'] =  $new_instance['intro_text'];
			$instance['button_text'] =  $new_instance['button_text'];
			$instance['feedburner_id'] =  $new_instance['feedburner_id'];		
			return $instance;
		}

		function form( $instance ) { 
			$instance = wp_parse_args( (array) $instance, array( 'title' => 'Sign up for Our Newsletter', 
																 'intro_text' => 'A newsletter is a regularly distributed publication generally', 
																 'button_text' => 'Subscribe',
																 'feedburner_id' => 'WpComic-Manga' ) );
			$title = esc_attr($instance['title']);
			$intro_text = esc_attr($instance['intro_text']);
			$button_text = esc_attr($instance['button_text']);
			$feedburner_id = format_to_edit($instance['feedburner_id']);		
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Enter your title','wpdance'); ?> : </label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
			
			<p><label for="<?php echo $this->get_field_id('intro_text'); ?>"><?php _e('Enter your Intro Text','wpdance'); ?> : </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('intro_text'); ?>" name="<?php echo $this->get_field_name('intro_text'); ?>" value="<?php echo $intro_text; ?>" /></p>
			<p><label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Enter your Button','wpdance'); ?> : </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" value="<?php echo $button_text; ?>" /></p>
			<p><label for="<?php echo $this->get_field_id('feedburner_id'); ?>"><?php _e('Enter your Feedburner ID','wpdance'); ?> : </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('feedburner_id'); ?>" name="<?php echo $this->get_field_name('feedburner_id'); ?>" value="<?php echo $feedburner_id; ?>" /></p>		
			<?php }
	}
}

