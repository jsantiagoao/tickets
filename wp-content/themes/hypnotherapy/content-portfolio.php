<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($hypnotherapy_columns).' post_format_'.esc_attr($hypnotherapy_post_format) ); ?>
	<?php echo (!hypnotherapy_is_off($hypnotherapy_animation) ? ' data-animation="'.esc_attr(hypnotherapy_get_animation_classes($hypnotherapy_animation)).'"' : ''); ?>
	>

	<?php
	$hypnotherapy_image_hover = hypnotherapy_get_theme_option('image_hover');
	// Featured image
	hypnotherapy_show_post_featured(array(
		'thumb_size' => hypnotherapy_get_thumb_size(strpos(hypnotherapy_get_theme_option('body_style'), 'full')!==false || $hypnotherapy_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $hypnotherapy_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $hypnotherapy_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>