<section class="bbi-page-section bbi-home-sticky-wrap">
	<div class="container">

		<?php if(get_sub_field('posts_section_title')) { ?>
			<div class="row bbi-sticky-title">
				<div class="col-sm-12">
					<h1><?php the_sub_field('posts_section_title'); ?></h1>
				</div>
			</div>
		<?php } ?>

		<div class="row bbi-posts-outer">


				<?php
					$cats = get_sub_field('posts_category');
					//$number = get_field('posts_number');

					query_posts(array('post_type' => 'post', 'cat' => $cats, 'posts_per_page' => 4, 'post__in'  => get_option( 'sticky_posts' )));

					if (have_posts()) :
					while (have_posts()) : the_post(); ?>
						<article class="bbi-home-sticky col-sm-3">
							<div class="bbi-posts-inner">
								<?php the_post_thumbnail('home-features'); ?>
								<div class="bbi-post-excerpt-wrap">
									<h3><?php the_title() ;?></h3>
									<div class="bb-news-date"><?php the_time('j F Y') ?></div>
									<div class="bbi-post-excerpt">
										<?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?>
										<a class="bbi-read-more" href="<?php the_permalink(); ?>">Read More</a>
									</div>

								</div>
							</div>

						</article>
					<?php endwhile;
						endif;
					?>
				<?php wp_reset_query(); ?>


		</div>

		<?php
		$addlink = get_sub_field('sticky_posts_add_button');
		$button = get_sub_field('bottom_button');
		$text = $button['link_text'];
	    $location = $button['link_location'];
	    $currenturl = $button['select_page_url'];
	    $externalurl = $button['external_url'];
	    $linktarget = $button['link_target'];
	    $addButton = $button['add_icon'];
		$buttonIcon = $button['select_button_icon'];

		if($addlink) { ?>
			<div class="row bbi-sticky-btn">

				<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Sticky Posts Button - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);"
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
		<!-- End Features Options -->
	</div>
</section>