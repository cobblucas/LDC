<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-ctas <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>

	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
		
		<div class="bbi-engagement-ctas">
			<div class="bbi-ctas-wrap">
				<div class="row">
				<?php $countctas = 0; while ( have_rows('engagement_ctas') ) : the_row();
				$total = $countctas++;
			
				$countctas++; endwhile; $rows = get_sub_field('engagement_ctas'); $total = count($rows);?>
				<?php $engagectascount = 1;  while ( have_rows('engagement_ctas') ) : the_row(); ?>
		
				<?php
		
					$text = get_sub_field('link_text');
					$location = get_sub_field('link_location');
			  		$currenturl = get_sub_field('select_page_url');
			  		$externalurl = get_sub_field('external_url');
			  		$linktarget = get_sub_field('link_target');
			  		$addButton = get_sub_field('add_icon');
			  		$buttonIcon = get_sub_field('select_button_icon');
			  		
				?>
					<div class="bbi-single-engage-cta <?php if( $total == 3) { ?>col-sm-4<?php } elseif ( $total == 4) { ?>col-sm-3<?php } else { ?>col-sm-6<?php } ?>">
		
						<a onClick="_gaq.push(['_trackEvent', 'Engagement Section CTA', 'Click', '<?php echo $text; ?>']);" 
						<?php if($location == "Current Site") { ?> 
							href="<?php echo $currenturl; ?>"
						<?php } else { ?> 
							href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
						<?php } } ?>>
		
							<div class="cta-info-inner">
								<?php if($addButton) { echo $buttonIcon; } ?>
								<h4><?php echo $text; ?></h4>
							</div>
						</a>
		
					</div>
		
				<?php $engagectascount++; endwhile;  ?>
				</div>
			</div>
		</div>
		
	</div>
</section>