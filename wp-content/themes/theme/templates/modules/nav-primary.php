<nav class="bbi-nav-primary">
    <?php
		if (has_nav_menu('primary_navigation')) :
			wp_nav_menu(array('container' => false, 'depth' => 2, 'theme_location' => 'primary_navigation', 'menu_class' => 'bbi-nav'));
		endif;
	?>	
	
</nav>