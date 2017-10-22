<section class="bbi-page-personnel bbi-content-section">
	
    <?php
	$personnel_items = get_sub_field('personnel_per_row');
    $max_columns = $personnel_items; //columns will arrange to any number (as long as it is evenly divisible by 12)
    $column = 12/$max_columns; //column number
    $total_items = count( get_sub_field('personnel_content'));
    $remainder = $total_items%$max_columns; //how many items are in the last row
    $first_row_item = ($total_items - $remainder); //first item in the last row
    ?>
    
    <?php $i=0; // counter ?>
    
	<?php if(get_sub_field('personnel_section_title')) { ?>
		<h2><?php the_sub_field('personnel_section_title'); ?></h2>
	<?php } ?>
	        		
	<?php if( have_rows('personnel_content') ): ?>
	    <?php while ( have_rows('personnel_content') ) : the_row(); ?> 
	
	        <?php if ($i%$max_columns==0) { // if counter is multiple of 3 ?>
	        <div class="row">
	        <?php } ?>
	
		        <div class="col-md-<?php echo $column; ?>">
		
		            <div class="bbi-single-personnel">
						<img alt="<?php echo $image['alt']; ?>" src="<?php the_sub_field('personnel_image'); ?>" />
						<h3><?php the_sub_field('personnel_name'); ?></h3>
						<h6><?php the_sub_field('personnel_title'); ?></h6>
						<?php the_sub_field('personnel_info'); ?>
						
						<?php
						$email = get_sub_field('personnel_email');
						$text = get_sub_field('personnel_button_text');
						?>
						
						<?php if($text) { ?>
							<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Engagement Feature - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);" href="mailto:<?php echo $email; ?>">
							<?php echo $text; ?>
							</a>
						<?php } ?>					
					</div>
		
		        </div>        
	
		    <?php $i++; ?>
		
		    <?php if($i%$max_columns==0) { // if counter is multiple of 3 ?>
		    </div>
		    <?php } ?>
		    
		<?php endwhile; ?>
	<?php endif;  ?>
	
</section>