<nav class="bbi-nav-utility">
  	<?php
    	if (has_nav_menu('utility_navigation')) {
      	wp_nav_menu(array('container' => false, 'theme_location' => 'utility_navigation', 'menu_class' => 'bbi-nav'));
    	}
  	?>
</nav>