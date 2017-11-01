<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.10
 */

$hypnotherapy_footer_scheme =  hypnotherapy_is_inherit(hypnotherapy_get_theme_option('footer_scheme')) ? hypnotherapy_get_theme_option('color_scheme') : hypnotherapy_get_theme_option('footer_scheme');
$hypnotherapy_footer_id = str_replace('footer-custom-', '', hypnotherapy_get_theme_option("footer_style"));
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($hypnotherapy_footer_id); ?> scheme_<?php echo esc_attr($hypnotherapy_footer_scheme); ?>">
	<div class="content_wrap">
	<?php
    // Custom footer's layout
    do_action('hypnotherapy_action_show_layout', $hypnotherapy_footer_id);
	?>
	</div>
</footer><!-- /.footer_wrap -->
