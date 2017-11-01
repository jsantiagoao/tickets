<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

hypnotherapy_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'classie', hypnotherapy_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'imagesloaded', hypnotherapy_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
wp_enqueue_script( 'masonry', hypnotherapy_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
wp_enqueue_script( 'hypnotherapy-gallery-script', hypnotherapy_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$hypnotherapy_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$hypnotherapy_sticky_out = is_array($hypnotherapy_stickies) && count($hypnotherapy_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$hypnotherapy_cat = hypnotherapy_get_theme_option('parent_cat');
	$hypnotherapy_post_type = hypnotherapy_get_theme_option('post_type');
	$hypnotherapy_taxonomy = hypnotherapy_get_post_type_taxonomy($hypnotherapy_post_type);
	$hypnotherapy_show_filters = hypnotherapy_get_theme_option('show_filters');
	$hypnotherapy_tabs = array();
	if (!hypnotherapy_is_off($hypnotherapy_show_filters)) {
		$hypnotherapy_args = array(
			'type'			=> $hypnotherapy_post_type,
			'child_of'		=> $hypnotherapy_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $hypnotherapy_taxonomy,
			'pad_counts'	=> false
		);
		$hypnotherapy_portfolio_list = get_terms($hypnotherapy_args);
		if (is_array($hypnotherapy_portfolio_list) && count($hypnotherapy_portfolio_list) > 0) {
			$hypnotherapy_tabs[$hypnotherapy_cat] = esc_html__('All', 'hypnotherapy');
			foreach ($hypnotherapy_portfolio_list as $hypnotherapy_term) {
				if (isset($hypnotherapy_term->term_id)) $hypnotherapy_tabs[$hypnotherapy_term->term_id] = $hypnotherapy_term->name;
			}
		}
	}
	if (count($hypnotherapy_tabs) > 0) {
		$hypnotherapy_portfolio_filters_ajax = true;
		$hypnotherapy_portfolio_filters_active = $hypnotherapy_cat;
		$hypnotherapy_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters hypnotherapy_tabs hypnotherapy_tabs_ajax">
			<ul class="portfolio_titles hypnotherapy_tabs_titles">
				<?php
				foreach ($hypnotherapy_tabs as $hypnotherapy_id=>$hypnotherapy_title) {
					?><li><a href="<?php echo esc_url(hypnotherapy_get_hash_link(sprintf('#%s_%s_content', $hypnotherapy_portfolio_filters_id, $hypnotherapy_id))); ?>" data-tab="<?php echo esc_attr($hypnotherapy_id); ?>"><?php echo esc_html($hypnotherapy_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$hypnotherapy_ppp = hypnotherapy_get_theme_option('posts_per_page');
			if (hypnotherapy_is_inherit($hypnotherapy_ppp)) $hypnotherapy_ppp = '';
			foreach ($hypnotherapy_tabs as $hypnotherapy_id=>$hypnotherapy_title) {
				$hypnotherapy_portfolio_need_content = $hypnotherapy_id==$hypnotherapy_portfolio_filters_active || !$hypnotherapy_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $hypnotherapy_portfolio_filters_id, $hypnotherapy_id)); ?>"
					class="portfolio_content hypnotherapy_tabs_content"
					data-blog-template="<?php echo esc_attr(hypnotherapy_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(hypnotherapy_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($hypnotherapy_ppp); ?>"
					data-post-type="<?php echo esc_attr($hypnotherapy_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($hypnotherapy_taxonomy); ?>"
					data-cat="<?php echo esc_attr($hypnotherapy_id); ?>"
					data-parent-cat="<?php echo esc_attr($hypnotherapy_cat); ?>"
					data-need-content="<?php echo (false===$hypnotherapy_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($hypnotherapy_portfolio_need_content) 
						hypnotherapy_show_portfolio_posts(array(
							'cat' => $hypnotherapy_id,
							'parent_cat' => $hypnotherapy_cat,
							'taxonomy' => $hypnotherapy_taxonomy,
							'post_type' => $hypnotherapy_post_type,
							'page' => 1,
							'sticky' => $hypnotherapy_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		hypnotherapy_show_portfolio_posts(array(
			'cat' => $hypnotherapy_cat,
			'parent_cat' => $hypnotherapy_cat,
			'taxonomy' => $hypnotherapy_taxonomy,
			'post_type' => $hypnotherapy_post_type,
			'page' => 1,
			'sticky' => $hypnotherapy_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>