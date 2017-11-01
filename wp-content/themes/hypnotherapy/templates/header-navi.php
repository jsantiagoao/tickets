<?php
/**
 * The template to display the main menu
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */
?>
<div class="top_panel_navi sc_layouts_row sc_layouts_row_type_compact sc_layouts_row_fixed
			scheme_<?php echo esc_attr(hypnotherapy_is_inherit(hypnotherapy_get_theme_option('menu_scheme')) 
												? (hypnotherapy_is_inherit(hypnotherapy_get_theme_option('header_scheme')) 
													? hypnotherapy_get_theme_option('color_scheme') 
													: hypnotherapy_get_theme_option('header_scheme')) 
												: hypnotherapy_get_theme_option('menu_scheme')); ?>">
	<div class="content_wrap">
		<div class="columns_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left column-1_4">
				<?php
				// Logo
				?><div class="sc_layouts_item"><?php
					get_template_part( 'templates/header-logo' );
				?></div>
			</div><?php
			
			// Attention! Don't place any spaces between columns!
			?><div class="sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left column-3_4">
				<div class="sc_layouts_item">
					<?php
					// Main menu
					$hypnotherapy_menu_main = hypnotherapy_get_nav_menu(array('location' => 'menu_main', 'class' => 'sc_layouts_hide_on_mobile'));
					if (empty($hypnotherapy_menu_main)) $hypnotherapy_menu_main = hypnotherapy_get_nav_menu(array('class' => 'sc_layouts_hide_on_mobile'));
					hypnotherapy_show_layout($hypnotherapy_menu_main);
					// Mobile menu button
					?>
					<div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button">
						<a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
							<span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
						</a>
					</div>
				</div><?php
			
				// Attention! Don't place any spaces between layouts items!
				?>
				<div class="sc_layouts_item">
					<?php
					// Display search field
					do_action('hypnotherapy_action_search', 'fullscreen', 'header_search', false);
					?>
				</div>			
			</div>
		</div><!-- /.sc_layouts_row -->
	</div><!-- /.content_wrap -->
</div><!-- /.top_panel_navi -->