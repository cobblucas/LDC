<?php 

if((is_page() && get_field('banner_type') == "Universal")) {
	$thumb = get_field('internal_page_banner', 'option'); 
	$imgposition = get_field('internal_page_banner_position', 'option'); 

} else if(is_singular( 'post' ) && get_field('banner_type') == "Universal") {
	$thumb = get_field('single_blog_post_banner', 'option'); 
	$imgposition = get_field('single_blog_post_banner_position', 'option'); 

} else if(is_singular('ai1ec_event') && get_field('banner_type') == "Universal") {
	$thumb = get_field('single_event_banner', 'option'); 
	$imgposition = get_field('single_event_banner_position', 'option'); 

} else if(is_search()) {
	$thumb = get_field('search_page_banner', 'option'); 
	$imgposition = get_field('search_page_banner_position', 'option'); 

} else if(is_category() || is_archive()) {
	$thumb = get_field('category_page_banner', 'option'); 
	$imgposition = get_field('category_banner_position', 'option'); 
// } else if(is_author()) {
// 	$image = get_field('author_page_banner', 'option'); 

} else if(is_404()) {
	$thumb = get_field('error_page_banner', 'option'); 
	$imgposition = get_field('error_page_banner_position', 'option'); 

} else {				   								
	$thumb = get_field('banner_background_image');
	$imgposition = get_field('image_position'); 

} 

$size = 'banner-img'; $imgUrl = $thumb['sizes'][ $size ];

$captionposition = get_field('caption_position');
$captiontype = get_field('caption_type');

?>

<?php if(get_field('add_banner_image') || is_404() || is_category() || is_search()) { ?>


	<section id="bbi-page-banner" style="background:url('<?php echo $imgUrl; ?>') center <?php echo $imgposition; ?> /cover;">
		

			<?php if(get_field('display_caption') || is_category() || is_archive() || is_search()) { $parents = get_post_ancestors( $post->ID ); ?>
				<div class="bbi-caption bbi-caption__<?php if(is_404() || is_category() || is_search()) { ?>center<?php } else { echo strtolower($captionposition); } ?>">
					<div class="container-fluid">
						<div class="bbi-caption-wrap">

							<?php if(is_category()) { ?>
								<h4>Category</h4>
								<h1><?php single_cat_title(); ?></h1>

							<?php } else if(is_archive()) { ?>
								<h4>Archive</h4>
								<h1><?php echo get_the_archive_title(); ?></h1>

							<?php } else if(is_search()) { ?>
								<h1>Search</h1>

							<?php } elseif( $captiontype == "Custom Caption") { ?>
								<?php the_field('banner_caption'); ?>
							<?php } else { ?>
								<?php if($captiontype == "Parent and Current Titles") { ?>
									<h4><?php echo apply_filters( "the_title", get_the_title( end ( $parents ) ) ); ?></h4>
									<h1><?php the_title(); ?></h1>
								<?php } else if($captiontype == "Current Page Title Only") { ?>
									<h1><?php the_title(); ?></h1>
								<?php } else if($captiontype == "Parent Page Title Only") { ?>
									<h1><?php echo apply_filters( "the_title", get_the_title( end ( $parents ) ) ); ?></h1>
								<?php } ?>
							<?php } ?>	
						</div>	
					</div>		
				</div>
			<?php } ?>			
			
	</section>

<?php } else { ?>

	<section id="bbi-page-header">
		
		<div class="container-mid">

			
				<h1><?php the_title(); ?></h1>
			

		</div>

	</section>

<?php }  ?>
