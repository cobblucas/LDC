<?php
	if (has_nav_menu('footer_admin_navigation')) : ?>
		<nav class="bbi-nav-footer-admin">
			<?php wp_nav_menu(array('container' => false, 'theme_location' => 'footer_admin_navigation', 'menu_class' => 'bbi-nav')); ?>
		</nav>
	<?php endif;
?>	