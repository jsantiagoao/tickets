<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the Visual Composer to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$hypnotherapy_content = '';
$hypnotherapy_blog_archive_mask = '%%CONTENT%%';
$hypnotherapy_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $hypnotherapy_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($hypnotherapy_content = apply_filters('the_content', get_the_content())) != '') {
		if (($hypnotherapy_pos = strpos($hypnotherapy_content, $hypnotherapy_blog_archive_mask)) !== false) {
			$hypnotherapy_content = preg_replace('/(\<p\>\s*)?'.$hypnotherapy_blog_archive_mask.'(\s*\<\/p\>)/i', $hypnotherapy_blog_archive_subst, $hypnotherapy_content);
		} else
			$hypnotherapy_content .= $hypnotherapy_blog_archive_subst;
		$hypnotherapy_content = explode($hypnotherapy_blog_archive_mask, $hypnotherapy_content);
	}
}

// Prepare args for a new query
$hypnotherapy_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$hypnotherapy_args = hypnotherapy_query_add_posts_and_cats($hypnotherapy_args, '', hypnotherapy_get_theme_option('post_type'), hypnotherapy_get_theme_option('parent_cat'));
$hypnotherapy_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($hypnotherapy_page_number > 1) {
	$hypnotherapy_args['paged'] = $hypnotherapy_page_number;
	$hypnotherapy_args['ignore_sticky_posts'] = true;
}
$hypnotherapy_ppp = hypnotherapy_get_theme_option('posts_per_page');
if ((int) $hypnotherapy_ppp != 0)
	$hypnotherapy_args['posts_per_page'] = (int) $hypnotherapy_ppp;
// Make a new query
query_posts( $hypnotherapy_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($hypnotherapy_content) && count($hypnotherapy_content) == 2) {
	set_query_var('blog_archive_start', $hypnotherapy_content[0]);
	set_query_var('blog_archive_end', $hypnotherapy_content[1]);
}

get_template_part('index');
?>