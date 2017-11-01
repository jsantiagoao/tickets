<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.14
 */
$hypnotherapy_header_video = hypnotherapy_get_header_video();
if (!empty($hypnotherapy_header_video) && !hypnotherapy_is_from_uploads($hypnotherapy_header_video)) {
	global $wp_embed;
	if (is_object($wp_embed))
		$hypnotherapy_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($hypnotherapy_header_video) . '[/embed]' ));
	$hypnotherapy_embed_video = hypnotherapy_make_video_autoplay($hypnotherapy_embed_video);
	?><div id="background_video"><?php hypnotherapy_show_layout($hypnotherapy_embed_video); ?></div><?php
}
?>