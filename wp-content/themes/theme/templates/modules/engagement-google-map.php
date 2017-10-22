<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-google-map <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>	
	
	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
	
		<div class="bbi-engagement-google-map">
			<div class="bbi-google-map-wrap">
				<div class="row">	
					
					<?php if( have_rows('locations') ): ?>
						<div class="acf-map">
							<?php while ( have_rows('locations') ) : the_row(); 
					
								$location = get_sub_field('location');
					
								?>
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
									<h4><?php the_sub_field('title'); ?></h4>
									<p class="address"><?php echo $location['address']; ?></p>
									<p><?php the_sub_field('description'); ?></p>
								</div>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		
	</div>
</section>