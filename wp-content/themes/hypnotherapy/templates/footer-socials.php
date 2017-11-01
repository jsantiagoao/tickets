<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.10
 */


// Socials
if ( hypnotherapy_is_on(hypnotherapy_get_theme_option('socials_in_footer')) && ($hypnotherapy_output = hypnotherapy_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php hypnotherapy_show_layout($hypnotherapy_output); ?>
		</div>
	</div>
	<?php
}
?>