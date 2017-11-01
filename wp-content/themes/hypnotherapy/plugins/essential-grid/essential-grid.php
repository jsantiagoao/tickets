<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hypnotherapy_essential_grid_theme_setup9')) {
	add_action( 'after_setup_theme', 'hypnotherapy_essential_grid_theme_setup9', 9 );
	function hypnotherapy_essential_grid_theme_setup9() {
		if (hypnotherapy_exists_essential_grid()) {
			add_action( 'wp_enqueue_scripts', 							'hypnotherapy_essential_grid_frontend_scripts', 1100 );
			add_filter( 'hypnotherapy_filter_merge_styles',					'hypnotherapy_essential_grid_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'hypnotherapy_filter_tgmpa_required_plugins',		'hypnotherapy_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'hypnotherapy_exists_essential_grid' ) ) {
	function hypnotherapy_exists_essential_grid() {
		return defined('EG_PLUGIN_PATH');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hypnotherapy_essential_grid_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('hypnotherapy_filter_tgmpa_required_plugins',	'hypnotherapy_essential_grid_tgmpa_required_plugins');
	function hypnotherapy_essential_grid_tgmpa_required_plugins($list=array()) {
		if (in_array('essential-grid', hypnotherapy_storage_get('required_plugins'))) {
			$path = hypnotherapy_get_file_dir('plugins/essential-grid/essential-grid.zip');
			$list[] = array(
						'name' 		=> esc_html__('Essential Grid', 'hypnotherapy'),
						'slug' 		=> 'essential-grid',
						'source'	=> !empty($path) ? $path : 'upload://essential-grid.zip',
						'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'hypnotherapy_essential_grid_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'hypnotherapy_essential_grid_frontend_scripts', 1100 );
	function hypnotherapy_essential_grid_frontend_scripts() {
		if (hypnotherapy_is_on(hypnotherapy_get_theme_option('debug_mode')) && file_exists(hypnotherapy_get_file_dir('plugins/essential-grid/essential-grid.css')))
			wp_enqueue_style( 'hypnotherapy-essential-grid',  hypnotherapy_get_file_url('plugins/essential-grid/essential-grid.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'hypnotherapy_essential_grid_merge_styles' ) ) {
	//Handler of the add_filter('hypnotherapy_filter_merge_styles', 'hypnotherapy_essential_grid_merge_styles');
	function hypnotherapy_essential_grid_merge_styles($list) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}
?>