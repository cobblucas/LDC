<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-hover-ctas <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>	
	
	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
	
		<div class="bbi-engagement-hover-ctas">
			<div class="bbi-ctas-wrap">
				<div class="row">
				<?php $countctas = 0; while ( have_rows('engagement_hover_ctas') ) : the_row();
				$total = $countctas++;
			
				$countctas++; endwhile; $rows = get_sub_field('engagement_hover_ctas'); $total = count($rows);?>
				
				<?php $featurecount = 1;  while ( have_rows('engagement_hover_ctas') ) : the_row(); ?>
		
				<?php
					
					$image = get_sub_field('featured_content_background_image');
					$title = get_sub_field('engagement_hover_ctas_title');
					$text = get_sub_field('link_text');
					$location = get_sub_field('link_location');
			  		$currenturl = get_sub_field('select_page_url');
			  		$externalurl = get_sub_field('external_url');
			  		$linktarget = get_sub_field('link_target');
			  		$addButton = get_sub_field('add_icon');
			  		$buttonIcon = get_sub_field('select_button_icon');
			  		
				?>
					<div class="bbi-single-engage-hover-cta <?php if( $total == 3) { ?>col-sm-4<?php } elseif ( $total == 4) { ?>col-sm-3<?php } else { ?>col-sm-6<?php } ?>">
		
						<a onClick="_gaq.push(['_trackEvent', 'Engagement Section Hover CTA', 'Click', '<?php echo $text; ?>']);" 
						<?php if($location == "Current Site") { ?> 
							href="<?php echo $currenturl; ?>"
						<?php } else { ?> 
							href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
						<?php } } ?>>
							
							<div class="hover-cta-image">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>
								
							<div class="hover-cta-flex">
								<div class="hover-cta-flex-center">
									<div class="hover-cta-title">
										<h3><?php echo $title; ?></h3>
									</div>
			
									<div class="hover-cta-info-inner">
											<?php echo $text; ?>
											<?php if($addButton) { echo $buttonIcon; } ?>
									</div>
								</div>
							</div>
		
						</a>
		
					</div>
		
				<?php $engagectascount++; endwhile;  ?>
				</div>
			</div>
		</div>
		
	</div>
</section>