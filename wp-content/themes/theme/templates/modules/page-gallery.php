<section class="bbi-page-gallery bbi-content-section">

	<?php if(get_sub_field('gallery_copy')) { ?>
		<div class="gallery-copy">
			<?php the_sub_field('gallery_copy'); ?>
		</div>
	<?php } ?>

	<?php 

		$images = get_sub_field('page_gallery');

		if( $images ): ?>
		    <div class="page-gallery gallery row">
		        <?php foreach( $images as $image ): ?>
		            <div class="gallery-item col-xs-6 col-sm-3 col-md-2">
		                <a href="<?php echo $image['url']; ?>" class="foobox">
		                     <div class="imgWrap"><img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" /></div>

		                </a>
		                
		            </div>
		        <?php endforeach; ?>
		    </div>
	<?php endif; ?>

</section>