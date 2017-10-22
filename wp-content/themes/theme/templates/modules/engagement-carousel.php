<?php

	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');

?>

<section class="bbi-page-section bbi-engagement-footer <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>

	<div class="container">

		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>

		<div class="bbi-engagement-carousel">
			<div class="bbi-carousel-wrap">
				<div class="row">

					<div class="owl-carousel">
						<?php $engagectascount = 1;  while ( have_rows('engagement_carousel') ) : the_row(); ?>

						<?php

							$link = get_sub_field('link_type');
							$text = $link['link_text'];
							$location = $link['link_location'];
					  		$currenturl = $link['select_page_url'];
					  		$externalurl = $link['external_url'];
					  		$linktarget = $link['link_target'];
					  		$carouselImage = get_sub_field('carousel_image');

						?>

							<a onClick="_gaq.push(['_trackEvent', 'Engagement Section Carousel', 'Click', '<?php echo $text; ?>']);"
							<?php if($location == "Current Site") { ?>
								href="<?php echo $currenturl; ?>"
							<?php } else { ?>
								href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
							<?php } } ?>>
								<img alt="<?php echo $image['alt']; ?>" src="<?php echo $carouselImage; ?>" />
							</a>

						<?php $engagectascount++; endwhile;  ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>