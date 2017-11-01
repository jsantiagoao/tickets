<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.10
 */

// Footer sidebar
$hypnotherapy_footer_name = hypnotherapy_get_theme_option('footer_widgets');
$hypnotherapy_footer_present = !hypnotherapy_is_off($hypnotherapy_footer_name) && is_active_sidebar($hypnotherapy_footer_name);
if ($hypnotherapy_footer_present) { 
	hypnotherapy_storage_set('current_sidebar', 'footer');
	$hypnotherapy_footer_wide = hypnotherapy_get_theme_option('footer_wide');
	ob_start();
	if ( !dynamic_sidebar($hypnotherapy_footer_name) ) {
		// Put here html if user no set widgets in sidebar
	}
	$hypnotherapy_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($hypnotherapy_out)) != '') {
		$hypnotherapy_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $hypnotherapy_out);
		$hypnotherapy_need_columns = true;	//or check: strpos($hypnotherapy_out, 'columns_wrap')===false;
		if ($hypnotherapy_need_columns) {
			$hypnotherapy_columns = max(0, (int) hypnotherapy_get_theme_option('footer_columns'));
			if ($hypnotherapy_columns == 0) $hypnotherapy_columns = min(6, max(1, substr_count($hypnotherapy_out, '<aside ')));
			if ($hypnotherapy_columns > 1)
				$hypnotherapy_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($hypnotherapy_columns).' widget ', $hypnotherapy_out);
			else
				$hypnotherapy_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($hypnotherapy_footer_wide) ? ' footer_fullwidth' : ''; ?>">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$hypnotherapy_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($hypnotherapy_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'hypnotherapy_action_before_sidebar' );
				hypnotherapy_show_layout($hypnotherapy_out);
				do_action( 'hypnotherapy_action_after_sidebar' );
				if ($hypnotherapy_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$hypnotherapy_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>