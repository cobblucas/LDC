			 		

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

  	<?php get_template_part('templates/content', 'page'); ?>
  	
    <?php if(get_field('form_code')) { ?>
  		<?php the_field('form_code'); ?>
  	<?php } ?>
  </article>
<?php endwhile; ?>



	
