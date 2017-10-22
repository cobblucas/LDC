
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
      <?php //get_template_part('templates/content-modules'); ?>
    </div>
   <?php if ('open' == $post->comment_status) {
      comments_template('/templates/comments.php'); 
    } ?>
  </article>

