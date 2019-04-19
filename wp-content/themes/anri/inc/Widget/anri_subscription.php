<?php
Class anri_subscription extends WP_Widget {
	public function __construct() {
		parent::__construct('anri-subscribe','Anri Subscribe',array(
			'description' => 'This is a Subscribe Option.',
		));
	}
	public function widget( $args, $instance ) {
		?>
			<?php echo $args['before_widget']?>
		        <?php echo $args['before_title']?><?php echo $instance['title']; ?><?php echo $args['after_title']?>
		         <div class="sidebar-widget__subscribe">
	              <p><?php echo $instance['subtitle'] ?></p>
	              <form action="" method="post">
	                <input type="email" placeholder="Your email" name="email">
	                <input class="sidebar-widget__subscribe-submit" type="submit" value="Submit" name="submit">
	              </form>
	            </div>
		    <?php echo $args['after_widget']?>
		    <?php
		    	if($_POST['submit']) {
		    		$email = $_POST['email'];
		    		if(wp_mail($instance['email'],'One Suscription Added','Mail: '.$email)) {
		    				echo '<p class="alert alert-success">Your Email has been added to subscribe list.</p>';
		    		}
		    	}
		    ?>
		<?php
	}
	public function form( $instance ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title')?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $instance['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subtitle')?>">SubTitle</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('subtitle')?>" name="<?php echo $this->get_field_name('subtitle')?>" value="<?php echo $instance['subtitle']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email')?>">Mail to:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('email')?>" name="<?php echo $this->get_field_name('email')?>" value="<?php echo $instance['email']; ?>">
		</p>
		<?php
	}
}