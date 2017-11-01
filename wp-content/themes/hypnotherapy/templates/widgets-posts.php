<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_post_id    = get_the_ID();
$hypnotherapy_post_date  = hypnotherapy_get_date();
$hypnotherapy_post_title = get_the_title();
$hypnotherapy_post_link  = get_permalink();
$hypnotherapy_post_author_id   = get_the_author_meta('ID');
$hypnotherapy_post_author_name = get_the_author_meta('display_name');
$hypnotherapy_post_author_url  = get_author_posts_url($hypnotherapy_post_author_id, '');

$hypnotherapy_args = get_query_var('hypnotherapy_args_widgets_posts');
$hypnotherapy_show_date = isset($hypnotherapy_args['show_date']) ? (int) $hypnotherapy_args['show_date'] : 1;
$hypnotherapy_show_image = isset($hypnotherapy_args['show_image']) ? (int) $hypnotherapy_args['show_image'] : 1;
$hypnotherapy_show_author = isset($hypnotherapy_args['show_author']) ? (int) $hypnotherapy_args['show_author'] : 1;
$hypnotherapy_show_counters = isset($hypnotherapy_args['show_counters']) ? (int) $hypnotherapy_args['show_counters'] : 1;
$hypnotherapy_show_categories = isset($hypnotherapy_args['show_categories']) ? (int) $hypnotherapy_args['show_categories'] : 1;

$hypnotherapy_output = hypnotherapy_storage_get('hypnotherapy_output_widgets_posts');

$hypnotherapy_post_counters_output = '';
if ( $hypnotherapy_show_counters ) {
	$hypnotherapy_post_counters_output = '<span class="post_info_item post_info_counters">'
								. hypnotherapy_get_post_counters('comments')
							. '</span>';
}


$hypnotherapy_output .= '<article class="post_item with_thumb">';

if ($hypnotherapy_show_image) {
	$hypnotherapy_post_thumb = get_the_post_thumbnail($hypnotherapy_post_id, hypnotherapy_get_thumb_size('tiny'), array(
		'alt' => get_the_title()
	));
	if ($hypnotherapy_post_thumb) $hypnotherapy_output .= '<div class="post_thumb">' . ($hypnotherapy_post_link ? '<a href="' . esc_url($hypnotherapy_post_link) . '">' : '') . ($hypnotherapy_post_thumb) . ($hypnotherapy_post_link ? '</a>' : '') . '</div>';
}

$hypnotherapy_output .= '<div class="post_content">'
			. ($hypnotherapy_show_categories 
					? '<div class="post_categories">'
						. hypnotherapy_get_post_categories()
						. $hypnotherapy_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($hypnotherapy_post_link ? '<a href="' . esc_url($hypnotherapy_post_link) . '">' : '') . ($hypnotherapy_post_title) . ($hypnotherapy_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('hypnotherapy_filter_get_post_info', 
								'<div class="post_info">'
									. ($hypnotherapy_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($hypnotherapy_post_link ? '<a href="' . esc_url($hypnotherapy_post_link) . '" class="post_info_date">' : '') 
											. esc_html($hypnotherapy_post_date) 
											. ($hypnotherapy_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($hypnotherapy_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'hypnotherapy') . ' ' 
											. ($hypnotherapy_post_link ? '<a href="' . esc_url($hypnotherapy_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($hypnotherapy_post_author_name) 
											. ($hypnotherapy_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$hypnotherapy_show_categories && $hypnotherapy_post_counters_output
										? $hypnotherapy_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
hypnotherapy_storage_set('hypnotherapy_output_widgets_posts', $hypnotherapy_output);
?>