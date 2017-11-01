<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hypnotherapy_instagram_feed_theme_setup9')) {
	add_action( 'after_setup_theme', 'hypnotherapy_instagram_feed_theme_setup9', 9 );
	function hypnotherapy_instagram_feed_theme_setup9() {
		if (is_admin()) {
			add_filter( 'hypnotherapy_filter_tgmpa_required_plugins',		'hypnotherapy_instagram_feed_tgmpa_required_plugins' );
		}
	}
}

// Check if Instagram Feed installed and activated
if ( !function_exists( 'hypnotherapy_exists_instagram_feed' ) ) {
	function hypnotherapy_exists_instagram_feed() {
		return defined('SBIVER');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hypnotherapy_instagram_feed_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('hypnotherapy_filter_tgmpa_required_plugins',	'hypnotherapy_instagram_feed_tgmpa_required_plugins');
	function hypnotherapy_instagram_feed_tgmpa_required_plugins($list=array()) {
		if (in_array('instagram-feed', hypnotherapy_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Instagram Feed', 'hypnotherapy'),
					'slug' 		=> 'instagram-feed',
					'required' 	=> false
				);
		return $list;
	}
}
?>