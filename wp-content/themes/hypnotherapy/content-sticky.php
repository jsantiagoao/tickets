<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$hypnotherapy_post_format = get_post_format();
$hypnotherapy_post_format = empty($hypnotherapy_post_format) ? 'standard' : str_replace('post-format-', '', $hypnotherapy_post_format);
$hypnotherapy_animation = hypnotherapy_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($hypnotherapy_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($hypnotherapy_post_format) ); ?>
	<?php echo (!hypnotherapy_is_off($hypnotherapy_animation) ? ' data-animation="'.esc_attr(hypnotherapy_get_animation_classes($hypnotherapy_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	hypnotherapy_show_post_featured(array(
		'thumb_size' => hypnotherapy_get_thumb_size($hypnotherapy_columns==1 ? 'big' : ($hypnotherapy_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($hypnotherapy_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			hypnotherapy_show_post_meta();
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div>