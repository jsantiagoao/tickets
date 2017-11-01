<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.06
 */

$hypnotherapy_header_css = $hypnotherapy_header_image = '';
$hypnotherapy_header_video = hypnotherapy_get_header_video();
if (true || empty($hypnotherapy_header_video)) {
	$hypnotherapy_header_image = get_header_image();
	if (hypnotherapy_is_on(hypnotherapy_get_theme_option('header_image_override')) && apply_filters('hypnotherapy_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($hypnotherapy_cat_img = hypnotherapy_get_category_image()) != '')
				$hypnotherapy_header_image = $hypnotherapy_cat_img;
		} else if (is_singular() || hypnotherapy_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$hypnotherapy_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($hypnotherapy_header_image)) $hypnotherapy_header_image = $hypnotherapy_header_image[0];
			} else
				$hypnotherapy_header_image = '';
		}
	}
}

$hypnotherapy_header_id = str_replace('header-custom-', '', hypnotherapy_get_theme_option("header_style"));

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($hypnotherapy_header_id);
						echo !empty($hypnotherapy_header_image) || !empty($hypnotherapy_header_video) ? ' with_bg_image' : ' without_bg_image';
						if ($hypnotherapy_header_video!='') echo ' with_bg_video';
						if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
						if (hypnotherapy_is_on(hypnotherapy_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
						?> scheme_<?php echo esc_attr(hypnotherapy_is_inherit(hypnotherapy_get_theme_option('header_scheme')) 
														? hypnotherapy_get_theme_option('color_scheme') 
														: hypnotherapy_get_theme_option('header_scheme'));
						?>"><?php

	// Background video
	if (!empty($hypnotherapy_header_video)) {
		get_template_part( 'templates/header-video' );
	}
		

	// Custom header's layout
	do_action('hypnotherapy_action_show_layout', $hypnotherapy_header_id);

			// Page title and breadcrumbs area
	if(hypnotherapy_get_theme_option('show_title_box') == true){
		get_template_part( 'templates/header-title');
	}
	
	// Header widgets area
	get_template_part( 'templates/header-widgets' );


		
?></header>