<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

// Header sidebar
$hypnotherapy_header_name = hypnotherapy_get_theme_option('header_widgets');
$hypnotherapy_header_present = !hypnotherapy_is_off($hypnotherapy_header_name) && is_active_sidebar($hypnotherapy_header_name);
if ($hypnotherapy_header_present) { 
	hypnotherapy_storage_set('current_sidebar', 'header');
	$hypnotherapy_header_wide = hypnotherapy_get_theme_option('header_wide');
	ob_start();
	if ( !dynamic_sidebar($hypnotherapy_header_name) ) {
		// Put here html if user no set widgets in sidebar
	}
	$hypnotherapy_widgets_output = ob_get_contents();
	ob_end_clean();
	if (trim(strip_tags($hypnotherapy_widgets_output)) != '') {
		$hypnotherapy_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $hypnotherapy_widgets_output);
		$hypnotherapy_need_columns = strpos($hypnotherapy_widgets_output, 'columns_wrap')===false;
		if ($hypnotherapy_need_columns) {
			$hypnotherapy_columns = max(0, (int) hypnotherapy_get_theme_option('header_columns'));
			if ($hypnotherapy_columns == 0) $hypnotherapy_columns = min(6, max(1, substr_count($hypnotherapy_widgets_output, '<aside ')));
			if ($hypnotherapy_columns > 1)
				$hypnotherapy_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($hypnotherapy_columns).' widget ', $hypnotherapy_widgets_output);
			else
				$hypnotherapy_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($hypnotherapy_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$hypnotherapy_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($hypnotherapy_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'hypnotherapy_action_before_sidebar' );
				hypnotherapy_show_layout($hypnotherapy_widgets_output);
				do_action( 'hypnotherapy_action_after_sidebar' );
				if ($hypnotherapy_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$hypnotherapy_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>