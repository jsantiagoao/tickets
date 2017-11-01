<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.10
 */

// Logo
if (hypnotherapy_is_on(hypnotherapy_get_theme_option('logo_in_footer'))) {
	$hypnotherapy_logo_image = '';
	if (hypnotherapy_get_retina_multiplier(2) > 1)
		$hypnotherapy_logo_image = hypnotherapy_get_theme_option( 'logo_footer_retina' );
	if (empty($hypnotherapy_logo_image)) 
		$hypnotherapy_logo_image = hypnotherapy_get_theme_option( 'logo_footer' );
	$hypnotherapy_logo_text   = get_bloginfo( 'name' );
	if (!empty($hypnotherapy_logo_image) || !empty($hypnotherapy_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($hypnotherapy_logo_image)) {
					$hypnotherapy_attr = hypnotherapy_getimagesize($hypnotherapy_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($hypnotherapy_logo_image).'" class="logo_footer_image" alt=""'.(!empty($hypnotherapy_attr[3]) ? sprintf(' %s', $hypnotherapy_attr[3]) : '').'></a>' ;
				} else if (!empty($hypnotherapy_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($hypnotherapy_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>