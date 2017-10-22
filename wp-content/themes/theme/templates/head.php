<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<?php the_field('custom_fonts', 'option'); ?>
	  <meta charset="utf-8">
	  <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= esc_url(get_feed_link()); ?>">
	  <?php wp_head(); ?>

	  	<?php if(get_field('tracking_type', 'option') == 'Google Analytics' && get_field("tracking_id", "option")) { ?>
		  	<!-- GOOGLE ANALYTICS SCRIPT -->
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', '<?php the_field("tracking_id", "option"); ?>', 'auto');
			  ga('send', 'pageview');

			</script>
	  	<?php } ?>
	  
	  	<!-- GOOGLE MAP JS  -->
	  	<?php if(get_field('google_api_key', 'option')) { ?>
	  		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=<?php the_field('google_api_key', 'option'); ?>"></script>
	  	<?php } ?>
	  	
		<!-- BBI NAMESPACE -->
	  	
	  	<?php //get_template_part('templates/bbi-master'); ?>

	  	<!-- Add This -->
		<?php if(get_field('show_social_sharing', 'option')) { ?>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php the_field('addthis_key', 'option'); ?>"></script>

		<?php } ?>
		
		 
		 <style>
			 <?php the_field('bp_xs', 'option'); ?>
			 @media only screen and (min-width: 768px){
			 	<?php the_field('bp_sm', 'option'); ?>
			 }
			 @media only screen and (min-width: 992px){
			 	<?php the_field('bp_md', 'option'); ?>
			 }
			 @media only screen and (min-width: 1200px){
			 	<?php the_field('bp_lg', 'option'); ?>
			 }
		</style>
	</head>
