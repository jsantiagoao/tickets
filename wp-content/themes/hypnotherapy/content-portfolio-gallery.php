<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_blog_style = explode('_', hypnotherapy_get_theme_option('blog_style'));
$hypnotherapy_columns = empty($hypnotherapy_blog_style[1]) ? 2 : max(2, $hypnotherapy_blog_style[1]);
$hypnotherapy_post_format = get_post_format();
$hypnotherapy_post_format = empty($hypnotherapy_post_format) ? 'standard' : str_replace('post-format-', '', $hypnotherapy_post_format);
$hypnotherapy_animation = hypnotherapy_get_theme_option('blog_animation');
$hypnotherapy_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($hypnotherapy_columns).' post_format_'.esc_attr($hypnotherapy_post_format) ); ?>
	<?php echo (!hypnotherapy_is_off($hypnotherapy_animation) ? ' data-animation="'.esc_attr(hypnotherapy_get_animation_classes($hypnotherapy_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($hypnotherapy_image[1]) && !empty($hypnotherapy_image[2])) echo intval($hypnotherapy_image[1]) .'x' . intval($hypnotherapy_image[2]); ?>"
	data-src="<?php if (!empty($hypnotherapy_image[0])) echo esc_url($hypnotherapy_image[0]); ?>"
	>

	<?php
	$hypnotherapy_image_hover = 'icon';	//hypnotherapy_get_theme_option('image_hover');
	if (in_array($hypnotherapy_image_hover, array('icons', 'zoom'))) $hypnotherapy_image_hover = 'dots';
	// Featured image
	hypnotherapy_show_post_featured(array(
		'hover' => $hypnotherapy_image_hover,
		'thumb_size' => hypnotherapy_get_thumb_size( strpos(hypnotherapy_get_theme_option('body_style'), 'full')!==false || $hypnotherapy_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. hypnotherapy_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'hypnotherapy') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>