
<aside id="bbi-main-sidebar" class="bbi-sidebar col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9">

	<?php if( have_rows('sidebar_modules') && is_page()):

    	while ( have_rows('sidebar_modules') ) : the_row();

	    	// Module type 1 to display Sidebar Navigation

	        if( get_row_layout() == 'sidebar_navigation' ):	?> 
	        <section class="bbi-content-section">
	   			<nav class="bbi-sidebar-navigation">
					<?php if (has_nav_menu('sidebar_navigation')) :
						wp_nav_menu(array('theme_location' => 'sidebar_navigation', 'depth' => 3, 'menu_class' => 'bbi-nav nav-menu'));
					endif; ?>
				</nav>	
			</section>

	     <?php	// Module type 2 for Regular text Editor

	        elseif( get_row_layout() == 'regular_text_&_image' ): 

	        	get_template_part('templates/modules/page-wysiwyg');

	         // Module type 3 for Buttons  

	        elseif( get_row_layout() == 'buttons' ):

	        	get_template_part('templates/modules/page-buttons');


			// Module type 4 for Videos

	        elseif( get_row_layout() == 'video' ):

	        	get_template_part('templates/modules/page-videos');

	        // Module type 5 for Featured Content

			elseif( get_row_layout() == 'sidebar_feature' ): 

				get_template_part('templates/modules/sidebar-feature');

			// Module type 6 for Wordpress Widgets

			elseif( get_row_layout() == 'wordpress_widgets' ): 

				get_template_part('templates/modules/sidebar-wp-widgets');


			// Module type 7 to select Theme CTA's

			// elseif( get_row_layout() == 'calls_to_action' ):

	  //     		$ctas = get_sub_field('choose_calls_to_action');
	  //     		echo '<div class="calls-to-action-row">';
	  //       		include('s__select-ctas.php');
	  //       	echo '</div>';

	  //       endif;

	        // Module type 8 to select Custom/Theme BBI Widgets

			//elseif( get_row_layout() == 'custom_widgets' ):

	      		

	        endif;


    	endwhile;


	endif; ?>


	 <?php if(is_category() || is_archive() || is_singular('post') || is_singular('ai1ec_event') || is_search()) { 

		echo '<section class="bbi-sidebar-widget bbi-content-section">';

				if(is_category() || is_archive()) {
					dynamic_sidebar('sidebar-category');
				} else if(is_singular('post')) {
					dynamic_sidebar('sidebar-posts');
				} else if(is_search()) {
					dynamic_sidebar('sidebar-search');

				} else {
					dynamic_sidebar('sidebar-events');
				}
			
		echo '</section>';

	 } ?>

</aside>

  
