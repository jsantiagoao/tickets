<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hypnotherapy_booked_theme_setup9')) {
	add_action( 'after_setup_theme', 'hypnotherapy_booked_theme_setup9', 9 );
	function hypnotherapy_booked_theme_setup9() {
		if (hypnotherapy_exists_booked()) {
			add_action( 'wp_enqueue_scripts', 							'hypnotherapy_booked_frontend_scripts', 1100 );
			add_filter( 'hypnotherapy_filter_merge_styles',					'hypnotherapy_booked_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'hypnotherapy_filter_tgmpa_required_plugins',		'hypnotherapy_booked_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'hypnotherapy_exists_booked' ) ) {
	function hypnotherapy_exists_booked() {
		return class_exists('booked_plugin');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hypnotherapy_booked_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('hypnotherapy_filter_tgmpa_required_plugins',	'hypnotherapy_booked_tgmpa_required_plugins');
	function hypnotherapy_booked_tgmpa_required_plugins($list=array()) {
		if (in_array('booked', hypnotherapy_storage_get('required_plugins'))) {
			$path = hypnotherapy_get_file_dir('plugins/booked/booked.zip');
			$list[] = array(
					'name' 		=> esc_html__('Booked Appointments', 'hypnotherapy'),
					'slug' 		=> 'booked',
					'source' 	=> !empty($path) ? $path : 'upload://booked.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'hypnotherapy_booked_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'hypnotherapy_booked_frontend_scripts', 1100 );
	function hypnotherapy_booked_frontend_scripts() {
		if (hypnotherapy_is_on(hypnotherapy_get_theme_option('debug_mode')) && file_exists(hypnotherapy_get_file_dir('plugins/booked/booked.css')))
			wp_enqueue_style( 'hypnotherapy-booked',  hypnotherapy_get_file_url('plugins/booked/booked.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'hypnotherapy_booked_merge_styles' ) ) {
	//Handler of the add_filter('hypnotherapy_filter_merge_styles', 'hypnotherapy_booked_merge_styles');
	function hypnotherapy_booked_merge_styles($list) {
		$list[] = 'plugins/booked/booked.css';
		return $list;
	}
}
?>