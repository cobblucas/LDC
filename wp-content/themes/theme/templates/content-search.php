<article <?php post_class(); ?>>
  <div class="row">

    <?php if(has_post_thumbnail()) { ?>
      <div class="col-sm-4 col-md-3 bbi-post-img">
        <?php the_post_thumbnail('medium'); ?>
      </div>
    <?php } ?>  

    <div class="bbi-post-excerpt <?php if(!has_post_thumbnail()) { ?>col-sm-12<?php } else { ?>col-sm-8 col-md-9<?php } ?>">
       
        <a href="<?php the_permalink(); ?>"><h4><?php echo get_the_title( ); ?></h4></a>
        <h6><?php echo get_the_date('l, F j, Y'); ?></h6>
      	<div class="bbi-post-excerpt">
          	<?php $cc = get_the_content(); 

				if($cc != '') { ?>
				
			 		<?php echo wp_trim_words( the_excerpt(), 45, '...' ); ?>  				

			<?php	} else  { 		
						
				while ( have_rows('content_modules') ) : the_row();

				        if( get_row_layout() == 'regular_text_&_image' ): ?>
				        	
					        <?php echo wp_trim_words( the_excerpt(), 45, '...' ); ?>				        									        					        					        
				        	
				        <?php endif;


				endwhile;
			    	

			} ?>  
        </div> 
    </div> 

  </div> 

</article>