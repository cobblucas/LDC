<?php 
	$bgtype = get_sub_field('background_type');
	$bgimg = get_sub_field('background_image');
	$bgposition = get_sub_field('background_position');
	$bgcolor = get_sub_field('background_color');
	$addfilter = get_sub_field('add_image_filter');
	$textColor = get_sub_field('white_text');
	$bgfix = get_sub_field('fix_background');
?>

<section class="bbi-page-section bbi-home-features <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed center <?php } else { echo $bgposition; } ?> center / cover;" <?php } ?>>

		<?php if($addfilter) { echo '<div class="section-filter"></div>'; } ?>
		
		<div class="container">

			

				<?php if(get_sub_field('feature_top_copy')) { ?>
					<div class="bbi-medium-cont">
						<h1><?php the_sub_field('feature_top_copy'); ?></h1>
					</div>
				<?php } ?>

				<div class="row">
						<?php $countctas = 0; while ( have_rows('features') ) : the_row();
						$total = $countctas++;
					
						$countctas++; endwhile; $rows = get_sub_field('features'); $total = count($rows);?>
						
						<?php $featurecount = 1;  while ( have_rows('features') ) : the_row(); 

					  		$location = get_sub_field('link_location');
					  		$currenturl = get_sub_field('select_page_url');
					  		$externalurl = get_sub_field('external_url');
					  		$linktarget = get_sub_field('link_target');
					  		$text = get_sub_field('button_text');
						?>
							<div class="bbi-single-feature <?php if( $total == 3) { ?>col-sm-4<?php } elseif ( $total == 4) { ?>col-sm-3<?php } else { ?>col-sm-6<?php } ?>">
								<?php if(get_sub_field('link_display') == "Whole Feature") { ?>
									<a onClick="_gaq.push(['_trackEvent', 'Home Feature', 'Click', '<?php the_sub_field('feature_title'); ?>']);" 
									<?php if($location == "Current Site") { ?> 
										href="<?php echo $currenturl; ?>"
									<?php } else { ?> 
										href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank" 
									<?php } } ?>>
								<?php } ?>
								<div class="bbi-feature-wrap bbi-page-videos">
									
									<div class="feature-image single-video">
										<?php $image = get_sub_field('features_image'); $size = 'home-features'; $thumb = $image['sizes'][ $size ]; ?>
										
										<img alt="<?php echo $image['alt']; ?>" src="<?php echo $thumb; ?>" />
						
										<?php if(get_sub_field('feature_add_video')) { ?>
											<a class="media-wrap foobox" href="<?php the_sub_field('feature_video'); ?>">
												
													<div class="video play-btn">
														<i class="fa fa-play"></i>
													</div>
												
											</a>
										<?php } ?>
									</div>
									
									<div class="feature-info">
										<!-- <h5><?php //the_sub_field('feature_subtitle'); ?></h5> -->
										<h3><?php the_sub_field('feature_title'); ?></h3>
										<p><?php the_sub_field('feature_paragraph'); ?></p>

										<?php if(get_sub_field('link_display') == "Button") { ?>
											<a class="primary-btn btn" onClick="_gaq.push(['_trackEvent', 'Home Feature', 'Click', '<?php the_sub_field('feature_title'); ?>']);" 
											<?php if($location == "Current Site") { ?> 
												href="<?php echo $currenturl; ?>"
											<?php } else { ?> 
												href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
											<?php } } ?>>
												<?php echo $text; ?>
											</a>
										<?php } ?>
									</div>
								</div>
								<?php if(get_sub_field('link_display') == "Whole Feature") { ?>
									</a>
								<?php } ?>

							</div>

						<?php $featurecount++; endwhile; wp_reset_query(); ?>	
				</div>
				
				<!-- End Features Options -->
				
			
		</div>
</section>
