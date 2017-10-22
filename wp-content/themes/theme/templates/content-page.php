<div class="content-primary">
	<?php if (get_field('show_title') )  { ?>
		<?php if(get_field('title_type') == 'Custom Title') { ?>
			<h1 class="content-title"><?php the_field('custom_title'); ?></h1>
		<?php } else { ?>
			<h1 class="content-title"><?php the_title(); ?></h1>
		<?php } ?>
	<?php } ?>
	<?php the_content(); ?>
</div>
