<?php

	$text = get_sub_field('link_text');
	$location = get_sub_field('link_location');
	$currenturl = get_sub_field('select_page_url');
	$externalurl = get_sub_field('external_url');
	$linktarget = get_sub_field('link_target'); 
	$addButton = get_sub_field('add_icon');
	$buttonIcon = get_sub_field('select_button_icon');
?>

	<a class="btn-primary" onClick="_gaq.push(['_trackEvent', 'Page Button - <?php the_title(); ?>', 'Click', '<?php echo $text; ?>']);" 
		<?php if($location == "Current Site") { ?> 
			href="<?php echo $currenturl; ?>"
		<?php } else { ?> 
			href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
		<?php } } ?>>
		<?php if($addButton) { echo $buttonIcon; } ?>
		<?php echo $text; ?>
	</a>