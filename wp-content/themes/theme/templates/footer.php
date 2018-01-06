
<footer id="bbi-footer">
	<div class="bbi-footer-wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="bbi-footer-col left col-sm-6">

					<?php

					$location = get_field('footer_map', 'option');

					if( !empty($location) ):
					?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>
				</div>

				<div class="bbi-footer-col right col-sm-6">
					<div class="footer-location">
						<?php the_field('footer_location', 'option'); ?>
					</div>
					<div class="footer-details">
						<?php the_field('statement_of_purpose', 'option'); ?>
						<?php get_template_part('templates/modules/nav-social'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="footer-bottom col-sm-12">
					<img src="<?php the_field('footer_logo', 'option'); ?>">
					<h3><?php the_field('footer_blurb', 'option'); ?></h3>
					<div class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, View the <a href="/privacy-policy/">Privacy Policy</a>. All Rights Reserved.</div>
				</div>
			</div>
		</div>
	</div>
</footer>