<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('hypnotherapy_woocommerce_theme_setup1')) {
	add_action( 'after_setup_theme', 'hypnotherapy_woocommerce_theme_setup1', 1 );
	function hypnotherapy_woocommerce_theme_setup1() {
		add_filter( 'hypnotherapy_filter_list_sidebars', 	'hypnotherapy_woocommerce_list_sidebars' );
		add_filter( 'hypnotherapy_filter_list_posts_types',	'hypnotherapy_woocommerce_list_post_types');
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('hypnotherapy_woocommerce_theme_setup3')) {
	add_action( 'after_setup_theme', 'hypnotherapy_woocommerce_theme_setup3', 3 );
	function hypnotherapy_woocommerce_theme_setup3() {
		if (hypnotherapy_exists_woocommerce()) {
			hypnotherapy_storage_merge_array('options', '', array(
				// Section 'WooCommerce' - settings for show pages
				'shop' => array(
					"title" => esc_html__('Shop', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select parameters to display the shop pages', 'hypnotherapy') ),
					"type" => "section"
					),
				'expand_content_shop' => array(
					"title" => esc_html__('Expand content', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'hypnotherapy') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
				'blog_columns_shop' => array(
					"title" => esc_html__('Shop loop columns', 'hypnotherapy'),
					"desc" => wp_kses_data( __('How many columns should be used in the shop loop (from 2 to 4)?', 'hypnotherapy') ),
					"std" => 2,
					"options" => hypnotherapy_get_list_range(2,4),
					"type" => "select"
					),
				'related_posts_shop' => array(
					"title" => esc_html__('Related products', 'hypnotherapy'),
					"desc" => wp_kses_data( __('How many related products should be displayed in the single product page  (from 2 to 4)?', 'hypnotherapy') ),
					"std" => 2,
					"options" => hypnotherapy_get_list_range(2,4),
					"type" => "select"
					),
				'shop_mode' => array(
					"title" => esc_html__('Shop mode', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select style for the products list', 'hypnotherapy') ),
					"std" => 'thumbs',
					"options" => array(
						'thumbs'=> esc_html__('Thumbnails', 'hypnotherapy'),
						'list'	=> esc_html__('List', 'hypnotherapy'),
					),
					"type" => "select"
					),
				'shop_hover' => array(
					"title" => esc_html__('Hover style', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Hover style on the products in the shop archive', 'hypnotherapy') ),
					"std" => 'shop',
					"options" => apply_filters('hypnotherapy_filter_shop_hover', array(
						'none' => esc_html__('None', 'hypnotherapy'),
						'shop' => esc_html__('Icons', 'hypnotherapy'),
						'shop_buttons' => esc_html__('Buttons', 'hypnotherapy')
					)),
					"type" => "select"
					),
				'header_widgets_shop' => array(
					"title" => esc_html__('Header widgets', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on the shop pages', 'hypnotherapy') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
					"type" => "select"
					),
				'sidebar_widgets_shop' => array(
					"title" => esc_html__('Sidebar widgets', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select sidebar to show on the shop pages', 'hypnotherapy') ),
					"std" => 'woocommerce_widgets',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
					"type" => "select"
					),
				'sidebar_position_shop' => array(
					"title" => esc_html__('Sidebar position', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select position to show sidebar on the shop pages', 'hypnotherapy') ),
					"refresh" => false,
					"std" => 'left',
					"options" => hypnotherapy_get_list_sidebars_positions(),
					"type" => "select"
					),
				'widgets_above_page_shop' => array(
					"title" => esc_html__('Widgets above the page', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'hypnotherapy') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_above_content_shop' => array(
					"title" => esc_html__('Widgets above the content', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'hypnotherapy') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_below_content_shop' => array(
					"title" => esc_html__('Widgets below the content', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'hypnotherapy') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_below_page_shop' => array(
					"title" => esc_html__('Widgets below the page', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'hypnotherapy') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
					"type" => "select"
					),
				'footer_scheme_shop' => array(
					"title" => esc_html__('Footer Color Scheme', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'hypnotherapy') ),
					"std" => 'dark',
					"options" => hypnotherapy_get_list_schemes(true),
					"type" => "select"
					),
				'footer_widgets_shop' => array(
					"title" => esc_html__('Footer widgets', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'hypnotherapy') ),
					"std" => 'footer_widgets',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
					"type" => "select"
					),
				'footer_columns_shop' => array(
					"title" => esc_html__('Footer columns', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'hypnotherapy') ),
					"dependency" => array(
						'footer_widgets_shop' => array('^hide')
					),
					"std" => 0,
					"options" => hypnotherapy_get_list_range(0,6),
					"type" => "select"
					),
				'footer_wide_shop' => array(
					"title" => esc_html__('Footer fullwide', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'hypnotherapy') ),
					"std" => 0,
					"type" => "checkbox"
					)
				)
			);
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hypnotherapy_woocommerce_theme_setup9')) {
	add_action( 'after_setup_theme', 'hypnotherapy_woocommerce_theme_setup9', 9 );
	function hypnotherapy_woocommerce_theme_setup9() {
		
		if (hypnotherapy_exists_woocommerce()) {
			add_action( 'wp_enqueue_scripts', 								'hypnotherapy_woocommerce_frontend_scripts', 1100 );
			add_filter( 'hypnotherapy_filter_merge_styles',						'hypnotherapy_woocommerce_merge_styles' );
			add_filter( 'hypnotherapy_filter_get_css',							'hypnotherapy_woocommerce_get_css', 10, 4 );
			add_filter( 'hypnotherapy_filter_get_post_info',		 				'hypnotherapy_woocommerce_get_post_info');
			add_filter( 'hypnotherapy_filter_post_type_taxonomy',				'hypnotherapy_woocommerce_post_type_taxonomy', 10, 2 );
			if (!is_admin()) {
				add_filter( 'hypnotherapy_filter_detect_blog_mode',				'hypnotherapy_woocommerce_detect_blog_mode' );
				add_filter( 'hypnotherapy_filter_sidebar_present',				'hypnotherapy_woocommerce_sidebar_present' );
				add_filter( 'hypnotherapy_filter_get_post_categories', 			'hypnotherapy_woocommerce_get_post_categories');
				add_filter( 'hypnotherapy_filter_allow_override_header_image',	'hypnotherapy_woocommerce_allow_override_header_image' );
				add_action( 'hypnotherapy_action_before_post_meta',				'hypnotherapy_woocommerce_action_before_post_meta');
			}
		}
		if (is_admin()) {
			add_filter( 'hypnotherapy_filter_tgmpa_required_plugins',			'hypnotherapy_woocommerce_tgmpa_required_plugins' );
		}

		// Add wrappers and classes to the standard WooCommerce output
		if (hypnotherapy_exists_woocommerce()) {

			// Remove WOOC sidebar
			remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );

			// Remove link around product item
			remove_action('woocommerce_before_shop_loop_item',			'woocommerce_template_loop_product_link_open', 10);
			remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_product_link_close', 5);

			// Remove add_to_cart button
			//remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_add_to_cart', 10);
			
			// Remove link around product category
			remove_action('woocommerce_before_subcategory',				'woocommerce_template_loop_category_link_open', 10);
			remove_action('woocommerce_after_subcategory',				'woocommerce_template_loop_category_link_close', 10);
			
			// Open main content wrapper - <article>
			remove_action( 'woocommerce_before_main_content',			'woocommerce_output_content_wrapper', 10);
			add_action(    'woocommerce_before_main_content',			'hypnotherapy_woocommerce_wrapper_start', 10);
			// Close main content wrapper - </article>
			remove_action( 'woocommerce_after_main_content',			'woocommerce_output_content_wrapper_end', 10);		
			add_action(    'woocommerce_after_main_content',			'hypnotherapy_woocommerce_wrapper_end', 10);

			// Close header section
			add_action(    'woocommerce_archive_description',			'hypnotherapy_woocommerce_archive_description', 15 );

			// Add theme specific search form
			add_filter(    'get_product_search_form',					'hypnotherapy_woocommerce_get_product_search_form' );

			// Change text on 'Add to cart' button
			add_filter(    'woocommerce_product_add_to_cart_text',		'hypnotherapy_woocommerce_add_to_cart_text' );
			add_filter(    'woocommerce_product_single_add_to_cart_text','hypnotherapy_woocommerce_add_to_cart_text' );

			// Add list mode buttons
			add_action(    'woocommerce_before_shop_loop', 				'hypnotherapy_woocommerce_before_shop_loop', 10 );

			// Set columns number for the products loop
			add_filter(    'loop_shop_columns',							'hypnotherapy_woocommerce_loop_shop_columns' );
			add_filter(    'post_class',								'hypnotherapy_woocommerce_loop_shop_columns_class' );
			add_filter(    'product_cat_class',							'hypnotherapy_woocommerce_loop_shop_columns_class', 10, 3 );
			// Open product/category item wrapper
			add_action(    'woocommerce_before_subcategory_title',		'hypnotherapy_woocommerce_item_wrapper_start', 9 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'hypnotherapy_woocommerce_item_wrapper_start', 9 );
			// Close featured image wrapper and open title wrapper
			add_action(    'woocommerce_before_subcategory_title',		'hypnotherapy_woocommerce_title_wrapper_start', 20 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'hypnotherapy_woocommerce_title_wrapper_start', 20 );

			// Wrap product title into link
			add_action(    'the_title',									'hypnotherapy_woocommerce_the_title');
			// Wrap category title into link
			add_action(		'woocommerce_shop_loop_subcategory_title',  'hypnotherapy_woocommerce_shop_loop_subcategory_title', 9, 1);

			// Close title wrapper and add description in the list mode
			add_action(    'woocommerce_after_shop_loop_item_title',	'hypnotherapy_woocommerce_title_wrapper_end', 7);
			add_action(    'woocommerce_after_subcategory_title',		'hypnotherapy_woocommerce_title_wrapper_end2', 10 );
			// Close product/category item wrapper
			add_action(    'woocommerce_after_subcategory',				'hypnotherapy_woocommerce_item_wrapper_end', 20 );
			add_action(    'woocommerce_after_shop_loop_item',			'hypnotherapy_woocommerce_item_wrapper_end', 20 );

			// Add product ID into product meta section (after categories and tags)
			add_action(    'woocommerce_product_meta_end',				'hypnotherapy_woocommerce_show_product_id', 10);
			
			// Set columns number for the product's thumbnails
			add_filter(    'woocommerce_product_thumbnails_columns',	'hypnotherapy_woocommerce_product_thumbnails_columns' );

			// Set columns number for the related products
			add_filter(    'woocommerce_output_related_products_args',	'hypnotherapy_woocommerce_output_related_products_args' );

			// Decorate price
			add_filter(    'woocommerce_get_price_html',				'hypnotherapy_woocommerce_get_price_html' );

	
			// Detect current shop mode
			if (!is_admin()) {
				$shop_mode = hypnotherapy_get_value_gpc('hypnotherapy_shop_mode');
				if (empty($shop_mode) && hypnotherapy_check_theme_option('shop_mode'))
					$shop_mode = hypnotherapy_get_theme_option('shop_mode');
				if (empty($shop_mode))
					$shop_mode = 'thumbs';
				hypnotherapy_storage_set('shop_mode', $shop_mode);
			}
		}
	}
}



// Check if WooCommerce installed and activated
if ( !function_exists( 'hypnotherapy_exists_woocommerce' ) ) {
	function hypnotherapy_exists_woocommerce() {
		return class_exists('Woocommerce');
		//return function_exists('is_woocommerce');
	}
}

// Return true, if current page is any woocommerce page
if ( !function_exists( 'hypnotherapy_is_woocommerce_page' ) ) {
	function hypnotherapy_is_woocommerce_page() {
		$rez = false;
		if (hypnotherapy_exists_woocommerce())
			$rez = is_woocommerce() || is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page();
		return $rez;
	}
}

// Detect current blog mode
if ( !function_exists( 'hypnotherapy_woocommerce_detect_blog_mode' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_detect_blog_mode', 'hypnotherapy_woocommerce_detect_blog_mode' );
	function hypnotherapy_woocommerce_detect_blog_mode($mode='') {
		if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy())
			$mode = 'shop';
		else if (is_product() || is_cart() || is_checkout() || is_account_page())
			$mode = 'shop';	//'shop_single';
		return $mode;
	}
}

// Return taxonomy for current post type
if ( !function_exists( 'hypnotherapy_woocommerce_post_type_taxonomy' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_post_type_taxonomy',	'hypnotherapy_woocommerce_post_type_taxonomy', 10, 2 );
	function hypnotherapy_woocommerce_post_type_taxonomy($tax='', $post_type='') {
		if ($post_type == 'product')
			$tax = 'product_cat';
		return $tax;
	}
}

// Return true if page title section is allowed
if ( !function_exists( 'hypnotherapy_woocommerce_allow_override_header_image' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_allow_override_header_image', 'hypnotherapy_woocommerce_allow_override_header_image' );
	function hypnotherapy_woocommerce_allow_override_header_image($allow=true) {
		return is_product() ? false : $allow;
	}
}

// Return shop page ID
if ( !function_exists( 'hypnotherapy_woocommerce_get_shop_page_id' ) ) {
	function hypnotherapy_woocommerce_get_shop_page_id() {
		return get_option('woocommerce_shop_page_id');
	}
}

// Return shop page link
if ( !function_exists( 'hypnotherapy_woocommerce_get_shop_page_link' ) ) {
	function hypnotherapy_woocommerce_get_shop_page_link() {
		$url = '';
		$id = hypnotherapy_woocommerce_get_shop_page_id();
		if ($id) $url = get_permalink($id);
		return $url;
	}
}

// Show categories of the current product
if ( !function_exists( 'hypnotherapy_woocommerce_get_post_categories' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_get_post_categories', 		'hypnotherapy_woocommerce_get_post_categories');
	function hypnotherapy_woocommerce_get_post_categories($cats='') {
		if (get_post_type()=='product') {
			$cats = hypnotherapy_get_post_terms(', ', get_the_ID(), 'product_cat');
		}
		return $cats;
	}
}

// Show categories of the team, courses, etc.
if ( !function_exists( 'hypnotherapy_woocommerce_list_post_types' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_list_posts_types', 'hypnotherapy_woocommerce_list_post_types');
	function hypnotherapy_woocommerce_list_post_types($list=array()) {
		$list['product'] = esc_html__('Products', 'hypnotherapy');
		return $list;
	}
}

// Show price of the current product in the widgets and search results
if ( !function_exists( 'hypnotherapy_woocommerce_get_post_info' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_get_post_info', 'hypnotherapy_woocommerce_get_post_info');
	function hypnotherapy_woocommerce_get_post_info($post_info='') {
		if (get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				$post_info = '<div class="post_price product_price price">' . trim($price_html) . '</div>' . $post_info;
			}
		}
		return $post_info;
	}
}

// Show price of the current product in the search results streampage
if ( !function_exists( 'hypnotherapy_woocommerce_action_before_post_meta' ) ) {
	//Handler of the add_action( 'hypnotherapy_action_before_post_meta', 'hypnotherapy_woocommerce_action_before_post_meta');
	function hypnotherapy_woocommerce_action_before_post_meta() {
		if (get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				?><div class="post_price product_price price"><?php hypnotherapy_show_layout($price_html); ?></div><?php
			}
		}
	}
}
	
// Enqueue WooCommerce custom styles
if ( !function_exists( 'hypnotherapy_woocommerce_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'hypnotherapy_woocommerce_frontend_scripts', 1100 );
	function hypnotherapy_woocommerce_frontend_scripts() {
		//if (hypnotherapy_is_woocommerce_page())
			if (hypnotherapy_is_on(hypnotherapy_get_theme_option('debug_mode')) && file_exists(hypnotherapy_get_file_dir('plugins/woocommerce/woocommerce.css')))
				wp_enqueue_style( 'hypnotherapy-woocommerce',  hypnotherapy_get_file_url('plugins/woocommerce/woocommerce.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'hypnotherapy_woocommerce_merge_styles' ) ) {
	//Handler of the add_filter('hypnotherapy_filter_merge_styles', 'hypnotherapy_woocommerce_merge_styles');
	function hypnotherapy_woocommerce_merge_styles($list) {
		$list[] = 'plugins/woocommerce/woocommerce.css';
		return $list;
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hypnotherapy_woocommerce_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('hypnotherapy_filter_tgmpa_required_plugins',	'hypnotherapy_woocommerce_tgmpa_required_plugins');
	function hypnotherapy_woocommerce_tgmpa_required_plugins($list=array()) {
		if (in_array('woocommerce', hypnotherapy_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('WooCommerce', 'hypnotherapy'),
					'slug' 		=> 'woocommerce',
					'required' 	=> false
				);

		return $list;
	}
}



// Add WooCommerce specific items into lists
//------------------------------------------------------------------------

// Add sidebar
if ( !function_exists( 'hypnotherapy_woocommerce_list_sidebars' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_list_sidebars', 'hypnotherapy_woocommerce_list_sidebars' );
	function hypnotherapy_woocommerce_list_sidebars($list=array()) {
		$list['woocommerce_widgets'] = array(
											'name' => esc_html__('WooCommerce Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown on the WooCommerce pages', 'hypnotherapy')
											);
		return $list;
	}
}




// Decorate WooCommerce output: Loop
//------------------------------------------------------------------------

// Before main content
if ( !function_exists( 'hypnotherapy_woocommerce_wrapper_start' ) ) {
	//remove_action( 'woocommerce_before_main_content', 'hypnotherapy_woocommerce_wrapper_start', 10);
	//Handler of the add_action('woocommerce_before_main_content', 'hypnotherapy_woocommerce_wrapper_start', 10);
	function hypnotherapy_woocommerce_wrapper_start() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			<article class="post_item_single post_type_product">
			<?php
		} else {
			?>
			<div class="list_products shop_mode_<?php echo !hypnotherapy_storage_empty('shop_mode') ? hypnotherapy_storage_get('shop_mode') : 'thumbs'; ?>">
				<div class="list_products_header">
			<?php
		}
	}
}

// After main content
if ( !function_exists( 'hypnotherapy_woocommerce_wrapper_end' ) ) {
	//remove_action( 'woocommerce_after_main_content', 'hypnotherapy_woocommerce_wrapper_end', 10);		
	//Handler of the add_action('woocommerce_after_main_content', 'hypnotherapy_woocommerce_wrapper_end', 10);
	function hypnotherapy_woocommerce_wrapper_end() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			</article><!-- /.post_item_single -->
			<?php
		} else {
			?>
			</div><!-- /.list_products -->
			<?php
		}
	}
}

// Close header section
if ( !function_exists( 'hypnotherapy_woocommerce_archive_description' ) ) {
	//Handler of the add_action( 'woocommerce_archive_description', 'hypnotherapy_woocommerce_archive_description', 15 );
	function hypnotherapy_woocommerce_archive_description() {
		?>
		</div><!-- /.list_products_header -->
		<?php
	}
}

// Add list mode buttons
if ( !function_exists( 'hypnotherapy_woocommerce_before_shop_loop' ) ) {
	//Handler of the add_action( 'woocommerce_before_shop_loop', 'hypnotherapy_woocommerce_before_shop_loop', 10 );
	function hypnotherapy_woocommerce_before_shop_loop() {
		?>
		<div class="hypnotherapy_shop_mode_buttons"><form action="<?php echo esc_url(hypnotherapy_get_current_url()); ?>" method="post"><input type="hidden" name="hypnotherapy_shop_mode" value="<?php echo esc_attr(hypnotherapy_storage_get('shop_mode')); ?>" /><a href="#" class="woocommerce_thumbs icon-th" title="<?php esc_attr_e('Show products as thumbs', 'hypnotherapy'); ?>"></a><a href="#" class="woocommerce_list icon-th-list" title="<?php esc_attr_e('Show products as list', 'hypnotherapy'); ?>"></a></form></div><!-- /.hypnotherapy_shop_mode_buttons -->
		<?php
	}
}

// Number of columns for the shop streampage
if ( !function_exists( 'hypnotherapy_woocommerce_loop_shop_columns' ) ) {
	//Handler of the add_filter( 'loop_shop_columns', 'hypnotherapy_woocommerce_loop_shop_columns' );
	function hypnotherapy_woocommerce_loop_shop_columns($cols) {
		return max(2, min(4, hypnotherapy_get_theme_option('blog_columns')));
	}
}

// Add column class into product item in shop streampage
if ( !function_exists( 'hypnotherapy_woocommerce_loop_shop_columns_class' ) ) {
	//Handler of the add_filter( 'post_class', 'hypnotherapy_woocommerce_loop_shop_columns_class' );
	//Handler of the add_filter( 'product_cat_class', 'hypnotherapy_woocommerce_loop_shop_columns_class', 10, 3 );
	function hypnotherapy_woocommerce_loop_shop_columns_class($classes, $class='', $cat='') {
		global $woocommerce_loop;
		if (is_product()) {
			if (!empty($woocommerce_loop['columns'])) {
				$classes[] = ' column-1_'.esc_attr($woocommerce_loop['columns']);
			}
		} else if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) {
			$classes[] = ' column-1_'.esc_attr(max(2, min(4, hypnotherapy_get_theme_option('blog_columns'))));
		}
		return $classes;
	}
}


// Open item wrapper for categories and products
if ( !function_exists( 'hypnotherapy_woocommerce_item_wrapper_start' ) ) {
	//Handler of the add_action( 'woocommerce_before_subcategory_title', 'hypnotherapy_woocommerce_item_wrapper_start', 9 );
	//Handler of the add_action( 'woocommerce_before_shop_loop_item_title', 'hypnotherapy_woocommerce_item_wrapper_start', 9 );
	function hypnotherapy_woocommerce_item_wrapper_start($cat='') {
		hypnotherapy_storage_set('in_product_item', true);
		$hover = hypnotherapy_get_theme_option('shop_hover');
		?>
		<div class="post_item post_layout_<?php echo esc_attr(hypnotherapy_storage_get('shop_mode')); ?>">
			<div class="post_featured hover_<?php echo esc_attr($hover); ?>">
				<a href="<?php echo esc_url(is_object($cat) ? get_term_link($cat->slug, 'product_cat') : get_permalink()); ?>">
		<?php
	}
}

// Open item wrapper for categories and products
if ( !function_exists( 'hypnotherapy_woocommerce_open_item_wrapper' ) ) {
	//Handler of the add_action( 'woocommerce_before_subcategory_title', 'hypnotherapy_woocommerce_title_wrapper_start', 20 );
	//Handler of the add_action( 'woocommerce_before_shop_loop_item_title', 'hypnotherapy_woocommerce_title_wrapper_start', 20 );
	function hypnotherapy_woocommerce_title_wrapper_start($cat='') {
				?>
				</a>
				<?php
				if (($hover = hypnotherapy_get_theme_option('shop_hover')) != 'none') {
					?><div class="mask"></div><?php
					hypnotherapy_hovers_add_icons($hover, array('cat'=>$cat));
				}
				?>
			</div><!-- /.post_featured -->
			<div class="post_data">
				<div class="post_header entry-header">
				<?php
	}
}



// Wrap product title into link
if ( !function_exists( 'hypnotherapy_woocommerce_the_title' ) ) {
	//Handler of the add_filter( 'the_title', 'hypnotherapy_woocommerce_the_title' );
	function hypnotherapy_woocommerce_the_title($title) {
		if (hypnotherapy_storage_get('in_product_item') && get_post_type()=='product') {
			$title = '<a href="'.get_permalink().'">'.esc_html($title).'</a>';
		}
		return $title;
	}
}

// Wrap category title into link
if ( !function_exists( 'hypnotherapy_woocommerce_shop_loop_subcategory_title' ) ) {
	//Handler of the add_filter( 'woocommerce_shop_loop_subcategory_title', 'hypnotherapy_woocommerce_shop_loop_subcategory_title' );
	function hypnotherapy_woocommerce_shop_loop_subcategory_title($cat) {
		if (hypnotherapy_storage_get('in_product_item') && is_object($cat)) {
			$cat->name = sprintf('<a href="%s">%s</a>', esc_url(get_term_link($cat->slug, 'product_cat')), $cat->name);
		}
		return $cat;
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'hypnotherapy_woocommerce_title_wrapper_end' ) ) {
	//Handler of the add_action( 'woocommerce_after_shop_loop_item_title', 'hypnotherapy_woocommerce_title_wrapper_end', 7);
	function hypnotherapy_woocommerce_title_wrapper_end() {
		?>
			</div><!-- /.post_header -->
		<?php
		if (hypnotherapy_storage_get('shop_mode') == 'list' && (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) && !is_product()) {
		    $excerpt = apply_filters('the_excerpt', get_the_excerpt());
			?>
			<div class="post_content entry-content"><?php hypnotherapy_show_layout($excerpt); ?></div>
			<?php
		}
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'hypnotherapy_woocommerce_title_wrapper_end2' ) ) {
	//Handler of the add_action( 'woocommerce_after_subcategory_title', 'hypnotherapy_woocommerce_title_wrapper_end2', 10 );
	function hypnotherapy_woocommerce_title_wrapper_end2($category) {
		?>
			</div><!-- /.post_header -->
		<?php
		if (hypnotherapy_storage_get('shop_mode') == 'list' && is_shop() && !is_product()) {
			?>
			<div class="post_content entry-content"><?php hypnotherapy_show_layout($category->description); ?></div><!-- /.post_content -->
			<?php
		}
	}
}

// Close item wrapper for categories and products
if ( !function_exists( 'hypnotherapy_woocommerce_close_item_wrapper' ) ) {
	//Handler of the add_action( 'woocommerce_after_subcategory', 'hypnotherapy_woocommerce_item_wrapper_end', 20 );
	//Handler of the add_action( 'woocommerce_after_shop_loop_item', 'hypnotherapy_woocommerce_item_wrapper_end', 20 );
	function hypnotherapy_woocommerce_item_wrapper_end($cat='') {
		?>
			</div><!-- /.post_data -->
		</div><!-- /.post_item -->
		<?php
		hypnotherapy_storage_set('in_product_item', false);
	}
}

// Change text on 'Add to cart' button
if ( !function_exists( 'hypnotherapy_woocommerce_add_to_cart_text' ) ) {
	//Handler of the add_filter( 'woocommerce_product_add_to_cart_text',		'hypnotherapy_woocommerce_add_to_cart_text' );
	//Handler of the add_filter( 'woocommerce_product_single_add_to_cart_text','hypnotherapy_woocommerce_add_to_cart_text' );
	function hypnotherapy_woocommerce_add_to_cart_text($text='') {
		return esc_html__('Add To Cart', 'hypnotherapy');
	}
}

// Decorate price
if ( !function_exists( 'hypnotherapy_woocommerce_get_price_html' ) ) {
	//Handler of the add_filter(    'woocommerce_get_price_html',	'hypnotherapy_woocommerce_get_price_html' );
	function hypnotherapy_woocommerce_get_price_html($price='') {
		if (!empty($price)) {
			$sep = get_option('woocommerce_price_decimal_sep');
			if (empty($sep)) $sep = '.';
			$price = preg_replace('/([0-9,]+)(\\'.trim($sep).')([0-9]{2})/', '\\1<span class="decimals">\\3</span>', $price);
		}
		return $price;
	}
}



// Decorate WooCommerce output: Single product
//------------------------------------------------------------------------

// Hide sidebar on the single products and pages
if ( !function_exists( 'hypnotherapy_woocommerce_sidebar_present' ) ) {
	//Handler of the add_action( 'hypnotherapy_filter_sidebar_present', 'hypnotherapy_woocommerce_sidebar_present' );
	function hypnotherapy_woocommerce_sidebar_present($present) {
		return is_product() ? false : $present;
	}
}

// Add Product ID for the single product
if ( !function_exists( 'hypnotherapy_woocommerce_show_product_id' ) ) {
	//Handler of the add_action( 'woocommerce_product_meta_end', 'hypnotherapy_woocommerce_show_product_id', 10);
	function hypnotherapy_woocommerce_show_product_id() {
		$authors = wp_get_post_terms(get_the_ID(), 'pa_product_author');
		if (is_array($authors) && count($authors)>0) {
			echo '<span class="product_author">'.esc_html__('Author: ', 'hypnotherapy');
			$delim = '';
			foreach ($authors as $author) {
				echo  esc_html($delim) . '<span>' . esc_html($author->name) . '</span>';
				$delim = ', ';
			}
			echo '</span>';
		}
		echo '<span class="product_id">'.esc_html__('Product ID: ', 'hypnotherapy') . '<span>' . get_the_ID() . '</span></span>';
	}
}

// Number columns for the product's thumbnails
if ( !function_exists( 'hypnotherapy_woocommerce_product_thumbnails_columns' ) ) {
	//Handler of the add_filter( 'woocommerce_product_thumbnails_columns', 'hypnotherapy_woocommerce_product_thumbnails_columns' );
	function hypnotherapy_woocommerce_product_thumbnails_columns($cols) {
		return 4;
	}
}

// Set columns number for the related products
if ( !function_exists( 'hypnotherapy_woocommerce_output_related_products_args' ) ) {
	//Handler of the add_filter( 'woocommerce_output_related_products_args', 'hypnotherapy_woocommerce_output_related_products_args' );
	function hypnotherapy_woocommerce_output_related_products_args($args) {
		$args['posts_per_page'] = $args['columns'] = max(2, min(4, hypnotherapy_get_theme_option('related_posts')));
		return $args;
	}
}



// Decorate WooCommerce output: Widgets
//------------------------------------------------------------------------

// Search form
if ( !function_exists( 'hypnotherapy_woocommerce_get_product_search_form' ) ) {
	//Handler of the add_filter( 'get_product_search_form', 'hypnotherapy_woocommerce_get_product_search_form' );
	function hypnotherapy_woocommerce_get_product_search_form($form) {
		return '
		<form role="search" method="get" class="search_form" action="' . esc_url(home_url('/')) . '">
			<input type="text" class="search_field" placeholder="' . esc_attr__('Search for products &hellip;', 'hypnotherapy') . '" value="' . get_search_query() . '" name="s" /><button class="search_button" type="submit">' . esc_html__('Search', 'hypnotherapy') . '</button>
			<input type="hidden" name="post_type" value="product" />
		</form>
		';
	}
}



// Add WooCommerce specific styles into color scheme
//------------------------------------------------------------------------

// Add styles into CSS
if ( !function_exists( 'hypnotherapy_woocommerce_get_css' ) ) {
	//Handler of the add_filter( 'hypnotherapy_filter_get_css', 'hypnotherapy_woocommerce_get_css', 10, 4 );
	function hypnotherapy_woocommerce_get_css($css, $colors, $fonts, $scheme='') {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

.woocommerce .checkout table.shop_table .product-name .variation,
.woocommerce .shop_table.order_details td.product-name .variation {
	{$fonts['p_font-family']}
}
.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
.woocommerce ul.products li.product .post_header, .woocommerce-page ul.products li.product .post_header,
.woocommerce .shop_table th,
.woocommerce span.onsale,
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce div.product p.price, .woocommerce div.product span.price,
.woocommerce div.product .summary .stock,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong, .woocommerce-page #reviews #comments ol.commentlist li .comment-text p.meta strong,
.woocommerce table.cart td.product-name a, .woocommerce-page table.cart td.product-name a, 
.woocommerce #content table.cart td.product-name a, .woocommerce-page #content table.cart td.product-name a,
.woocommerce .checkout table.shop_table .product-name,
.woocommerce .shop_table.order_details td.product-name,
.woocommerce .order_details li strong,
.woocommerce-MyAccount-navigation,
.woocommerce-MyAccount-content .woocommerce-Address-title a,
.woocommerce.widget_shopping_cart .total, .woocommerce .widget_shopping_cart .total,
.woocommerce-page.widget_shopping_cart .total, .woocommerce-page .widget_shopping_cart .total {
	{$fonts['h5_font-family']}
}
.woocommerce ul.products li.product .post_header .post_tags,
.woocommerce div.product .product_meta span > a, .woocommerce div.product .product_meta span > span,
.woocommerce div.product form.cart .reset_variations,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time, .woocommerce-page #reviews #comments ol.commentlist li .comment-text p.meta time {
	{$fonts['info_font-family']}
}

CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* Page header */
.woocommerce .woocommerce-breadcrumb {
	color: {$colors['text']};
}
.woocommerce .woocommerce-breadcrumb a {
	color: {$colors['text_link']};
}
.woocommerce .woocommerce-breadcrumb a:hover {
	color: {$colors['text_hover']};
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
	background-color: {$colors['text_link']};
}

/* List and Single product */
.woocommerce .woocommerce-ordering select {
	border-color: {$colors['bd_color']};
}
.woocommerce span.onsale {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}

.woocommerce ul.products li.product .post_header a {
	color: {$colors['text_dark']};
}
.woocommerce ul.products li.product .post_header a:hover {
	color: {$colors['text_link']};
}
.woocommerce ul.products li.product .post_header .post_tags,
.woocommerce ul.products li.product .post_header .post_tags a {
	color: {$colors['alter_link']};
}
.woocommerce ul.products li.product .post_header .post_tags a:hover {
	color: {$colors['alter_hover']};
}
.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins {
	color: {$colors['text_light']};
}
.woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del {
	color: {$colors['text_light']};
}

.woocommerce div.product p.price, .woocommerce div.product span.price,
.woocommerce span.amount, .woocommerce-page span.amount {
	color: {$colors['text_light']};
}

aside.woocommerce del,
.woocommerce del, .woocommerce del > span.amount, 
.woocommerce-page del, .woocommerce-page del > span.amount {
	color: {$colors['text_light']} !important;
}
.woocommerce .price del:before {
	background-color: {$colors['text_light']};
}
.woocommerce div.product form.cart div.quantity span, .woocommerce-page div.product form.cart div.quantity span {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.woocommerce div.product form.cart div.quantity span:hover, .woocommerce-page div.product form.cart div.quantity span:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_hover']};
}
.woocommerce div.product form.cart div.quantity input[type="number"], .woocommerce-page div.product form.cart div.quantity input[type="number"] {
	border-color: {$colors['text_link']};
}

.woocommerce div.product .product_meta{
	color: {$colors['text_light']};
}

.woocommerce div.product .product_meta span > a,
.woocommerce div.product .product_meta span > span {
	color: {$colors['text_link']};
}
.woocommerce div.product .product_meta a:hover {
	color: {$colors['text_hover']};
}

.woocommerce div.product div.images img {
	border-color: {$colors['bd_color']};
}
.woocommerce div.product div.images a:hover img {
	border-color: {$colors['text_link']};
}

.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li a {
	color: {$colors['text_link']};
	background-color: {$colors['alter_bg_color']};
}
.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li.active a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li:not(.active) a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.woocommerce table.shop_attributes tr:nth-child(2n+1) > * {
	background-color: {$colors['alter_bg_color_04']};
}
.woocommerce table.shop_attributes tr:nth-child(2n) > *,
.woocommerce table.shop_attributes tr.alt > * {
	background-color: {$colors['alter_bg_color_02']};
}
.woocommerce table.shop_attributes th {
	color: {$colors['text_dark']};
}



/* Rating */
.star-rating span,
.star-rating:before {
	color: {$colors['text_link']};
}
#review_form #respond p.form-submit input[type="submit"] {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
#review_form #respond p.form-submit input[type="submit"]:hover,
#review_form #respond p.form-submit input[type="submit"]:focus {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}

/* Buttons */
.hypnotherapy_shop_mode_buttons a {
	color: {$colors['text']};
}
.hypnotherapy_shop_mode_buttons a:hover {
	color: {$colors['text_link']};
}
.woocommerce #respond input#submit,
.woocommerce .button, .woocommerce-page .button,
.woocommerce a.button, .woocommerce-page a.button,
.woocommerce button.button, .woocommerce-page button.button,
.woocommerce input.button, .woocommerce-page input.button,
.woocommerce input[type="button"], .woocommerce-page input[type="button"],
.woocommerce input[type="submit"], .woocommerce-page input[type="submit"],
.woocommerce nav.woocommerce-pagination ul li a {
	color: {$colors['text_link']};
	background-color: transparent;
	border-color: {$colors['text_link']};
}
.woocommerce #respond input#submit:hover,
.woocommerce .button:hover, .woocommerce-page .button:hover,
.woocommerce a.button:hover, .woocommerce-page a.button:hover,
.woocommerce button.button:hover, .woocommerce-page button.button:hover,
.woocommerce input.button:hover, .woocommerce-page input.button:hover,
.woocommerce input[type="button"]:hover, .woocommerce-page input[type="button"]:hover,
.woocommerce input[type="submit"]:hover, .woocommerce-page input[type="submit"]:hover,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current {
	color: {$colors['inverse_text']};	/* !important */
	background-color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}

.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt {
	border-color: {$colors['text_link']};
	color: {$colors['text_link']};
	background-color: transparent;
}
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover {
	border-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}


/* Messages */
.woocommerce .woocommerce-message,
.woocommerce .woocommerce-info {
	background-color: {$colors['alter_bg_color']};
	border-top-color: {$colors['text_hover']};
}
.woocommerce .woocommerce-error {
	background-color: {$colors['alter_bg_color']};
	border-top-color: {$colors['alter_link']};
}
.woocommerce .woocommerce-message:before,
.woocommerce .woocommerce-info:before {
	color: {$colors['text_hover']};
}
.woocommerce .woocommerce-error:before {
	color: {$colors['text_hover']};
}
.woocommerce .woocommerce-message .button,
.woocommerce .woocommerce-error .button,
.woocommerce .woocommerce-info .button {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}
.woocommerce .woocommerce-message .button:hover,
.woocommerce .woocommerce-info .button:hover {
	background-color: {$colors['text_hover']};
	border-color: {$colors['text_hover']};
}


/* Cart */
.woocommerce table.shop_table td {
	border-color: {$colors['alter_bd_color']} !important;
}
.woocommerce table.shop_table th {
	border-color: {$colors['alter_bd_color_02']} !important;
}
.woocommerce table.shop_table tfoot th, .woocommerce-page table.shop_table tfoot th {
	color: {$colors['text_dark']};
	border-color: transparent !important;
	background-color: transparent;
}
.woocommerce .quantity input.qty, .woocommerce #content .quantity input.qty, .woocommerce-page .quantity input.qty, .woocommerce-page #content .quantity input.qty {
	color: {$colors['text']};
}
.woocommerce .cart-collaterals .cart_totals table select, .woocommerce-page .cart-collaterals .cart_totals table select {
	color: {$colors['input_light']};
	background-color: {$colors['input_bg_color']};
}
.woocommerce .cart-collaterals .cart_totals table select:focus, .woocommerce-page .cart-collaterals .cart_totals table select:focus {
	color: {$colors['input_text']};
	background-color: {$colors['input_bg_hover']};
}
.woocommerce .cart-collaterals .shipping_calculator .shipping-calculator-button:after, .woocommerce-page .cart-collaterals .shipping_calculator .shipping-calculator-button:after {
	color: {$colors['text_dark']};
}
.woocommerce table.shop_table .cart-subtotal .amount, .woocommerce-page table.shop_table .cart-subtotal .amount,
.woocommerce table.shop_table .shipping td, .woocommerce-page table.shop_table .shipping td {
	color: {$colors['text_dark']};
}
.woocommerce table.cart td+td a, .woocommerce #content table.cart td+td a, .woocommerce-page table.cart td+td a, .woocommerce-page #content table.cart td+td a,
.woocommerce table.cart td+td span, .woocommerce #content table.cart td+td span, .woocommerce-page table.cart td+td span, .woocommerce-page #content table.cart td+td span {
	color: {$colors['text_dark']};
}
.woocommerce table.cart td+td a:hover, .woocommerce #content table.cart td+td a:hover, .woocommerce-page table.cart td+td a:hover, .woocommerce-page #content table.cart td+td a:hover {
	color: {$colors['text_link']};
}
#add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text {
	border-color: {$colors['input_bd_color']};
}


/* Checkout */
#add_payment_method #payment ul.payment_methods, .woocommerce-cart #payment ul.payment_methods, .woocommerce-checkout #payment ul.payment_methods {
	border-color:{$colors['bd_color']};
}
#add_payment_method #payment div.payment_box, .woocommerce-cart #payment div.payment_box, .woocommerce-checkout #payment div.payment_box {
	color:{$colors['input_dark']};
	background-color:{$colors['input_bg_hover']};
}
#add_payment_method #payment div.payment_box:before, .woocommerce-cart #payment div.payment_box:before, .woocommerce-checkout #payment div.payment_box:before {
	border-color: transparent transparent {$colors['input_bg_hover']};
}
.woocommerce .order_details li strong, .woocommerce-page .order_details li strong {
	color: {$colors['text_dark']};
}
.woocommerce .order_details.woocommerce-thankyou-order-details {
	color:{$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.woocommerce .order_details.woocommerce-thankyou-order-details strong {
	color:{$colors['alter_dark']};
}

/* My Account */
.woocommerce-account .woocommerce-MyAccount-navigation,
.woocommerce-MyAccount-navigation ul li,
.woocommerce-MyAccount-navigation li+li {
	border-color: {$colors['bd_color']};
}
.woocommerce-MyAccount-navigation li.is-active a {
	color: {$colors['text_link']};
}

/* Widgets */

.woocommerce.widget_product_search .search_field{
background-color: {$colors['inverse_text']};
}

.widget_product_search form:after {
	color: {$colors['text_link']};
}
.widget_product_search form:hover:after {
	color: {$colors['text_hover']};
}
.widget_product_search .search_button {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_link']};
}
.widget_shopping_cart .total {
	color: {$colors['text_dark']};
	border-top-color: {$colors['text']} !important;;
	border-bottom-color: {$colors['text']} !important;
}
.widget_layered_nav ul li.chosen a {
	color: {$colors['text_dark']};
}
.widget_price_filter .price_slider_wrapper .ui-widget-content { 
	background: {$colors['text_light']};
}


.widget_price_filter .price_slider_wrapper .ui-widget-content{
	background-color: {$colors['inverse_text']};
}


.widget_shopping_cart .buttons .button.checkout{
	background-color: {$colors['text_link']};
	color: {$colors['inverse_link']};	
}

.widget_shopping_cart .buttons .button.checkout:hover{
	background-color: {$colors['text_hover']};
}

.widget_shopping_cart .buttons .button:not(.checkout):hover{
	color: {$colors['text_hover']};
}

/* Third-party plugins
---------------------------------------------- */
.yith_magnifier_zoom_wrap .yith_magnifier_zoom_magnifier {
	border-color: {$colors['bd_color']};
}

.woocommerce .widget_shopping_cart .total strong,
.woocommerce.widget_shopping_cart .total strong{
	color: {$colors['text_link']};
}

.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled[disabled], 
.woocommerce a.button.alt.disabled,  .woocommerce a.button.alt:disabled,
 .woocommerce a.button.alt:disabled[disabled],
 .woocommerce button.button.alt.disabled,
 .woocommerce button.button.alt:disabled,
 .woocommerce button.button.alt:disabled[disabled],
 .woocommerce input.button.alt.disabled,
 .woocommerce input.button.alt:disabled,
 .woocommerce input.button.alt:disabled[disabled]{
	border-color: {$colors['text_link']};
	color: {$colors['text_link']};
	background-color: transparent;
}


.woocommerce #respond input#submit.alt.disabled:hover,
.woocommerce #respond input#submit.alt:disabled:hover,
.woocommerce #respond input#submit.alt:disabled[disabled]:hover,
.woocommerce a.button.alt.disabled:hover,
.woocommerce a.button.alt:disabled:hover,
.woocommerce a.button.alt:disabled[disabled]:hover,
.woocommerce button.button.alt.disabled:hover,
.woocommerce button.button.alt:disabled:hover,
.woocommerce button.button.alt:disabled[disabled]:hover,
.woocommerce input.button.alt.disabled:hover,
.woocommerce input.button.alt:disabled:hover,
.woocommerce input.button.alt:disabled[disabled]:hover{
	border-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}


.single-product .related h2:after{
	background-color: {$colors['text_link']};
}

CSS;
		}
		
		return $css;
	}
}
?>