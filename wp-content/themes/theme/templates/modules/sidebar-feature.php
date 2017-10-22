<section class="bbi-sidebar-feature bbi-content-section">
	<div class="bbi-feat-wrap" style="background:url('<?php the_sub_field('feature_background_image') ?>') center center / cover;">
		<div class="media-wrap">
			<div class="media-wrap-bg item-wrap">

				
					 <?php if(get_sub_field('add_feature_icon')) { ?>
					 	<div class="icon-wrap">
					 		<i class="animal-icon bbi-animal-<?php the_sub_field('feature_icon'); ?>"></i>
					 	</div>
					 <?php } ?> 
					<h2><?php the_sub_field('feature_title') ?></h2>
				
					<?php if(get_sub_field('feature_copy')) {
						the_sub_field('feature_copy');
					} ?>	
				

	        	<?php 
			  		$addlink = get_sub_field('feature_add_button');
			  		$button = get_sub_field('feature_button'); 
			  		$text = $button['link_text'];
			  		$location = $button['link_location'];
			  		$currenturl = $button['select_page_url'];
			  		$externalurl = $button['external_url'];
			  		$linktarget = $button['link_target']; 
			  		$addButton = $button['add_icon'];
			  		$buttonIcon = $button['select_button_icon'];
			  	
			  	if($addlink) { ?>

		        	<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Sidebar Feature - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);" 
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
</section>