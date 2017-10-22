<?php
	namespace Roots\Sage\Customizer;
	use Roots\Sage\Assets;
function customizer_js() {
	wp_enqueue_script('sage_customizer', Assets\asset_path('scripts/
	customizer.js'), array('customize-preview'), null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customizer_js');