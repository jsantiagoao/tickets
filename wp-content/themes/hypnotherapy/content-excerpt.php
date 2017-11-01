<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_post_format = get_post_format();
$hypnotherapy_post_format = empty($hypnotherapy_post_format) ? 'standard' : str_replace('post-format-', '', $hypnotherapy_post_format);
$hypnotherapy_full_content = hypnotherapy_get_theme_option('blog_content') != 'excerpt' || in_array($hypnotherapy_post_format, array('link', 'aside', 'status', 'quote'));
$hypnotherapy_animation = hypnotherapy_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($hypnotherapy_post_format) ); ?>
	<?php echo (!hypnotherapy_is_off($hypnotherapy_animation) ? ' data-animation="'.esc_attr(hypnotherapy_get_animation_classes($hypnotherapy_animation)).'"' : ''); ?>
	><?php

	// Title and post meta
	if (get_the_title() != '') {
		?>
		<div class="post_header entry-header">
			<?php
			do_action('hypnotherapy_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('hypnotherapy_action_before_post_meta'); 

			// Post meta
			hypnotherapy_show_post_meta(array(
				'categories' => true,
				'date' => true,
				'edit' => true,
				'seo' => false,
				'share' => false,
				'counters' => ''	//comments,likes,views - comma separated in any combination
				)
			);
			?>
		</div><!-- .post_header --><?php
	}

		// Featured image
	hypnotherapy_show_post_featured(array( 'thumb_size' => hypnotherapy_get_thumb_size( strpos(hypnotherapy_get_theme_option('body_style'), 'full')!==false ? 'full' : 'big' ) ));

	
	// Post content
	?><div class="post_content entry-content"><?php
		if ($hypnotherapy_full_content) {
			// Post content area
			?><div class="post_content_inner"><?php
				the_content( '' );
			?></div><?php
			// Inner pages
			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'hypnotherapy' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'hypnotherapy' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		} else {

			$hypnotherapy_show_learn_more = !in_array($hypnotherapy_post_format, array('link', 'aside', 'status', 'quote'));

			// Post content area
			?><div class="post_content_inner"><?php
				if (has_excerpt()) {
					the_excerpt();
				} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
					the_content( '' );
				} else if (in_array($hypnotherapy_post_format, array('link', 'aside', 'status', 'quote'))) {
					the_content();
				} else if (substr(get_the_content(), 0, 1)!='[') {
					the_excerpt();
				}
			?></div><?php
			// More button
			if ( $hypnotherapy_show_learn_more ) {
				?><div class="sc_item_button "><a class="sc_button sc_button_default " href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'hypnotherapy'); ?></a></div><?php
			}

		}
	?></div><!-- .entry-content -->
</article>