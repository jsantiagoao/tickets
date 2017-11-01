<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

// Theme storage
$HYPNOTHERAPY_STORAGE = array(
	// Theme required plugin's slugs
	'required_plugins' => array(
		// Required plugins
		// DON'T COMMENT OR REMOVE NEXT LINES!
		'trx_addons',
		'booked',
		// Recommended (supported) plugins
		'essential-grid',
		'js_composer',
		'mailchimp-for-wp',
		'revslider',
		'woocommerce'
		)
);


//-------------------------------------------------------
//-- Theme init
//-------------------------------------------------------

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)

if ( !function_exists('hypnotherapy_theme_setup1') ) {
	add_action( 'after_setup_theme', 'hypnotherapy_theme_setup1', 1 );
	function hypnotherapy_theme_setup1() {
		// Set theme content width
		$GLOBALS['content_width'] = apply_filters( 'hypnotherapy_filter_content_width', 1170 );
	}
}

if ( !function_exists('hypnotherapy_theme_setup') ) {
	add_action( 'after_setup_theme', 'hypnotherapy_theme_setup' );
	function hypnotherapy_theme_setup() {

		// Add default posts and comments RSS feed links to head 
		add_theme_support( 'automatic-feed-links' );
		
		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);
		
		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('hypnotherapy_filter_add_thumb_sizes', array(
			'hypnotherapy-thumb-huge'		=> array(1404, 789, true),
			'hypnotherapy-thumb-big' 		=> array( 1155, 649, true),
			'hypnotherapy-thumb-med' 		=> array( 555, 367, true),
			'hypnotherapy-thumb-recentpost'  => array(540 ,315, true),
			'hypnotherapy-thumb-tiny' 		=> array(  135,  135, true),
			'hypnotherapy-thumb-masonry-big' => array( 1155,   0, false),		// Only downscale, not crop
			'hypnotherapy-thumb-masonry'		=> array( 555,   0, false),		// Only downscale, not crop
			)
		);
		$mult = hypnotherapy_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'hypnotherapy_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}
		
		// Custom header setup
		add_theme_support( 'custom-header', array(
			'header-text'=>false,
			'video' => true
			)
		);

		// Custom backgrounds setup
		add_theme_support( 'custom-background', array()	);
		
		// Supported posts formats
		add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote', 'image', 'status', 'aside', 'chat') ); 
 
 		// Autogenerate title tag
		add_theme_support('title-tag');
 		
		// Add theme menus
		add_theme_support('nav-menus');
		
		// Switch default markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
		
		// WooCommerce Support
		add_theme_support( 'woocommerce' );
		
		// Editor custom stylesheet - for user
		add_editor_style( array_merge(
			array(
				'css/editor-style.css',
				hypnotherapy_get_file_url('css/fontello/css/fontello-embedded.css')
			),
			hypnotherapy_theme_fonts_for_editor()
			)
		);	
		
		// Make theme available for translation
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'hypnotherapy', hypnotherapy_get_folder_dir('languages') );
	
		// Register navigation menu
		register_nav_menus(array(
			'menu_main' => esc_html__('Main Menu', 'hypnotherapy'),
			'menu_mobile' => esc_html__('Mobile Menu', 'hypnotherapy'),
			'menu_footer' => esc_html__('Footer Menu', 'hypnotherapy')
			)
		);

		// Excerpt filters
		add_filter( 'excerpt_length',						'hypnotherapy_excerpt_length' );
		add_filter( 'excerpt_more',							'hypnotherapy_excerpt_more' );
		
		// Add required meta tags in the head
		add_action('wp_head',		 						'hypnotherapy_wp_head', 0);
		
		// Add custom inline styles
		add_action('wp_footer',		 						'hypnotherapy_wp_footer');
		add_action('admin_footer',	 						'hypnotherapy_wp_footer');

		// Enqueue scripts and styles for frontend
		add_action('wp_enqueue_scripts', 					'hypnotherapy_wp_scripts', 1000);			//priority 1000 - load styles before the plugin's support custom styles (priority 1100)
		add_action('wp_footer',		 						'hypnotherapy_localize_scripts');
		add_action('wp_enqueue_scripts', 					'hypnotherapy_wp_scripts_responsive', 2000);	//priority 2000 - load responsive after all other styles
		
		// Add body classes
		add_filter( 'body_class',							'hypnotherapy_add_body_classes' );

		// Register sidebars
		add_action('widgets_init',							'hypnotherapy_register_sidebars');

		// Set options for importer (before other plugins)
		add_filter( 'trx_addons_filter_importer_options',	'hypnotherapy_importer_set_options', 9 );
	}

}


//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------
if ( !function_exists('hypnotherapy_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'hypnotherapy_image_sizes' );
	function hypnotherapy_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('hypnotherapy_filter_add_thumb_sizes', array(
			'hypnotherapy-thumb-huge'		=> esc_html__( 'Fullsize image', 'hypnotherapy' ),
			'hypnotherapy-thumb-big'			=> esc_html__( 'Large image', 'hypnotherapy' ),
			'hypnotherapy-thumb-med'			=> esc_html__( 'Medium image', 'hypnotherapy' ),
			'hypnotherapy-thumb-recentpost'			=> esc_html__( 'Widget size image', 'hypnotherapy' ),
			'hypnotherapy-thumb-tiny'		=> esc_html__( 'Small square avatar', 'hypnotherapy' ),
			'hypnotherapy-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'hypnotherapy' ),
			'hypnotherapy-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'hypnotherapy' ),
			)
		);
		$mult = hypnotherapy_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'hypnotherapy' );
		}
		return $sizes;
	}
}


//-------------------------------------------------------
//-- Theme scripts and styles
//-------------------------------------------------------

// Load frontend scripts
if ( !function_exists( 'hypnotherapy_wp_scripts' ) ) {
	//Handler of the add_action('wp_enqueue_scripts', 'hypnotherapy_wp_scripts', 1000);
	function hypnotherapy_wp_scripts() {
		
		// Enqueue styles
		//------------------------
		
		// Links to selected fonts
		$links = hypnotherapy_theme_fonts_links();
		if (count($links) > 0) {
			foreach ($links as $slug => $link) {
				wp_enqueue_style( sprintf('hypnotherapy-font-%s', $slug), $link );
			}
		}
		
		// Fontello styles must be loaded before main stylesheet
		// This style NEED the theme prefix, because style 'fontello' in some plugin contain different set of characters
		// and can't be used instead this style!
		wp_enqueue_style( 'hypnotherapy-fontello',  hypnotherapy_get_file_url('css/fontello/css/fontello-embedded.css') );



		// Merged styles
		if ( hypnotherapy_is_off(hypnotherapy_get_theme_option('debug_mode')) )
			wp_enqueue_style( 'hypnotherapy-styles', hypnotherapy_get_file_url('css/__styles.css') );
		
		// Load main stylesheet
		$main_stylesheet = get_template_directory_uri() . '/style.css';
		wp_enqueue_style( 'hypnotherapy-main', $main_stylesheet, array(), null );

		// Load child stylesheet (if different) after the main stylesheet and fontello icons (important!)
		$child_stylesheet = get_stylesheet_directory_uri() . '/style.css';
		if ($child_stylesheet != $main_stylesheet) {
			wp_enqueue_style( 'hypnotherapy-child', $child_stylesheet, array('hypnotherapy-main'), null );
		}

		// Add custom bg image for the body_style == 'boxed'
		if ( hypnotherapy_get_theme_option('body_style') == 'boxed' && ($bg_image = hypnotherapy_get_theme_option('boxed_bg_image')) != '' )
			wp_add_inline_style( 'hypnotherapy-main', '.body_style_boxed { background-image:url('.esc_url($bg_image).') }' );


		// Custom colors
		if ( !is_customize_preview() && !isset($_GET['color_scheme']) && hypnotherapy_is_off(hypnotherapy_get_theme_option('debug_mode')) )
			wp_enqueue_style( 'hypnotherapy-colors', hypnotherapy_get_file_url('css/__colors.css') );
		else
			wp_add_inline_style( 'hypnotherapy-main', hypnotherapy_customizer_get_css() );

		// Add post nav background
		hypnotherapy_add_bg_in_post_nav();

		// Disable loading JQuery UI CSS
		wp_deregister_style('jquery_ui');
		wp_deregister_style('date-picker-css');


		// Enqueue scripts	
		//------------------------
		
		// Modernizr will load in head before other scripts and styles
		if ( substr(hypnotherapy_get_theme_option('blog_style'), 0, 7) == 'gallery' || substr(hypnotherapy_get_theme_option('blog_style'), 0, 9) == 'portfolio' )
			wp_enqueue_script( 'modernizr', hypnotherapy_get_file_url('js/theme.gallery/modernizr.min.js'), array(), null, false );

		// Superfish Menu
		// Attention! To prevent duplicate this script in the plugin and in the menu, don't merge it!
		wp_enqueue_script( 'superfish', hypnotherapy_get_file_url('js/superfish.js'), array('jquery'), null, true );
		
		// Merged scripts
		if ( hypnotherapy_is_off(hypnotherapy_get_theme_option('debug_mode')) )
			wp_enqueue_script( 'hypnotherapy-init', hypnotherapy_get_file_url('js/__scripts.js'), array('jquery'), null, true );
		else {
			// Skip link focus
			wp_enqueue_script( 'skip-link-focus-fix', hypnotherapy_get_file_url('js/skip-link-focus-fix.js'), null, true );
			// Background video
			$header_video = hypnotherapy_get_header_video();
			if (!empty($header_video) && !hypnotherapy_is_inherit($header_video))
				wp_enqueue_script( 'bideo', hypnotherapy_get_file_url('js/bideo.js'), array(), null, true );
			// Theme scripts
			wp_enqueue_script( 'hypnotherapy-utils', hypnotherapy_get_file_url('js/_utils.js'), array('jquery'), null, true );
			wp_enqueue_script( 'hypnotherapy-init', hypnotherapy_get_file_url('js/_init.js'), array('jquery'), null, true );	
		}
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Media elements library	
		if (hypnotherapy_get_theme_setting('use_mediaelements')) {
			wp_enqueue_style ( 'mediaelement' );
			wp_enqueue_style ( 'wp-mediaelement' );
			wp_enqueue_script( 'mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );
		}
	}
}

// Add variables to the scripts in the frontend
if ( !function_exists( 'hypnotherapy_localize_scripts' ) ) {
	//Handler of the add_action('wp_footer', 'hypnotherapy_localize_scripts');
	function hypnotherapy_localize_scripts() {

		$video = hypnotherapy_get_header_video();

		wp_localize_script( 'hypnotherapy-init', 'HYPNOTHERAPY_STORAGE', apply_filters( 'hypnotherapy_filter_localize_script', array(
			// AJAX parameters
			'ajax_url' => esc_url(admin_url('admin-ajax.php')),
			'ajax_nonce' => esc_attr(wp_create_nonce(admin_url('admin-ajax.php'))),
			
			// Site base url
			'site_url' => get_site_url(),
						
			// Site color scheme
			'site_scheme' => sprintf('scheme_%s', hypnotherapy_get_theme_option('color_scheme')),
			
			// User logged in
			'user_logged_in' => is_user_logged_in() ? true : false,
			
			// Window width to switch the site header to the mobile layout
			'mobile_layout_width' => 767,
						
			// Sidemenu options
			'menu_side_stretch' => hypnotherapy_get_theme_option('menu_side_stretch') > 0 ? true : false,
			'menu_side_icons' => hypnotherapy_get_theme_option('menu_side_icons') > 0 ? true : false,

			// Video background
			'background_video' => hypnotherapy_is_from_uploads($video) ? $video : '',

			// Video and Audio tag wrapper
			'use_mediaelements' => hypnotherapy_get_theme_setting('use_mediaelements') ? true : false,

			// Messages max length
			'message_maxlength'	=> intval(hypnotherapy_get_theme_setting('message_maxlength')),

			
			// Internal vars - do not change it!
			
			// Flag for review mechanism
			'admin_mode' => false,

			// E-mail mask
			'email_mask' => '^([a-zA-Z0-9_\\-]+\\.)*[a-zA-Z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$',
			
			// Strings for translation
			'strings' => array(
					'ajax_error'		=> esc_html__('Invalid server answer!', 'hypnotherapy'),
					'error_global'		=> esc_html__('Error data validation!', 'hypnotherapy'),
					'name_empty' 		=> esc_html__("The name can't be empty", 'hypnotherapy'),
					'name_long'			=> esc_html__('Too long name', 'hypnotherapy'),
					'email_empty'		=> esc_html__('Too short (or empty) email address', 'hypnotherapy'),
					'email_long'		=> esc_html__('Too long email address', 'hypnotherapy'),
					'email_not_valid'	=> esc_html__('Invalid email address', 'hypnotherapy'),
					'text_empty'		=> esc_html__("The message text can't be empty", 'hypnotherapy'),
					'text_long'			=> esc_html__('Too long message text', 'hypnotherapy')
					)
			))
		);
	}
}

// Load responsive styles (priority 2000 - load it after main styles and plugins custom styles)
if ( !function_exists( 'hypnotherapy_wp_scripts_responsive' ) ) {
	//Handler of the add_action('wp_enqueue_scripts', 'hypnotherapy_wp_scripts_responsive', 2000);
	function hypnotherapy_wp_scripts_responsive() {
		wp_enqueue_style( 'hypnotherapy-responsive', hypnotherapy_get_file_url('css/responsive.css') );
	}
}

//  Add meta tags and inline scripts in the header for frontend
if (!function_exists('hypnotherapy_wp_head')) {
	//Handler of the add_action('wp_head',	'hypnotherapy_wp_head', 1);
	function hypnotherapy_wp_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="format-detection" content="telephone=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
	}
}

// Add theme specified classes to the body
if ( !function_exists('hypnotherapy_add_body_classes') ) {
	//Handler of the add_filter( 'body_class', 'hypnotherapy_add_body_classes' );
	function hypnotherapy_add_body_classes( $classes ) {
		$classes[] = 'body_tag';	// Need for the .scheme_self
		$classes[] = 'scheme_' . esc_attr(hypnotherapy_get_theme_option('color_scheme'));

		$blog_mode = hypnotherapy_storage_get('blog_mode');
		$classes[] = 'blog_mode_' . esc_attr($blog_mode);
		$classes[] = 'body_style_' . esc_attr(hypnotherapy_get_theme_option('body_style'));

		if (in_array($blog_mode, array('post', 'page'))) {
			$classes[] = 'is_single';
		} else {
			$classes[] = ' is_stream';
			$classes[] = 'blog_style_'.esc_attr(hypnotherapy_get_theme_option('blog_style'));
			if (hypnotherapy_storage_get('blog_template') > 0)
				$classes[] = 'blog_template';
		}
		
		if (hypnotherapy_sidebar_present()) {
			$classes[] = 'sidebar_show sidebar_' . esc_attr(hypnotherapy_get_theme_option('sidebar_position')) ;
		} else {
			$classes[] = 'sidebar_hide';
			if (hypnotherapy_is_on(hypnotherapy_get_theme_option('expand_content')))
				 $classes[] = 'expand_content';
		}
		
		if (hypnotherapy_is_on(hypnotherapy_get_theme_option('remove_margins')))
			 $classes[] = 'remove_margins';

		$classes[] = 'header_style_' . esc_attr(hypnotherapy_get_theme_option("header_style"));
		$classes[] = 'header_position_' . esc_attr(hypnotherapy_get_theme_option("header_position"));

		$menu_style= hypnotherapy_get_theme_option("menu_style");
		$classes[] = 'menu_style_' . esc_attr($menu_style) . (in_array($menu_style, array('left', 'right'))	? ' menu_style_side' : '');
		$classes[] = 'no_layout';
		
		return $classes;
	}
}
	
// Load inline styles
if ( !function_exists( 'hypnotherapy_wp_footer' ) ) {
	//Handler of the add_action('wp_footer', 'hypnotherapy_wp_footer');
	//and add_action('admin_footer', 'hypnotherapy_wp_footer');
	function hypnotherapy_wp_footer() {
		// Get inline styles from storage
		if (($css = hypnotherapy_storage_get('inline_styles')) != '') {
			wp_enqueue_style(  'hypnotherapy-inline-styles',  hypnotherapy_get_file_url('css/__inline.css') );
			wp_add_inline_style( 'hypnotherapy-inline-styles', $css );
		}
	}
}


//-------------------------------------------------------
//-- Sidebars and widgets
//-------------------------------------------------------

// Register widgetized areas
if ( !function_exists('hypnotherapy_register_sidebars') ) {
	// Handler of the add_action('widgets_init', 'hypnotherapy_register_sidebars');
	function hypnotherapy_register_sidebars() {
		$sidebars = hypnotherapy_get_sidebars();
		if (is_array($sidebars) && count($sidebars) > 0) {
			foreach ($sidebars as $id=>$sb) {
				register_sidebar( array(
										'name'          => $sb['name'],
										'description'   => $sb['description'],
										'id'            => $id,
										'before_widget' => '<aside id="%1$s" class="widget %2$s">',
										'after_widget'  => '</aside>',
										'before_title'  => '<h5 class="widget_title">',
										'after_title'   => '</h5>'
										)
								);
			}
		}
	}
}

// Return theme specific widgetized areas
if ( !function_exists('hypnotherapy_get_sidebars') ) {
	function hypnotherapy_get_sidebars() {
		$list = apply_filters('hypnotherapy_filter_list_sidebars', array(
			'sidebar_widgets'		=> array(
											'name' => esc_html__('Sidebar Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown on the main sidebar', 'hypnotherapy')
											),
			'header_widgets'		=> array(
											'name' => esc_html__('Header Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown at the top of the page (in the page header area)', 'hypnotherapy')
											),
			'above_page_widgets'	=> array(
											'name' => esc_html__('Above Page Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown below the header, but above the content and sidebar', 'hypnotherapy')
											),
			'above_content_widgets' => array(
											'name' => esc_html__('Above Content Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown above the content, near the sidebar', 'hypnotherapy')
											),
			'below_content_widgets' => array(
											'name' => esc_html__('Below Content Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown below the content, near the sidebar', 'hypnotherapy')
											),
			'below_page_widgets' 	=> array(
											'name' => esc_html__('Below Page Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown below the content and sidebar, but above the footer', 'hypnotherapy')
											),
			'footer_widgets'		=> array(
											'name' => esc_html__('Footer Widgets', 'hypnotherapy'),
											'description' => esc_html__('Widgets to be shown at the bottom of the page (in the page footer area)', 'hypnotherapy')
											)
			)
		);
		$custom_sidebars_number = max(0, min(10, hypnotherapy_get_theme_setting('custom_sidebars')));
		if (count($custom_sidebars_number) > 0) {
			for ($i=1; $i <= $custom_sidebars_number; $i++) {
				$list['custom_widgets_'.intval($i)] = array(
															'name' => sprintf(esc_html__('Custom Widgets %d', 'hypnotherapy'), $i),
															'description' => esc_html__('An arbitrary set of widgets. Can be shown in any area of the site', 'hypnotherapy')
															);
			}
		}
		return $list;
	}
}


//-------------------------------------------------------
//-- Theme fonts
//-------------------------------------------------------

// Return links for all theme fonts
if ( !function_exists('hypnotherapy_theme_fonts_links') ) {
	function hypnotherapy_theme_fonts_links() {
		$links = array();
		
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		$google_fonts_enabled = ( 'off' !== _x( 'on', 'Google fonts: on or off', 'hypnotherapy' ) );
		$custom_fonts_enabled = ( 'off' !== _x( 'on', 'Custom fonts (included in the theme): on or off', 'hypnotherapy' ) );
		
		if ( ($google_fonts_enabled || $custom_fonts_enabled) && !hypnotherapy_storage_empty('load_fonts') ) {
			$load_fonts = hypnotherapy_storage_get('load_fonts');
			if (count($load_fonts) > 0) {
				$google_fonts = '';
				foreach ($load_fonts as $font) {
					$slug = hypnotherapy_get_load_fonts_slug($font['name']);
					$url  = hypnotherapy_get_file_url( sprintf('css/font-face/%s/stylesheet.css', $slug));
					if ($url != '') {
						if ($custom_fonts_enabled) {
							$links[$slug] = $url;
						}
					} else {
						if ($google_fonts_enabled) {
							$google_fonts .= ($google_fonts ? '|' : '') 
											. str_replace(' ', '+', $font['name'])
											. ':' 
											. (empty($font['styles']) ? '400,400italic,600,700,700italic' : $font['styles']);
						}
					}
				}
				if ($google_fonts && $google_fonts_enabled) {
					$links['google_fonts'] = sprintf('%s://fonts.googleapis.com/css?family=%s&subset=%s', hypnotherapy_get_protocol(), $google_fonts, hypnotherapy_get_theme_option('load_fonts_subset'));
				}
			}
		}
		return $links;
	}
}

// Return links for WP Editor
if ( !function_exists('hypnotherapy_theme_fonts_for_editor') ) {
	function hypnotherapy_theme_fonts_for_editor() {
		$links = array_values(hypnotherapy_theme_fonts_links());
		if (is_array($links) && count($links) > 0) {
			for ($i=0; $i<count($links); $i++) {
				$links[$i] = str_replace(',', '%2C', $links[$i]);
			}
		}
		return $links;
	}
}


//-------------------------------------------------------
//-- The Excerpt
//-------------------------------------------------------
if ( !function_exists('hypnotherapy_excerpt_length') ) {
	function hypnotherapy_excerpt_length( $length ) {
		return max(1, hypnotherapy_get_theme_setting('max_excerpt_length'));
	}
}

if ( !function_exists('hypnotherapy_excerpt_more') ) {
	function hypnotherapy_excerpt_more( $more ) {
		return '&hellip;';
	}
}


//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( !function_exists( 'hypnotherapy_importer_set_options' ) ) {
	//Handler of the add_filter( 'trx_addons_filter_importer_options',	'hypnotherapy_importer_set_options', 9 );
	function hypnotherapy_importer_set_options($options=array()) {
		if (is_array($options)) {
			// Prepare demo data
			$options['demo_url'] = esc_url(hypnotherapy_get_protocol() . '://edward-carter.ancorathemes.com/demo/');
			// Required plugins
			$options['required_plugins'] = hypnotherapy_storage_get('required_plugins');
			// Default demo
			$options['files']['default']['title'] = esc_html__('HypnoTherapy Demo', 'hypnotherapy');
			$options['files']['default']['domain_dev'] = esc_url(hypnotherapy_get_protocol().'://edward-carter.dv.ancorathemes.com');		// Developers domain
			$options['files']['default']['domain_demo']= esc_url(hypnotherapy_get_protocol().'://edward-carter.ancorathemes.com');		// Demo-site domain
		}
		return $options;
	}
}



//-------------------------------------------------------
//-- Include theme (or child) PHP-files
//-------------------------------------------------------

require_once trailingslashit( get_template_directory() ) . 'includes/utils.php';
require_once trailingslashit( get_template_directory() ) . 'includes/storage.php';
require_once trailingslashit( get_template_directory() ) . 'includes/lists.php';
require_once trailingslashit( get_template_directory() ) . 'includes/wp.php';

if (is_admin()) {
	require_once trailingslashit( get_template_directory() ) . 'includes/tgmpa/class-tgm-plugin-activation.php';
	require_once trailingslashit( get_template_directory() ) . 'includes/admin.php';
}

require_once trailingslashit( get_template_directory() ) . 'theme-options/theme.customizer.php';

require_once trailingslashit( get_template_directory() ) . 'theme-specific/trx_addons.php';

require_once trailingslashit( get_template_directory() ) . 'includes/theme.tags.php';
require_once trailingslashit( get_template_directory() ) . 'includes/theme.hovers/theme.hovers.php';


// Plugins support
if (is_array($HYPNOTHERAPY_STORAGE['required_plugins']) && count($HYPNOTHERAPY_STORAGE['required_plugins']) > 0) {
	foreach ($HYPNOTHERAPY_STORAGE['required_plugins'] as $plugin_slug) {
		$plugin_slug = hypnotherapy_esc($plugin_slug);
		$plugin_path = trailingslashit( get_template_directory() ) . sprintf('plugins/%s/%s.php', $plugin_slug, $plugin_slug);
		if (file_exists($plugin_path)) { require_once $plugin_path; }
	}
}
?>