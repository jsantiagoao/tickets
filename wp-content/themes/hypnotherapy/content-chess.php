<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_blog_style = explode('_', hypnotherapy_get_theme_option('blog_style'));
$hypnotherapy_columns = empty($hypnotherapy_blog_style[1]) ? 1 : max(1, $hypnotherapy_blog_style[1]);
$hypnotherapy_expanded = !hypnotherapy_sidebar_present() && hypnotherapy_is_on(hypnotherapy_get_theme_option('expand_content'));
$hypnotherapy_post_format = get_post_format();
$hypnotherapy_post_format = empty($hypnotherapy_post_format) ? 'standard' : str_replace('post-format-', '', $hypnotherapy_post_format);
$hypnotherapy_animation = hypnotherapy_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($hypnotherapy_columns).' post_format_'.esc_attr($hypnotherapy_post_format) ); ?>
	<?php echo (!hypnotherapy_is_off($hypnotherapy_animation) ? ' data-animation="'.esc_attr(hypnotherapy_get_animation_classes($hypnotherapy_animation)).'"' : ''); ?>
	>

	<?php
	// Add anchor
	if ($hypnotherapy_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.esc_attr(get_the_title()).'"]');
	}

	// Featured image
	hypnotherapy_show_post_featured( array(
											'class' => $hypnotherapy_columns == 1 ? 'trx-stretch-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => hypnotherapy_get_thumb_size(
																	strpos(hypnotherapy_get_theme_option('body_style'), 'full')!==false
																		? ( $hypnotherapy_columns > 1 ? 'huge' : 'original' )
																		: (	$hypnotherapy_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('hypnotherapy_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('hypnotherapy_action_before_post_meta'); 

			// Post meta
			$hypnotherapy_post_meta = hypnotherapy_show_post_meta(array(
									'categories' => $hypnotherapy_columns < 2,
									'date' => true,
									'edit' => $hypnotherapy_columns == 1,
									'seo' => false,
									'share' => false,
									'counters' => $hypnotherapy_columns < 3 ? 'comments' : '',
									'echo' => false
									)
								);
			hypnotherapy_show_layout($hypnotherapy_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$hypnotherapy_show_learn_more = !in_array($hypnotherapy_post_format, array('link', 'aside', 'status', 'quote'));
				if (has_excerpt()) {
					the_excerpt();
				} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
					the_content( '' );
				} else if (in_array($hypnotherapy_post_format, array('link', 'aside', 'status', 'quote'))) {
					the_content();
				} else if (substr(get_the_content(), 0, 1)!='[') {
					the_excerpt();
				}
				?>
			</div>
			<?php
			// Post meta
			if (in_array($hypnotherapy_post_format, array('link', 'aside', 'status', 'quote'))) {
				hypnotherapy_show_layout($hypnotherapy_post_meta);
			}
			// More button
			if ( $hypnotherapy_show_learn_more ) {
				?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'hypnotherapy'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>