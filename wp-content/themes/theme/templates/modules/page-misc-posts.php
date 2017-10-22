<section class="bbi-page-misc-posts bbi-content-section">
	<?php 
		$cats = get_sub_field('choose_misc_posts_category'); 
		$args= array('post_type' => 'miscposts', 'misc_post_category' => $cats, 'posts_per_page'	=> 99);
		query_posts($args);
	?>

	<?php if(get_sub_field('misc_posts_section_title')) {
		the_sub_field('misc_posts_section_title');
	} ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php the_title(); ?>

	<?php endwhile; wp_reset_query(); ?>

</section>

