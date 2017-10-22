<?php 

	if(!is_front_page()) {
		$engagementsections = get_field('select_engagement_section'); 
	} else {
		$engagementsections = get_sub_field('select_engagement_section'); 
	}

	$engagementquery = new WP_Query(array(
		'post_type'      	=> 'engagementsection',
		'posts_per_page'	=> 3,
		'post__in'			=> $engagementsections,
		'post_status'		=> 'publish',
		'orderby'        	=> 'post__in',
	));


while ( $engagementquery->have_posts() ) {$engagementquery->the_post();

?>

	<?php if( have_rows('engagement_type') ):

		while ( have_rows('engagement_type') ) : the_row();

	        // Module type 1 for CTAs

	        if( get_row_layout() == 'engagement_calls_to_action' ): 

	        	get_template_part('templates/modules/engagement-ctas');
	        	
	        //Module type 2 for Carousel

	    	elseif( get_row_layout() == 'engagement_carousel_featured' ): 

	        	get_template_part('templates/modules/engagement-carousel');

	    	//Module type 3 for Testimonial

	    	elseif( get_row_layout() == 'engagement_testimonial' ): 

	        	get_template_part('templates/modules/engagement-testimonial');

	        //Module type 4 for Featured Content Left

	    	elseif( get_row_layout() == 'engagement_featured_content' ): 

	        	get_template_part('templates/modules/engagement-text-media');
	        	
	        //Module type 5 for Events
	        
	        elseif( get_row_layout() == 'engagement_featured_events' ): 

	        	get_template_part('templates/modules/engagement-events');
	        	
	        //Module type 6 for Google Map
	        
	        elseif( get_row_layout() == 'engagement_google_map' ): 

	        	get_template_part('templates/modules/engagement-google-map');
	        
	        //Module type 7 for Hover CTAs
	        
	        elseif( get_row_layout() == 'engagement_hover_calls_to_action' ): 

	        	get_template_part('templates/modules/engagement-hover-ctas');
    		
    		//Module type 8 for Engagement Videos
	        
	        elseif( get_row_layout() == 'engagement_video_grid' ): 

	        	get_template_part('templates/modules/engagement-video-grid');

    		//Module type 9 for Engagement Full Width
	        
	        elseif( get_row_layout() == 'engagement_full_width_content' ): 

	        	get_template_part('templates/modules/engagement-full-width-content');

    		//Module type 10 for Engagement Statistics
	        
	        elseif( get_row_layout() == 'engagement_statistics' ): 

	        	get_template_part('templates/modules/engagement-statistics');

    		//Module type 11 for Engagement Statistics
	        
	        elseif( get_row_layout() == 'engagement_background_photo_module' ): 

	        	get_template_part('templates/modules/engagement_background_photo_module');

    		endif;

		endwhile;

	endif; ?>		

<?php } wp_reset_query(); ?>
