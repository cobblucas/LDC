<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-text-media <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>	
	
	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
	
		<div class="bbi-engagement-text-media">
		
			<div class="bbi-wrap bbi-page-videos">
		
				<div class="row">
					
					 
		
					<div class="<?php if(get_sub_field('featured_content_position') == "Right") { ?>col-lg-push-5 pl0<?php } ?> col-sm-12 col-lg-7 bbi-engage-media single-video">
						<?php $image = get_sub_field('featured_content_background_image'); $size = 'home-features'; $thumb = $image['sizes'][ $size ]; ?>
						<img alt="<?php echo $image['alt']; ?>" src="<?php echo $thumb; ?>" />
		
						<?php if(get_sub_field('add_video')) { ?>
							<a class="media-wrap foobox" href="<?php the_sub_field('featured_video_url'); ?>">
								
									<div class="video play-btn">
										<i class="fa fa-play"></i>
									</div>
								
							</a>
						<?php } ?>
					</div>
		
					<div class="<?php if(get_sub_field('featured_content_position') == "Right") { ?>col-lg-pull-7 transparent-border-left<?php } ?> col-sm-12 col-md-12 col-lg-5 bbi-engage-text">
						<div class="bbi-text-wrap">
							<h3><?php the_sub_field('featured_title'); ?></h3>
							<?php the_sub_field('featured_content_copy'); ?>
							<?php 
					  		
					  		$addlink = get_sub_field('add_button'); 
					  		$button = get_sub_field('engagement_feature_button'); 
					  		$text = $button['link_text'];
					  		$location = $button['link_location'];
					  		$currenturl = $button['select_page_url'];
					  		$externalurl = $button['external_url'];
					  		$linktarget = $button['link_target']; 
					  		$addButton = $button['add_icon'];
					  		$buttonIcon = $button['select_button_icon'];
						  	
						  	if($addlink) { ?>
			
					        	<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Engagement Feature - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);" 
									<?php if($location == "Current Site") { ?> 
										href="<?php echo $currenturl; ?>"
									<?php } else { ?> 
										href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
									<?php } } ?>>
									<?php if($addButton) { echo $buttonIcon; } ?>
									<?php echo $text; ?>
								</a>
							<?php } ?>				
						<!-- End Features Options -->
						</div>
					</div>
		
				</div>
		
			</div>
		
		</div>
		
	</div>
</section>