<section class="bbi-page-column-module bbi-content-section">

	<?php if(!get_field('add_sidebar')) { ?><div class="container-fluid"><?php } ?>

		        		
		<?php if( have_rows('columns_content') ): ?>
			<div class="row">
				<?php 

					$count = 0; while ( have_rows('columns_content') ) : the_row();
						$total = $count++;
			
					$count++; endwhile; 

					$rows = get_sub_field('columns_content'); $total = count($rows);

					while ( have_rows('columns_content') ) : the_row();?>
				
		
					<div class="bbi-single-column <?php if($total == 2) { ?>col-sm-6<?php } else if($total == 3) { ?>col-sm-4<?php }  else if($total == 4) { ?>col-sm-3<?php } ?>">

						

						<div class="bbi-module-media">

							<?php 

							if(get_sub_field('column_layout') == 'Module with Video') { 
							 
							 	the_sub_field('column_video');

							} else if(get_sub_field('column_layout') == 'Module with Icon') { 

							 	the_sub_field('column_icon'); 

							} else { ?>

								<img alt="<?php echo $image['alt']; ?>" src="<?php the_sub_field('column_image'); ?>" />

							<?php } ?>

						</div>

						
						<h3><?php the_sub_field('column_title'); ?></h3>

						<?php the_sub_field('column_paragraph'); ?>

						<?php 
						$addlink = get_sub_field('column_add_button');
						$button = get_sub_field('colum_button');
						$text = $button['link_text'];
					    $location = $button['link_location'];
					    $currenturl = $button['select_page_url'];
					    $externalurl = $button['external_url'];
					    $linktarget = $button['link_target'];
					    $addButton = $button['add_icon'];
						$buttonIcon = $button['select_button_icon'];
						    
						if($addlink) { ?>
							<div class="row bbi-sticky-btn">
							
								<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Page Columns Button - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);" 
									<?php if($location == "Current Site") { ?> 
										href="<?php echo $currenturl; ?>"
									<?php } else { ?> 
										href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
									<?php } } ?>>
									<?php if($addButton) { echo $buttonIcon; } ?>
									<?php echo $text; ?>
								</a>
							
							</div>	
						<?php } ?>				
						<!-- End Features Options -->	
						
					</div>
					   		
		   		<?php  endwhile;  ?>
		   	</div>
	   	<?php endif;  ?>

	<?php if(!get_field('add_sidebar')) { ?></div><?php } ?>

</section>
