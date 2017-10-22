 <nav class="bbi-nav-social">
	<?php 

	$menu_name = 'social_navigation';
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	
	echo '<ul class="bbi-nav">';
	foreach( $menu_items as $menu_item ) {
		$link = $menu_item->url;
		$target = $menu_item->target;
		$title = $menu_item->title; 
		$title_attr = $menu_item->attr_title;
		?>

		<li class="item <?php if($title_attr) { ?>with-title<?php } ?>">
			<a href="<?php echo $link; ?>" class="title" <?php if($target) { ?>target="<?php echo $target; ?>"<?php } ?>>
				<?php the_field( 'select_menu_icon', $menu_item->ID ); ?>
            	<?php if($title_attr) { ?><span><?php echo $title_attr; ?></span><?php } ?>
        	</a>
	    </li>
	
	<?php }
	echo '</nav>';
	?>
</nav>