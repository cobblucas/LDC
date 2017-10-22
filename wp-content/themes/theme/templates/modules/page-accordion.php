<section class="panel-group bbi-page-accordion bbi-content-section" id="accordion-<?php echo $counter; ?>" role="tablist" aria-multiselectable="true">
	
	<h3><?php the_sub_field('accordion_title'); ?></h3>
	        		
		<?php if( have_rows('accordion_row') ):

				$count = 1; while ( have_rows('accordion_row') ) : the_row(); ?>
		   	
		   	    <div class="panel">																			
						
					<a id="heading<?php echo $counter; ?><?php echo $count; ?>" class="collapsed panel-heading" aria-controls="collapse<?php echo $count; ?>" aria-expanded="false" href="#collapse<?php echo $counter; ?><?php echo $count; ?>" data-parent="#accordion-<?php echo $counter; ?>" data-toggle="collapse" role="button">
						
						<div class="section-title"><?php the_sub_field('section_title'); ?></div>
						<div class="more-btn"><span>more</span></div>
					</a>
				
					<div id="collapse<?php echo $counter; ?><?php echo $count; ?>" class="panel-collapse collapse value-wrap" aria-labelledby="heading<?php echo $counter; ?><?php echo $count; ?>" role="tabpanel" aria-expanded="false" style="height: 0px;">
						<div class="panel-body"> 
							
							<div class="info-wrap">
								<?php the_sub_field('section_content'); ?>
				  			</div>
						</div>
					</div>
				</div>
		   							   		
		   	<?php $count++; endwhile;  ?>
	   	<?php endif;  ?>

</section>
