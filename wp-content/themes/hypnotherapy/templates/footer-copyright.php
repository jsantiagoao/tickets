<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0.10
 */

// Copyright area
$hypnotherapy_footer_scheme =  hypnotherapy_is_inherit(hypnotherapy_get_theme_option('footer_scheme')) ? hypnotherapy_get_theme_option('color_scheme') : hypnotherapy_get_theme_option('footer_scheme');
$hypnotherapy_copyright_scheme = hypnotherapy_is_inherit(hypnotherapy_get_theme_option('copyright_scheme')) ? $hypnotherapy_footer_scheme : hypnotherapy_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($hypnotherapy_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				$hypnotherapy_copyright = hypnotherapy_prepare_macros(hypnotherapy_get_theme_option('copyright'));
				if (!empty($hypnotherapy_copyright)) {
					if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $hypnotherapy_copyright, $hypnotherapy_matches)) {
						$hypnotherapy_copyright = str_replace($hypnotherapy_matches[1], date(str_replace(array('{', '}'), '', $hypnotherapy_matches[1])), $hypnotherapy_copyright);
					}
					hypnotherapy_show_layout(nl2br($hypnotherapy_copyright));
				}
			?></div>
		</div>
	</div>
</div>
