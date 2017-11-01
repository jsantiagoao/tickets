<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

// Page (category, tag, archive, author) title


$hypnotherapy_header_image = get_header_image();
set_query_var('hypnotherapy_header_image', $hypnotherapy_header_image);

if ( hypnotherapy_need_page_title() ) {
	hypnotherapy_sc_layouts_showed('title', true);
	?>
	<div class="top_panel_title sc_layouts_row <?php echo !empty($hypnotherapy_header_image) || !empty($hypnotherapy_header_video) ? ' with_bg_image' : ' without_bg_image';if ($hypnotherapy_header_image!='') echo ' '.esc_attr(hypnotherapy_add_inline_style('background-image: url('.esc_url($hypnotherapy_header_image).');'));?>">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title">
						<?php
						// Post meta on the single post
						if ( is_single() )  {
							?><div class="sc_layouts_title_meta"><?php
								hypnotherapy_show_post_meta(array(
									'seo' => true,
									'share' => false,
									'counters' => ''
									)
								);
							?></div><?php
						}
						
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$hypnotherapy_blog_title = hypnotherapy_get_blog_title();
							$hypnotherapy_blog_title_text = $hypnotherapy_blog_title_class = $hypnotherapy_blog_title_link = $hypnotherapy_blog_title_link_text = '';
							if (is_array($hypnotherapy_blog_title)) {
								$hypnotherapy_blog_title_text = $hypnotherapy_blog_title['text'];
								$hypnotherapy_blog_title_class = !empty($hypnotherapy_blog_title['class']) ? ' '.$hypnotherapy_blog_title['class'] : '';
								$hypnotherapy_blog_title_link = !empty($hypnotherapy_blog_title['link']) ? $hypnotherapy_blog_title['link'] : '';
								$hypnotherapy_blog_title_link_text = !empty($hypnotherapy_blog_title['link_text']) ? $hypnotherapy_blog_title['link_text'] : '';
							} else
								$hypnotherapy_blog_title_text = $hypnotherapy_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($hypnotherapy_blog_title_class); ?>"><?php
								$hypnotherapy_top_icon = hypnotherapy_get_category_icon();
								if (!empty($hypnotherapy_top_icon)) {
									$hypnotherapy_attr = hypnotherapy_getimagesize($hypnotherapy_top_icon);
									?><img src="<?php echo esc_url($hypnotherapy_top_icon); ?>" alt="" <?php if (!empty($hypnotherapy_attr[3])) hypnotherapy_show_layout($hypnotherapy_attr[3]);?>><?php
								}
								echo wp_kses_data($hypnotherapy_blog_title_text);
							?></h1>
							<?php
							if (!empty($hypnotherapy_blog_title_link) && !empty($hypnotherapy_blog_title_link_text)) {
								?><a href="<?php echo esc_url($hypnotherapy_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($hypnotherapy_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'hypnotherapy_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>