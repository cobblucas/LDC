
<section class="bbi-page-calendar-carousel bbi-content-section bbi-home-sticky-wrap">

	<?php if(!get_field('add_sidebar')) { ?><div class="container-fluid"><?php } ?>

		<?php if(get_sub_field('calendar_carousel_title')) { ?>
			<div class="row bbi-sticky-title">
				<div class="col-sm-12">
					<h1><?php the_sub_field('calendar_carousel_title'); ?></h1>
				</div>
			</div>
		<?php } ?>

		<div class="bbi-carousel">
			<div  class="owl-carousel owl-theme bbi-posts-outer">

				<?php

			$eventcats = get_sub_field('carousel_events_category');
			global $ai1ec_registry;
			$date_system = $ai1ec_registry->get( 'date.system' );
			$search = $ai1ec_registry->get('model.search');

			// gets localized time
			$local_date = $ai1ec_registry->get( 'date.time', $date_system->current_time(), 'sys.default' );

			//sets start time to today
			$start_time = clone $local_date;
			$start_time->set_time( 0, 0, 0 );

			//sets end time to a year from today
			$end_time = clone $start_time;
			$end_time->adjust_month( 12 );
			$time            = $ai1ec_registry->get( 'date.system' );
			// Get localized time
			$timestamp = $time->current_time();
			// Set $limit to the specified categories/tags
			$limit = array('cat_ids' => array ($eventcats));
			$events_per_page = 12;
			$paged = 0;

			$events_result = $search->get_events_relative_to($timestamp,$events_per_page,$paged,$limit); ?>

			<?php
				$event_count = '0';
				foreach($events_result['events'] as $event) {

						$event_count ++;
						$event_long_date   = $event->get( 'start' );
						$long_date = $ai1ec_registry->get('view.event.time')->get_long_date($event_long_date);
						$short_date = $ai1ec_registry->get('view.event.time')->get_short_date($event_long_date);
						$event_title   = $event->get( 'post' )->post_title;
						$eventID = $event->post->ID;
						$eventURL = get_permalink($eventID);
						$postid   = $event->get( 'post_id' );
						$day = $event->get('start' )->format( 'j' );
						$month = $event->get('start' )->format( 'M' );
						$venue = $event->get( 'venue' );
						$event_date = $event->get('start' )->format('l, F j, Y');
						$event_img = get_post_thumbnail_id( $eventID );
						$bg_img = wp_get_attachment_image_src( $event_img, 'full');
						$event_content = $event->post->post_content;
						?>

						<article class="bbi-home-sticky custom-item" style="background:url(<?php echo $bg_img[0]; ?>) no-repeat center center /cover;">
							<div class="bbi-posts-inner">
								<?php the_post_thumbnail('home-features'); ?>
								<div class="bbi-post-excerpt-wrap">
									<h3><?php echo $event_title; ?></h3>
									<div class="bbi-event-date"><?php echo $event_date; ?></div>
									<div class="bbi-post-excerpt">
										<p><?php echo wp_trim_words( $event_content, 20, '...' ); ?></p>
										<a class="alt-button" href="<?php echo $eventURL; ?>">Learn More</a>
									</div>

								</div>
							</div>
						</article>

			<?php }  ?>



			</div>
		</div>

	<?php if(!get_field('add_sidebar')) { ?></div><?php } ?>
</section>