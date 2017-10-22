<div class="bbi-blog-cont main-content">
    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
    <h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
    <ul>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>,
                <?php the_time('d M Y'); ?>
            </li>
        <?php endwhile; else: ?>
            <p><?php _e('No posts by this author.'); ?></p>
        <?php endif; ?>
    </ul>
    <?php get_template_part('templates/author-bio'); ?>
</div>
<?php get_template_part('templates/sidebar'); ?>
