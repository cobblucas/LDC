<section id="bbi-pages-toolbar">
	<div class="container-fluid">

		<?php if(get_field('show_breadcrumbs', 'option')) { get_template_part('templates/breadcrumbs'); } ?>
	
		<?php if(get_field('show_font_resizer', 'option')) {  get_template_part('templates/vendors/font', 'resizer'); } ?>

		<?php if(get_field('show_google_translate', 'option')) {   get_template_part('templates/vendors/google', 'translate'); } ?>	
		
		<?php if(get_field('show_social_sharing', 'option')) { get_template_part('templates/vendors/social', 'sharing'); } ?>
		
	</div>
</section>
