
<?php if(get_field('show_post_date', 'option')) { ?>
	<time class="post-date updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>
<?php } ?>

<?php if(get_field('show_post_author', 'option')) { ?>
	<div class="bbi-post-author"><?= __(' By', 'sage'); ?> 
		<?php if(get_field('show_author_info', 'option')) { ?><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php } ?>
			<?= get_the_author(); ?>
		<?php if(get_field('show_author_info', 'option')) { ?></a><?php } ?>
	</div>
<?php } ?>

<?php if(get_field('show_post_categories', 'option')) { 

	if ( in_array( 'category', get_object_taxonomies( get_post_type() ) )) { ?>
		<div class="bbi-post-categories">
		  <span>Categories: </span><?php the_category(', ') ?>
		</div>

<?php } } ?>

<?php if(get_field('show_post_tags', 'option')) { 

	 if(has_tag()) { ?>
		<div class="bbi-post-tags">
	  		<span>Tags: </span><?php the_tags('') ?>
	  	</div>

<?php } }?>
<br/>


