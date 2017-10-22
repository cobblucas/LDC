<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-statistics <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>	
	
	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
	
	
		<div class="bbi-engagement-statistics">
		
			<div class="bbi-wrap bbi-statistics">
				
				<?php
				$engagement_statistics_items = get_sub_field('engagement_statistics_per_row');
			    $max_columns = $engagement_statistics_items; //columns will arrange to any number (as long as it is evenly divisible by 12)
			    $column = 12/$max_columns; //column number
			    $total_items = count( get_field('statistics_row'));
			    $remainder = $total_items%$max_columns; //how many items are in the last row
			    $first_row_item = ($total_items - $remainder); //first item in the last row
			    ?>
		    
			    <?php $i=0; // counter ?>
			    
			    <?php if( have_rows('statistics_row') ): ?>
			    	<?php while ( have_rows('statistics_row') ) : the_row(); ?>
			
						<?php if ($i%$max_columns==0) { // if counter is multiple of 3 ?>
				        <div class="row">
				        <?php } ?>
							
							<div class="col-sm-<?php echo $column; ?>">
								<div class="bbi-single-stat">
									<h3><?php the_sub_field('statistic_number'); ?></h3>
									<?php the_sub_field('statistic_info'); ?>
								</div>
					        </div>
					        
						<?php $i++; ?>
				
					    <?php if($i%$max_columns==0) { // if counter is multiple of 3 ?>
					    </div>
					    <?php } ?>
					    
					<?php endwhile; ?>
				<?php endif;  ?>
		
			</div>
		
		</div>
		
	</div>
</section>