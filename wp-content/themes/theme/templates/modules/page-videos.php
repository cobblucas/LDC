<?php if( have_rows('page_videos') ):
	
	echo '<section class="bbi-page-videos bbi-content-section"><div class="row">';

	$count = 1; while ( have_rows('page_videos') ) : the_row();
			$total = $count++;
			
	$count++; endwhile;

     while ( have_rows('page_videos') ) : the_row();

		$videoTitle = get_sub_field('video_title');
		$videoUrl = get_sub_field('video_url');
		$videoImage = get_sub_field('video_image_background'); ?>

		<div class="single-video <?php if($total == 1) { ?>col-sm-12<?php } else { ?>col-sm-6<?php } ?>">
			<div class="bbi-video-wrap">
				
				<a style="background:url('<?php echo $videoImage; ?>') center center / cover;" href="<?php echo $videoUrl; ?>" 
					onClick="_gaq.push(['_trackEvent', 'Page Video - <?php the_title(); ?>', 'Click', '<?php echo $videoTitle; ?>']);" 
					class="foobox ratio-content" <?php if(get_sub_field('link_target')) { ?>target="_blank"<?php } ?>>
					<div class="media-wrap">
						
							<div class="video play-btn">
								<i class="fa fa-play"></i>
							</div>
						
					</div>
				</a>
				
			</div>

			<h6><?php echo $videoTitle; ?></h6>
		</div>

	<?php endwhile;
	
	echo '</div></section>';

endif; ?>