<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.10
 */

// Footer menu
$hypnotherapy_menu_footer = hypnotherapy_get_nav_menu('menu_footer');
if (!empty($hypnotherapy_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php hypnotherapy_show_layout($hypnotherapy_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>