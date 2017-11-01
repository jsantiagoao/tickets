<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_sidebar_position = hypnotherapy_get_theme_option('sidebar_position');
if (hypnotherapy_sidebar_present()) {
	ob_start();
	$hypnotherapy_sidebar_name = hypnotherapy_get_theme_option('sidebar_widgets');
	hypnotherapy_storage_set('current_sidebar', 'sidebar');
	if ( !dynamic_sidebar($hypnotherapy_sidebar_name) ) {
		// Put here html if user no set widgets in sidebar
	}
	$hypnotherapy_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($hypnotherapy_out)) != '') {
		?>
		<div class="sidebar <?php echo esc_attr($hypnotherapy_sidebar_position); ?> widget_area<?php if (!hypnotherapy_is_inherit(hypnotherapy_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(hypnotherapy_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'hypnotherapy_action_before_sidebar' );
				hypnotherapy_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $hypnotherapy_out));
				do_action( 'hypnotherapy_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>