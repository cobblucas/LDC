<section class="bbi-page-posts bbi-content-section">
	<?php 

		$cats = get_sub_field('select_latest_posts'); 
		$pagination = get_sub_field('pagination'); 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args= array(
			'post_type' => 'post',
			'taxonomy' => 'category',
			'category__and' => $cats, 
			'posts_per_page'	=> $pagination,
			'paged' => $paged
		);
		query_posts($args);
	?>

	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

	<?php endwhile; ?>
	<?php wp_bootstrap_pagination(); wp_reset_query(); ?>

</section>

