<?php

	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	$videoimage = get_field('video_poster');
	$videowebm = get_field('video_webm');
	$videomp4 = get_field('video_mp4');

?>

<section class="bbi-page-section bbi-engagement-footer engagement-background <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } elseif($bgtype == "Video") { echo 'video'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>

	<div class="container">

		<video poster="<?php echo $videoimage; ?>" id="bgvid" playsinline autoplay muted loop>
			<source src="<?php echo $videowebm; ?>" type="video/webm">
			<source src="<?php echo $videomp4; ?>" type="video/mp4">
		</video>

		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>


		<div class="bbi-engagement-background-photo-module">

			<div class="bbi-text-wrap">

				<h3><?php the_sub_field('page_module_title'); ?></h3>

				<p><?php the_sub_field('page_module_content'); ?></p>

				<?php
				$addlink = get_sub_field('background_photo_module_add_button');
				$button = get_sub_field('background_photo_module_link');
				$text = $button['link_text'];
			    $location = $button['link_location'];
			    $currenturl = $button['select_page_url'];
			    $externalurl = $button['external_url'];
			    $linktarget = $button['link_target'];
			    $addButton = $button['add_icon'];
				$buttonIcon = $button['select_button_icon'];

				if($addlink) { ?>
					<div class="row bbi-sticky-btn">

						<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Background Photo Module Button - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);"
							<?php if($location == "Current Site") { ?>
								href="<?php echo $currenturl; ?>"
							<?php } else { ?>
								href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
							<?php } } ?>>
							<?php if($addButton) { echo $buttonIcon; } ?>
							<?php echo $text; ?>
						</a>

					</div>
				<?php } ?>

			</div>

		</div>

	</div>
</section>