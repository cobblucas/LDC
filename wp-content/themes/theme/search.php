

<?php if (!have_posts()) {  ?>
  <section class="bbi-page-main-content bbi-content-section">
    <h4>
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </h4>
    <br/>
    <a href="/sitemap" class="btn-primary">View Sitemap</a>&nbsp; &nbsp;<a href="/" class="btn-primary">Go to Homepage</a>
  </section>
<?php } else { ?>


  <section class="bbi-page-posts bbi-content-section">
    <h1>Search result for: <?php the_search_query(); ?></h1>
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', 'search'); ?>
    <?php endwhile; ?>

  </section>

  <?php wp_bootstrap_pagination(); ?>
<?php } ?>



