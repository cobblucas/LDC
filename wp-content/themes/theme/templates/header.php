<?php use Roots\Sage\Nav; ?>

<header id="bbi-header">
    <div class="container-mid">
    	<div class="row">

	    	<div class="bbi-logo-wrap col-sm-3">

				<?php
					$image = get_field('logo_retina', 'option');
					$size = 'large';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$realWidth = $width / 2;
					$height = $image['sizes'][ $size . '-height' ];
				?>
				<a class="bbi-logo" href="/">
					<img class="main-logo primary-logo" alt="<?php echo $image['alt']; ?>" src="<?php echo $thumb; ?>" style="max-width:<?php echo $realWidth; ?>px" />
				</a>

			</div>


			<div class="bbi-header-right">


				<button id="bbi-hamburger" class="visible-xs visible-sm" aria-controls="navbar" aria-expanded="false" data-target="#navbar"
				data-toggle="<?php if(get_field('menu_offcanvas', 'option')) { echo 'offcanvas'; } else { echo 'collapse'; } ?>" type="button">
				     MENU
				</button>

				<div id="navbar" class="bbi-mobile-menu <?php if(get_field('menu_offcanvas', 'option')) { echo 'navbar-offcanvas'; } else { echo 'navbar-collapse collapse'; } ?> pull-right">
			    	<button id="bbi-close" class="visible-xs visible-sm" aria-controls="navbar" aria-expanded="false" data-target="#navbar"
					data-toggle="<?php if(get_field('menu_offcanvas', 'option')) { echo 'offcanvas'; } else { echo 'collapse'; } ?>" type="button">
					     CLOSE
					</button>

					<?php get_template_part('templates/modules/nav-primary'); ?>

				</div>
			</div>
		</div>
	</div>
</header>
