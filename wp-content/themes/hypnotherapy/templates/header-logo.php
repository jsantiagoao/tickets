<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_args = get_query_var('hypnotherapy_logo_args');
get_bloginfo( 'name' );
// Site logo
$hypnotherapy_logo_image  = hypnotherapy_get_logo_image(isset($hypnotherapy_args['type']) ? $hypnotherapy_args['type'] : '');
$hypnotherapy_logo_text   = hypnotherapy_is_on(hypnotherapy_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
if(empty($hypnotherapy_logo_text)) $hypnotherapy_logo_text = get_bloginfo( 'name' );
$hypnotherapy_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($hypnotherapy_logo_image) || !empty($hypnotherapy_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($hypnotherapy_logo_image)) {
			$hypnotherapy_attr = hypnotherapy_getimagesize($hypnotherapy_logo_image);
			echo '<img src="'.esc_url($hypnotherapy_logo_image).'" alt=""'.(!empty($hypnotherapy_attr[3]) ? sprintf(' %s', $hypnotherapy_attr[3]) : '').'>' ;
		} else {
			hypnotherapy_show_layout(hypnotherapy_prepare_macros($hypnotherapy_logo_text), '<span class="logo_text">', '</span>');
			hypnotherapy_show_layout(hypnotherapy_prepare_macros($hypnotherapy_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>