<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-testimonials <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>	
	
	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
		
		<div class="bbi-page-testimonial bbi-engage-testimonial">
		
				<div class="bbi-testimonial-outer">
		
		
					<div class="testimonial col-sm-12 no-img">
						<div class="quote"><i class="fa fa-quote-left"></i></div>
						<p class="testimonial-content"><?php the_sub_field('engagement_testimonial_content'); ?></p>
						<h5 class="testimonial-author"><?php the_sub_field('engagement_testimonial_author'); ?></h5>
					</div>
				</div>
		
		</div>
		
	</div>
</section>