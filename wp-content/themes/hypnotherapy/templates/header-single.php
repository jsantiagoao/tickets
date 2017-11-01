<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

if ( get_query_var('hypnotherapy_header_image')=='' && is_singular() && has_post_thumbnail() && in_array(get_post_type(), array('post', 'page')) )  {
	$hypnotherapy_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if (!empty($hypnotherapy_src[0])) {
		hypnotherapy_sc_layouts_showed('featured', true);
		?><div class="sc_layouts_featured <?php echo esc_attr(hypnotherapy_add_inline_style('background-image:url('.esc_url($hypnotherapy_src[0]).');')); ?>"></div><?php
	}
}
?>