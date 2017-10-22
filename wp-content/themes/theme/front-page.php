<?php

	

// check if the flexible content field has rows of data
if( have_rows('homepage_sections') ):

     // loop through the rows of data
     while (have_rows('homepage_sections') ) : the_row();

        if( get_row_layout() == 'slider' ):

        	get_template_part('templates/sections/home-slider');

        elseif( get_row_layout() == 'calls_to_action' ): 

            get_template_part('templates/sections/home-ctas');

        elseif( get_row_layout() == 'home_wysiwyg' ): 
           
            echo "<section class='bbi-page-section bbi-home-wysiwyg'><div class='container-fluid'>";
                 the_sub_field('main_editor');
            echo "</div></section>";


        elseif( get_row_layout() == 'home_features' ): 

        	get_template_part('templates/sections/home-features');

        elseif( get_row_layout() == 'sticky_posts' ): 

            get_template_part('templates/sections/home-sticky-posts');


	    elseif( get_row_layout() == 'engagement_section' ): 

	    	get_template_part('templates/sections/engagement-section');

        endif;

  	 endwhile;

else :

    // no layouts found

endif;

?>
