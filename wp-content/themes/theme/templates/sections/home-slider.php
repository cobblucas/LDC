<?php
	$transitioneffect = get_sub_field('transition_effect');
	$pausehover = get_sub_field('pause_on_hover');
	$sliderspeed = get_sub_field('transition_speed');
?>

<section class="bbi-main-slider<?php echo $sectioncount; ?> carousel <?php if($transitioneffect == "Fade") { ?>carousel-fade<?php } else { ?>slide<?php } ?>" data-ride="carousel" <?php if(!$pausehover) { ?>data-pause="false"<?php } ?> data-interval="<?php echo $sliderspeed; ?>">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">

  	<?php $slidecount = 1;  while ( have_rows('slider_slides') ) : the_row(); ?>

  	<?php
  		$image = get_sub_field('slide_image');
  		$addlink = get_sub_field('add_link');
  		$linkoption = get_sub_field('link_option');
  		$button = get_sub_field('link_type');
  		$text = $button['link_text'];
  		$location = $button['link_location'];
  		$currenturl = $button['select_page_url'];
  		$externalurl = $button['external_url'];
  		$linktarget = $button['link_target'];
	    $addButton = $button['add_icon'];
		$buttonIcon = $button['select_button_icon'];
  	?>


	    <div class="item <?php if($slidecount == 1) { ?>active<?php } ?>" style="background:url('<?php the_sub_field('slide_image'); ?>') no-repeat center center / cover;">
	    	<?php if($addlink && $linkoption == "Whole Slide") { ?>
	    		<a onClick="_gaq.push(['_trackEvent', 'Main Slider - <?php the_title(); ?>', 'Click', '<?php the_sub_field('caption_heading'); ?>']);"
	    			<?php if($location == "Current Site") { ?>
						href="<?php echo $currenturl; ?>"
					<?php } else { ?>
						href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
					<?php } } ?>>
			<?php } ?>

	      	<?php if(get_sub_field('add_caption')) { ?>

			  	<div class="carousel-caption <?php if(get_sub_field('caption_position') == "Right") { ?>caption-right<?php } else if(get_sub_field('caption_position') == "Left") { ?>caption-left<?php } ?>">
			  		<div class="container-mid">
				  		<div class="caption-wrap">
				  			<div class="caption-overlay">
						  		<?php if(get_sub_field('caption_heading')) { ?>
						  			<h6><?php the_sub_field('caption_heading'); ?></h6>
						  		<?php } ?>
						  		<div class="inner-caption">
							  		<?php if(get_sub_field('caption_title')) { ?>
										<h1><?php the_sub_field('caption_title'); ?></h1>
									<?php } ?>
									<?php if(get_sub_field('caption_paragraph')) { ?>
										<h3><?php the_sub_field('caption_paragraph'); ?></h3>
									<?php } ?>
								</div>
							</div>

							<?php if($addlink && $linkoption == "Button") { ?>
							<div class="bb-caption-callout">
								<a class="btn btn-primary" onClick="_gaq.push(['_trackEvent', 'Main Slider', 'Click', '<?php the_sub_field('caption_heading'); ?>']);"
									<?php if($location == "Current Site") { ?>
										href="<?php echo $currenturl; ?>"
									<?php } else if($location == "External Site") { ?>
										href="<?php echo $externalurl; ?>" <?php if($linktarget) { ?> target="_blank"<?php } } ?>>
									<?php if($addButton) { echo $buttonIcon; } ?>
									<?php if($text) { echo $text; } ?>
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if( $addlink && $linkoption == "Whole Slide") { ?></a><?php } ?>
		</div>

    <?php $slidecount++; endwhile; wp_reset_query(); ?>

  </div>

  <!-- Indicators -->
   	<?php if ( get_sub_field('show_indicators') ) { ?>
   <!-- 	<div class="container-fluid"> -->
		  <ol class="carousel-indicators hidden-xs">
		  	<?php $count = 0; $count1 = 1; while ( have_rows('slider_slides') ) : the_row(); ?>
			    <li data-target=".bbi-main-slider" data-slide-to="<?php echo $count; ?>" class="<?php if(get_sub_field('caption_position') == "Right") { ?>caption-right<?php } ?><?php if($count == 0) { ?>active<?php } ?>"><?php echo $count1; ?></li>
		    <?php $count++; $count1++; endwhile;  ?>
		  </ol>
	<!-- </div> -->
	<?php } wp_reset_query(); ?>


  <!-- Controls -->
  	<?php if ( get_sub_field('show_arrows') ) { ?>
	  <a class="left carousel-control" href=".bbi-main-slider" data-slide="prev">
	    <i class="fa fa-chevron-left"></i>
	  </a>
	  <a class="right carousel-control" href=".bbi-main-slider" data-slide="next">
	    <i class="fa fa-chevron-right"></i>
	  </a>
	<?php } ?>
</section> <!-- Carousel -->

