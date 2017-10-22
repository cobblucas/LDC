<?php

	$text = get_field('link_text');
	$location = get_field('link_location');
	$currenturl = get_field('select_page_url');
	$externalurl = get_field('external_url');
	$linktarget = get_field('link_target'); 
	$addButton = get_field('add_icon');
	$buttonIcon = get_field('select_button_icon');
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