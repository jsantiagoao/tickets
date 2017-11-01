<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

get_header();

while ( have_posts() ) { the_post();

	get_template_part( 'content', get_post_format() );

	
	if ( hypnotherapy_get_theme_option('show_related_post')){
	// Related posts.
		hypnotherapy_show_related_posts(array('orderby' => 'rand',
			'posts_per_page' => max(2, min(4, hypnotherapy_get_theme_option('related_posts')))
			),
		hypnotherapy_get_theme_option('related_style')
		);
	}
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>