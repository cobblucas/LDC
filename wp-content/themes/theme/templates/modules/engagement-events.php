<?php
	
	$bgtype = get_field('background_type');
	$bgimg = get_field('background_image');
	$bgposition = get_field('background_position');
	$bgcolor = get_field('background_color');
	$addfilter = get_field('add_image_filter');
	$textColor = get_field('white_text');
	$bgfix = get_field('fix_background');
	
?>

<section class="bbi-page-section bbi-engagement-footer engagement-events <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed<?php } ?> <?php echo $bgposition; ?> center /cover;" <?php } ?>>	
	
	<div class="container">
			
		<?php if(get_field('show_engagement_title')) { ?>
			<h1 class="bbi-engagement-title"><?php echo get_the_title( ); ?></h1>
		<?php } ?>
	
		<div class="bbi-engagement-events">
			<div class="bbi-events-wrap">
				<div class="row">
				
						<?php
			
							$eventcats = get_sub_field('event_group_category'); 
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
							$events_per_page = 4;
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
										?>
				
										<div class="bbi-event-wrap col-sm-3">
											<div class="bbi-event-inner">
												<div class="bbi-event-short-date">
													<div class="date-wrap">
														<h6><?php echo $month; ?></h6>
														<h1><?php echo $day; ?></h1>
													</div>
												</div>
												<a class="event-title" href="<?php echo $eventURL; ?>">	
														
													<h3><?php echo $event_title; ?></h3>
				
												</a>
												<h6 class="bbi-event-long-date"><?php echo $event_date; ?></h6>
												<a class="icon-link" href="<?php echo $eventURL; ?>"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a>
											</div>
										</div>
										
				
									
							<?php }  ?>
				
				</div>
			</div>
		</div>
		
		<?php 
			$addlink = get_sub_field('add_view_all_events_button'); 
			$button = get_sub_field('view_all_events_button');
			$text = $button['link_text'];
		    $location = $button['link_location'];
		    $currenturl = $button['select_page_url'];
		    $externalurl = $button['external_url'];
		    $linktarget = $button['link_target'];
		    $addButton = $button['add_icon'];
			$buttonIcon = $button['select_button_icon'];
			    
			if($addlink) { ?>
				<div class="row bbi-sticky-btn">
				
					<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Engagement Events Button - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);" 
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