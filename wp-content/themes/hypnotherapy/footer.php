<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

						// Widgets area inside page content
						hypnotherapy_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					hypnotherapy_create_widgets_area('widgets_below_page');

					$hypnotherapy_body_style = hypnotherapy_get_theme_option('body_style');
					if ($hypnotherapy_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$hypnotherapy_footer_style = hypnotherapy_get_theme_option("footer_style");
			if (strpos($hypnotherapy_footer_style, 'footer-custom-')===0) $hypnotherapy_footer_style = 'footer-custom';
			get_template_part( "templates/{$hypnotherapy_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (hypnotherapy_is_on(hypnotherapy_get_theme_option('debug_mode')) && file_exists(hypnotherapy_get_file_dir('images/makeup.jpg'))) { ?>
		<img src="<?php echo esc_url(hypnotherapy_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>