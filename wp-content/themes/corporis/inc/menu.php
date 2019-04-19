<?php 
	function corporis_nav_menu() {
		wp_nav_menu(array(
			'theme_location' => 'menu-1',
			'menu_class' => 'nav navbar-nav navbar-right',
			'container' => false,
			'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new Corporis_Navwalker(),

		));
	}
?>