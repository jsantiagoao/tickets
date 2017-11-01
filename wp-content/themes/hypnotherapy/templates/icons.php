<?php
/**
 * The template to displaying popup with Theme Icons
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

$hypnotherapy_icons = hypnotherapy_get_list_icons();
if (is_array($hypnotherapy_icons)) {
	?>
	<div class="hypnotherapy_list_icons">
		<?php
		foreach($hypnotherapy_icons as $icon) {
			?><span class="<?php echo esc_attr($icon); ?>" title="<?php echo esc_attr($icon); ?>"></span><?php
		}
		?>
	</div>
	<?php
}
?>