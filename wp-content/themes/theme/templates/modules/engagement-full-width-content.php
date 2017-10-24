<?php

	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');

?>

<section class="bbi-page-section bbi-engagement-footer no-padding engagement-full-width <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>

	<div class="container-fluid">

		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>

		<div class="bbi-engagement-full-width">

			<div class="bbi-wrap bbi-page-full-width-content">

				<?php
			    $max_columns = 1; //columns will arrange to any number (as long as it is evenly divisible by 12)
			    $column = 12/$max_columns; //column number
			    $total_items = count( get_field('engagement_video'));
			    $remainder = $total_items%$max_columns; //how many items are in the last row
			    $first_row_item = ($total_items - $remainder); //first item in the last row
			    ?>

			    <?php $i=0; // counter ?>

			    <?php if( have_rows('engagement_full_width_content_repeater') ): ?>
					<?php while( have_rows('engagement_full_width_content_repeater') ): the_row(); ?>

						<?php if ($i%$max_columns==0) { // if counter is multiple of 3 ?>
				        <div class="row">
				        <?php } ?>

						<?php

							$bgimage = get_sub_field('full_width_content_background_image');
							$position = get_sub_field('full_width_content_position');
					  		$title = get_sub_field('full_width_title');
					  		$copy = get_sub_field('full_width_content_copy');

						?>

							<div class="<?php if($position == "Right") { ?>col-lg-push-6 pl0<?php } ?> col-sm-12 col-lg-6 bbi-engage-media single-video" style="background:url(<?php echo $bgimage; ?>) bottom center /cover;">
							</div>

							<div class="<?php if($position == "Right") { ?>col-lg-pull-6 transparent-border-left<?php } ?> col-sm-12 col-md-12 col-lg-6 bbi-engage-text">
								<div class="bbi-text-wrap">
									<h3><?php echo $title; ?></h3>
									<?php echo $copy; ?>

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