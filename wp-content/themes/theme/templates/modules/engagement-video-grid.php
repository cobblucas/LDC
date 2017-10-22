<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-video-grid <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>	
	
	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
	
	
		<div class="bbi-engagement-video-grid">
		
			<div class="bbi-wrap bbi-page-videos">
				
				<?php
				$engagement_video_items = get_sub_field('engagement_videos_per_row');
			    $max_columns = $engagement_video_items; //columns will arrange to any number (as long as it is evenly divisible by 12)
			    $column = 12/$max_columns; //column number
			    $total_items = count( get_field('engagement_video'));
			    $remainder = $total_items%$max_columns; //how many items are in the last row
			    $first_row_item = ($total_items - $remainder); //first item in the last row
			    ?>
		    
			    <?php $i=0; // counter ?>
			    
			    <?php if( have_rows('engagement_video') ): ?>
			    	<?php while ( have_rows('engagement_video') ) : the_row(); ?>
			
						<?php if ($i%$max_columns==0) { // if counter is multiple of 3 ?>
				        <div class="row">
				        <?php } ?>
							
							<div class="single-video col-sm-<?php echo $column; ?>">
								<?php $image = get_sub_field('engagement_video_image'); $size = 'home-features'; $thumb = $image['sizes'][ $size ]; ?>
								<img alt="<?php echo $image['alt']; ?>" src="<?php echo $thumb; ?>" />
				
								<a class="media-wrap foobox" href="<?php the_sub_field('engagement_video_url'); ?>">
										
									<div class="video play-btn">
										<i class="fa fa-play"></i>
									</div>
									
								</a>
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