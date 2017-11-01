<?php
/**
 * Default Theme Options and Internal Theme Settings
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

// -----------------------------------------------------------------
// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
// -- Internal theme settings
// -----------------------------------------------------------------
hypnotherapy_storage_set('settings', array(
	
	'custom_sidebars'			=> 0,							// How many custom sidebars will be registered (in addition to theme preset sidebars): 0 - 10

	'ajax_views_counter'		=> true,						// Use AJAX for increment posts counter (if cache plugins used) 
																// or increment posts counter then loading page (without cache plugin)
	'disable_jquery_ui'			=> false,						// Prevent loading custom jQuery UI libraries in the third-party plugins

	'max_load_fonts'			=> 3,							// Max fonts number to load from Google fonts or from uploaded fonts

	'use_mediaelements'			=> true,						// Load script "Media Elements" to play video and audio

	'max_excerpt_length'		=> 60,							// Max words number for the excerpt in the blog style 'Excerpt'.
																// For style 'Classic' - get half from this value
	'message_maxlength'			=> 1000							// Max length of the message from contact form
	
));



// -----------------------------------------------------------------
// -- Theme fonts (Google and/or custom fonts)
// -----------------------------------------------------------------

// Fonts to load when theme start
// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
hypnotherapy_storage_set('load_fonts', array(
	// Google font
	array(
		'name'	 => 'Amaranth',
		'family' => 'sans-serif',
		'styles' => '700'
		),
	// Font-face packed with theme
	array(
		'name'   => 'Titillium Web',
		'family' => 'sans-serif',
		'styles' => '400,600'
		),
	array(
		'name'   => 'Sacramento',
		'family' => 'cursive'
		)
));


// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
hypnotherapy_storage_set('load_fonts_subset', 'latin,latin-ext');

// Settings of the main tags
hypnotherapy_storage_set('theme_fonts', array(
	'p' => array(
		'title'				=> esc_html__('Main text', 'hypnotherapy'),
		'description'		=> esc_html__('Font settings of the main text of the site', 'hypnotherapy'),
		'font-family'		=> '"Titillium Web", sans-serif',
		'font-size' 		=> '14px',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.75em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '0em',
		'margin-bottom'		=> '1.7em'
		),
	'h1' => array(
		'title'				=> esc_html__('Heading 1', 'hypnotherapy'),
		'font-family'		=> '"Amaranth", sans-serif',
		'font-size' 		=> '4.286rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.12',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '-0.4px',
		'margin-top'		=> '0.7em',
		'margin-bottom'		=> '0.7em'
		),
	'h2' => array(
		'title'				=> esc_html__('Heading 2', 'hypnotherapy'),
		'font-family'		=> '"Amaranth", sans-serif',
		'font-size' 		=> '3.429rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.17',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '-0.3px',
		'margin-top'		=> '0.68em',
		'margin-bottom'		=> '0.68em'
		),
	'h3' => array(
		'title'				=> esc_html__('Heading 3', 'hypnotherapy'),
		'font-family'		=> '"Amaranth", sans-serif',
		'font-size' 		=> '2.571rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.17',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '-0.3px',
		'margin-top'		=> '0.97em',
		'margin-bottom'		=> '0.97em'
		),
	'h4' => array(
		'title'				=> esc_html__('Heading 4', 'hypnotherapy'),
		'font-family'		=> '"Amaranth", sans-serif',
		'font-size' 		=> '2.143rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.17',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0',
		'margin-top'		=> '0.56em',
		'margin-bottom'		=> '0.56em'
		),
	'h5' => array(
		'title'				=> esc_html__('Heading 5', 'hypnotherapy'),
		'font-family'		=> '"Amaranth", sans-serif',
		'font-size' 		=> '1.714rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.21',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0.2px',
		'margin-top'		=> '0.8em',
		'margin-bottom'		=> '0.8em'
		),
	'h6' => array(
		'title'				=> esc_html__('Heading 6', 'hypnotherapy'),
		'font-family'		=> '"Amaranth", sans-serif',
		'font-size' 		=> '1.286rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.22',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0.25px',
		'margin-top'		=> '0.9em',
		'margin-bottom'		=> '0.9em'
		),
	'logo' => array(
		'title'				=> esc_html__('Logo text', 'hypnotherapy'),
		'description'		=> esc_html__('Font settings of the text case of the logo', 'hypnotherapy'),
		'font-family'		=> '"Amaranth", sans-serif',
		'font-size' 		=> '1.8em',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.25em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0'
		),
	'button' => array(
		'title'				=> esc_html__('Buttons', 'hypnotherapy'),
		'font-family'		=> '"Titillium Web", sans-serif',
		'font-size' 		=> '1em',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> 'normal',
		'text-decoration'	=> 'none',
		'text-transform'	=> '',
		'letter-spacing'	=> '0'
		),
	'input' => array(
		'title'				=> esc_html__('Input fields', 'hypnotherapy'),
		'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'hypnotherapy'),
		'font-family'		=> '"Titillium Web", sans-serif',
		'font-size' 		=> '1em',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> 'normal',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> ''
		),
	'info' => array(
		'title'				=> esc_html__('Post meta', 'hypnotherapy'),
		'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'hypnotherapy'),
		'font-family'		=> '"Titillium Web", sans-serif',
		'font-size' 		=> '1em',
		'font-weight'		=> '600',
		'font-style'		=> '',
		'line-height'		=> '',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '',
		'margin-top'		=> '',
		'margin-bottom'		=> '3em'
		),
	'menu' => array(
		'title'				=> esc_html__('Main menu', 'hypnotherapy'),
		'description'		=> esc_html__('Font settings of the main menu items', 'hypnotherapy'),
		'font-family'		=> '"Titillium Web", sans-serif',
		'font-size' 		=> '1.143rem',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0px'
		),
	'submenu' => array(
		'title'				=> esc_html__('Dropdown menu', 'hypnotherapy'),
		'description'		=> esc_html__('Font settings of the dropdown menu items', 'hypnotherapy'),
		'font-family'		=> '"Titillium Web", sans-serif',
		'font-size' 		=> '1em',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0px'
		)
));


// -----------------------------------------------------------------
// -- Theme colors for customizer
// -- Attention! Inner scheme must be last in the array below
// -----------------------------------------------------------------
hypnotherapy_storage_set('schemes', array(

	// Color scheme: 'default'
	'default' => array(
		'title'	 => esc_html__('Default', 'hypnotherapy'),
		'colors' => array(
			
			// Whole block border and background
			'bg_color'				=> '#ffffff',
			'bd_color'				=> '#e5e5e5',

			// Text and links colors
			'text'					=> '#65908f',
			'text_light'			=> '#cacaca',
			'text_dark'				=> '#728584',
			'text_link'				=> '#f9b45c',
			'text_hover'			=> '#65908f',

			// Alternative blocks (submenu, buttons, tabs, etc.)
			'alter_bg_color'		=> '#f6f6f6',
			'alter_bg_hover'		=> '#e4e8eb',
			'alter_bd_color'		=> '#dae1e5',
			'alter_bd_hover'		=> '#ced5d9',
			'alter_text'			=> '#54535a',
			'alter_light'			=> '#bac0c3',
			'alter_dark'			=> '#1e1d22',
			'alter_link'			=> '#f9b45c',
			'alter_hover'			=> '#65908f',

			// Input fields (form's fields and textarea)
			'input_bg_color'		=> '#e1e5e8',
			'input_bg_hover'		=> '#dae1e5',
			'input_bd_color'		=> '#ced5d9',
			'input_bd_hover'		=> '#b6bcbf',
			'input_text'			=> '#bac0c3',
			'input_light'			=> '#bac0c3',
			'input_dark'			=> '#1e1d22',
			
			// Inverse blocks (text and links on accented bg)
			'inverse_text'			=> '#ffffff',
			'inverse_light'			=> '#f7f7f7',
			'inverse_dark'			=> '#ffffff',
			'inverse_link'			=> '#ffffff',
			'inverse_hover'			=> '#13162b',
			'accent1'				=> '#fa9b5b',

			// Additional accented colors (if used in the current theme)
			// For example:
			//'accent2'				=> '#faef81'
		
		)
	),

	// Color scheme: 'dark'
	'dark' => array(
		'title'  => esc_html__('Dark', 'hypnotherapy'),
		'colors' => array(
			
			// Whole block border and background
			'bg_color'				=> '#070811',
			'bd_color'				=> '#2b2e41',

			// Text and links colors
			'text'					=> '#65908f',
			'text_light'			=> '#b8c3cc',
			'text_dark'				=> '#ffffff',
			'text_link'				=> '#f9b45c',
			'text_hover'			=> '#65908f',

			// Alternative blocks (submenu, buttons, tabs, etc.)
			'alter_bg_color'		=> '#3f4040',
			'alter_bg_hover'		=> '#181e3d',
			'alter_bd_color'		=> '#181e3d',
			'alter_bd_hover'		=> '#1f254d',
			'alter_text'			=> '#969fa6',
			'alter_light'			=> '#b8c3cc',
			'alter_dark'			=> '#ffffff',
			'alter_link'			=> '#faef81',
			'alter_hover'			=> '#33a1e3',

			// Input fields (form's fields and textarea)
			'input_bg_color'		=> '#0e1123',
			'input_bg_hover'		=> '#181e3d',
			'input_bd_color'		=> '#181e3d',
			'input_bd_hover'		=> '#181e3d',
			'input_text'			=> '#969fa6',
			'input_light'			=> '#b8c3cc',
			'input_dark'			=> '#ffffff',
			
			// Inverse blocks (text and links on accented bg)
			'inverse_text'			=> '#54535a',
			'inverse_light'			=> '#bac0c3',
			'inverse_dark'			=> '#1e1d22',
			'inverse_link'			=> '#000000',
			'inverse_hover'			=> '#1e1d22',
			'accent1'				=> '#fa9b5b',
		
			// Additional accented colors (if used in the current theme)
			// For example:
			//'accent2'				=> '#ff6469'

		)
	)

));




// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('hypnotherapy_options_create')) {

	function hypnotherapy_options_create() {

		hypnotherapy_storage_set('options', array(
		
			// Section 'Title & Tagline' - add theme options in the standard WP section
			'title_tagline' => array(
				"title" => esc_html__('Title, Tagline & Site icon', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Specify site title and tagline (if need) and upload the site icon', 'hypnotherapy') ),
				"type" => "section"
				),
		
		
			// Section 'Header' - add theme options in the standard WP section
			'header_image' => array(
				"title" => esc_html__('Header', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload logo images, select header type and widgets set for the header', 'hypnotherapy') ),
				"type" => "section"
				),
			'header_image_override' => array(
				"title" => esc_html__('Header image override', 'hypnotherapy'),
				"desc" => wp_kses_data( __("Allow override the header image with the page's/post's/product's/etc. featured image", 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'show_title_box' => array(
				"title" => esc_html__('Show page title', 'hypnotherapy'),
				"desc" => wp_kses_data( __("Show page title box with breadcrumbs and background fullwide image", 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'header_fullheight' => array(
				"title" => esc_html__('Header fullheight', 'hypnotherapy'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 0,
				"type" => "hidden"
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwide', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 1,
				"type" => "hidden"
				),
			'header_style' => array(
				"title" => esc_html__('Header style', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select style to display the site header', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 'header-default',
				"options" => apply_filters('hypnotherapy_filter_list_header_styles', array(
					'header-default' => esc_html__('Default Header',	'hypnotherapy')
				)),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 'default',
				"options" => array(
					'default' => esc_html__('Default','hypnotherapy'),
					'over' => esc_html__('Over',	'hypnotherapy'),
					'under' => esc_html__('Under',	'hypnotherapy')
				),
				"type" => "hidden"
				),
			'header_widgets' => array(
				"title" => esc_html__('Header widgets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on each page', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'hypnotherapy') ),
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "hidden"
				),
			'header_columns' => array(
				"title" => esc_html__('Header columns', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 0,
				"options" => hypnotherapy_get_list_range(0,6),
				"type" => "hidden"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select color scheme to decorate header area', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 'inherit',
				"options" => hypnotherapy_get_list_schemes(true),
				"type" => "select"
				),
			'menu_info' => array(
				"title" => esc_html__('Menu settings', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select main menu style, position, color scheme and other parameters', 'hypnotherapy') ),
				"type" => "hidden"
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 'top',
				"options" => array(
					'top'	=> esc_html__('Top',	'hypnotherapy'),
					'left'	=> esc_html__('Left',	'hypnotherapy'),
					'right'	=> esc_html__('Right',	'hypnotherapy')
				),
				"type" => "hidden"
				),
			'menu_scheme' => array(
				"title" => esc_html__('Menu Color Scheme', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select color scheme to decorate main menu area', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => 'inherit',
				"options" => hypnotherapy_get_list_schemes(true),
				"refresh" => false,
				"type" => "hidden"
				),
			'menu_side_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'hypnotherapy') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_side_icons' => array(
				"title" => esc_html__('Iconed sidemenu', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'hypnotherapy') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_mobile_fullscreen' => array(
				"title" => esc_html__('Mobile menu fullscreen', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'hypnotherapy') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'logo_info' => array(
				"title" => esc_html__('Logo settings', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select logo images for the normal and Retina displays', 'hypnotherapy') ),
				"type" => "info"
				),
			'logo' => array(
				"title" => esc_html__('Logo', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload site logo', 'hypnotherapy') ),
				"std" => '',
				"type" => "image"
				),
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'hypnotherapy') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse' => array(
				"title" => esc_html__('Logo inverse', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it on the dark background', 'hypnotherapy') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse_retina' => array(
				"title" => esc_html__('Logo inverse for Retina', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'hypnotherapy') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side' => array(
				"title" => esc_html__('Logo side', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu', 'hypnotherapy') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side_retina' => array(
				"title" => esc_html__('Logo side for Retina', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'hypnotherapy') ),
				"std" => '',
				"type" => "image"
				),
			'logo_text' => array(
				"title" => esc_html__('Logo from Site name', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Do you want use Site name and description as Logo if images above are not selected?', 'hypnotherapy') ),
				"std" => 0,
				"type" => "checkbox"
				),
			
		
		
			// Section 'Content'
			'content' => array(
				"title" => esc_html__('Content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Options for the content area', 'hypnotherapy') ),
				"type" => "section",
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select width of the body content', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => array(
					'boxed'		=> esc_html__('Boxed',		'hypnotherapy'),
					'wide'		=> esc_html__('Wide',		'hypnotherapy'),
					'fullwide'	=> esc_html__('Fullwide',	'hypnotherapy'),
					'fullscreen'=> esc_html__('Fullscreen',	'hypnotherapy')
				),
				"type" => "select"
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select color scheme to decorate whole site. Attention! Case "Inherit" can be used only for custom pages, not for root site content in the Appearance - Customize', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"std" => 'default',
				"options" => hypnotherapy_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox"
				),

			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'hypnotherapy') ),
				"std" => 0,
				"type" => "checkbox"
				),

			'hide_title' => array(
				"title" => esc_html__('Hide title', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Hide title if you want.', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'post,page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"std" => 0,
				"type" => "checkbox"
				),

			'hide_featured' => array(
				"title" => esc_html__('Hide featured', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Hide featured images if you want', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'post,page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"std" => 0,
				"type" => "checkbox"
				),

			'boxed_bg_image' => array(
				"title" => esc_html__('Boxed bg image', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload image, used as background in the boxed body', 'hypnotherapy') ),
				"dependency" => array(
					'body_style' => array('boxed')
				),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"std" => '',
				"type" => "image"
				),
			'no_image' => array(
				"title" => esc_html__('No image placeholder', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload image, used as placeholder for the posts without featured image', 'hypnotherapy') ),
				"std" => '',
				"type" => "image"
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'hypnotherapy')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Color Scheme', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select color scheme to decorate sidebar', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'hypnotherapy')
				),
				"std" => 'side',
				"options" => hypnotherapy_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'hypnotherapy')
				),
				"refresh" => false,
				"std" => 'right',
				"options" => hypnotherapy_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page' => array(
				"title" => esc_html__('Widgets above the page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'hypnotherapy')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content' => array(
				"title" => esc_html__('Widgets above the content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'hypnotherapy')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content' => array(
				"title" => esc_html__('Widgets below the content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'hypnotherapy')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page' => array(
				"title" => esc_html__('Widgets below the page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'hypnotherapy')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
		
		
		
			// Section 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select set of widgets and columns number for the site footer', 'hypnotherapy') ),
				"type" => "section"
				),
			'footer_style' => array(
				"title" => esc_html__('Footer style', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select style to display the site footer', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Footer', 'hypnotherapy')
				),
				"std" => 'footer-default',
				"options" => apply_filters('hypnotherapy_filter_list_footer_styles', array(
					'footer-default' => esc_html__('Default Footer',	'hypnotherapy')
				)),
				"type" => "select"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hypnotherapy')
				),
				"std" => 'dark',
				"options" => hypnotherapy_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hypnotherapy')
				),
				"std" => 'footer_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hypnotherapy')
				),
				"dependency" => array(
					'footer_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => hypnotherapy_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwide(for default output)', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hypnotherapy')
				),
				"std" => 0,
				"type" => "hidden"
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'hypnotherapy') ),
				'refresh' => false,
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'hypnotherapy') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'hypnotherapy') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'hypnotherapy') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Copyright text in the footer', 'hypnotherapy') ),
				"std" => esc_html__('Ancorathemes &copy; {Y}. All rights reserved. Terms of use and Privacy Policy', 'hypnotherapy'),
				"refresh" => false,
				"type" => "textarea"
				),
		
		
		
			// Section 'Homepage' - settings for home page
			'homepage' => array(
				"title" => esc_html__('Homepage', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select blog style and widgets to display on the homepage', 'hypnotherapy') ),
				"type" => "section"
				),
			'expand_content_home' => array(
				"title" => esc_html__('Expand content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the Homepage', 'hypnotherapy') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style_home' => array(
				"title" => esc_html__('Blog style', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select posts style for the homepage', 'hypnotherapy') ),
				"std" => 'excerpt',
				"options" => hypnotherapy_get_list_blog_styles(),
				"type" => "select"
				),
			'first_post_large_home' => array(
				"title" => esc_html__('First post large', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of the Homepage', 'hypnotherapy') ),
				"dependency" => array(
					'blog_style_home' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_widgets_home' => array(
				"title" => esc_html__('Header widgets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the homepage', 'hypnotherapy') ),
				"std" => 'header_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_widgets_home' => array(
				"title" => esc_html__('Sidebar widgets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select sidebar to show on the homepage', 'hypnotherapy') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_home' => array(
				"title" => esc_html__('Sidebar position', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the homepage', 'hypnotherapy') ),
				"refresh" => false,
				"std" => 'right',
				"options" => hypnotherapy_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page_home' => array(
				"title" => esc_html__('Widgets above the page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content_home' => array(
				"title" => esc_html__('Widgets above the content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content_home' => array(
				"title" => esc_html__('Widgets below the content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page_home' => array(
				"title" => esc_html__('Widgets below the page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			
		
		
			// Section 'Blog archive'
			'blog' => array(
				"title" => esc_html__('Blog archive', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Options for the blog archive', 'hypnotherapy') ),
				"type" => "section",
				),
			'expand_content_blog' => array(
				"title" => esc_html__('Expand content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the blog archive', 'hypnotherapy') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style' => array(
				"title" => esc_html__('Blog style', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select posts style for the blog archive', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"std" => 'excerpt',
				"options" => hypnotherapy_get_list_blog_styles(),
				"type" => "select"
				),
			'blog_columns' => array(
				"title" => esc_html__('Blog columns', 'hypnotherapy'),
				"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'hypnotherapy') ),
				"std" => 2,
				"options" => hypnotherapy_get_list_range(2,4),
				"type" => "hidden"
				),
			'post_type' => array(
				"title" => esc_html__('Post type', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"linked" => 'parent_cat',
				"refresh" => false,
				"hidden" => true,
				"std" => 'post',
				"options" => hypnotherapy_get_list_posts_types(),
				"type" => "select"
				),
			'parent_cat' => array(
				"title" => esc_html__('Category to show', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select category to show in the blog archive', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"refresh" => false,
				"hidden" => true,
				"std" => '0',
				"options" => hypnotherapy_array_merge(array(0 => esc_html__('- Select category -', 'hypnotherapy')), hypnotherapy_get_list_categories()),
				"type" => "select"
				),
			'posts_per_page' => array(
				"title" => esc_html__('Posts per page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"hidden" => true,
				"std" => '10',
				"type" => "text"
				),
			"blog_pagination" => array( 
				"title" => esc_html__('Pagination style', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"std" => "links",
				"options" => array(
					'pages'	=> esc_html__("Page numbers", 'hypnotherapy'),
					'links'	=> esc_html__("Older/Newest", 'hypnotherapy'),
					'more'	=> esc_html__("Load more", 'hypnotherapy'),
					'infinite' => esc_html__("Infinite scroll", 'hypnotherapy')
				),
				"type" => "select"
				),
			'show_filters' => array(
				"title" => esc_html__('Show filters', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
					'blog_style' => array('portfolio', 'gallery')
				),
				"hidden" => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'first_post_large' => array(
				"title" => esc_html__('First post large', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of blog archive', 'hypnotherapy') ),
				"dependency" => array(
					'blog_style' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			"blog_content" => array( 
				"title" => esc_html__('Posts content', 'hypnotherapy'),
				"desc" => wp_kses_data( __("Show full post's content in the blog or only post's excerpt", 'hypnotherapy') ),
				"std" => "excerpt",
				"options" => array(
					'excerpt'	=> esc_html__('Excerpt',	'hypnotherapy'),
					'fullpost'	=> esc_html__('Full post',	'hypnotherapy')
				),
				"type" => "select"
				),
			'time_diff_before' => array(
				"title" => esc_html__('Time difference', 'hypnotherapy'),
				"desc" => wp_kses_data( __("How many days show time difference instead post's date", 'hypnotherapy') ),
				"std" => 5,
				"type" => "text"
				),
			'show_autor_bio' => array(
				"title" => esc_html__('Author info', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Do you want to show author info on the single page?', 'hypnotherapy') ),
				"std" => 1,
				"type" => "checkbox"
				),
			'show_related_post' => array(
				"title" => esc_html__('Show related', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Do you want to show related posts?', 'hypnotherapy') ),
				"std" => 1,
				"type" => "checkbox"
				),
			'related_posts' => array(
				"title" => esc_html__('Related posts', 'hypnotherapy'),
				"desc" => wp_kses_data( __('How many related posts should be displayed in the single post?', 'hypnotherapy') ),
				"std" => 2,
				"options" => hypnotherapy_get_list_range(2,4),
				"type" => "select"
				),
			'related_style' => array(
				"title" => esc_html__('Related posts style', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select style of the related posts output', 'hypnotherapy') ),
				"std" => 2,
				"options" => hypnotherapy_get_list_styles(1,2),
				"type" => "select"
				),
			"blog_animation" => array( 
				"title" => esc_html__('Animation for the posts', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hypnotherapy')
				),
				"dependency" => array(
					'#page_template' => array('blog.php')
				),
				"std" => "none",
				"options" => hypnotherapy_get_list_animations_in(),
				"type" => "select"
				),
			'header_widgets_blog' => array(
				"title" => esc_html__('Header widgets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the blog archive', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_widgets_blog' => array(
				"title" => esc_html__('Sidebar widgets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select sidebar to show on the blog archive', 'hypnotherapy') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_blog' => array(
				"title" => esc_html__('Sidebar position', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the blog archive', 'hypnotherapy') ),
				"refresh" => false,
				"std" => 'right',
				"options" => hypnotherapy_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page_blog' => array(
				"title" => esc_html__('Widgets above the page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content_blog' => array(
				"title" => esc_html__('Widgets above the content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content_blog' => array(
				"title" => esc_html__('Widgets below the content', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page_blog' => array(
				"title" => esc_html__('Widgets below the page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'hypnotherapy') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hypnotherapy')), hypnotherapy_get_list_sidebars()),
				"type" => "select"
				),
			
		
		
		
			// Section 'Colors' - choose color scheme and customize separate colors from it
			'scheme' => array(
				"title" => esc_html__('* Color scheme editor', 'hypnotherapy'),
				"desc" => wp_kses_data( __("<b>Simple settings</b> - you can change only accented color, used for links, buttons and some accented areas.", 'hypnotherapy') )
						. '<br>'
						. wp_kses_data( __("<b>Advanced settings</b> - change all scheme's colors and get full control over the appearance of your site!", 'hypnotherapy') ),
				"priority" => 1000,
				"type" => "section"
				),
		
			'color_settings' => array(
				"title" => esc_html__('Color settings', 'hypnotherapy'),
				"desc" => '',
				"std" => 'simple',
				"options" => array(
					"simple"  => esc_html__("Simple", 'hypnotherapy'),
					"advanced" => esc_html__("Advanced", 'hypnotherapy')
				),
				"refresh" => false,
				"type" => "switch"
				),
		
			'color_scheme_editor' => array(
				"title" => esc_html__('Color Scheme', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Select color scheme to edit colors', 'hypnotherapy') ),
				"std" => 'default',
				"options" => hypnotherapy_get_list_schemes(),
				"refresh" => false,
				"type" => "select"
				),
		
			'scheme_storage' => array(
				"title" => esc_html__('Colors storage', 'hypnotherapy'),
				"desc" => esc_html__('Hidden storage of the all color from the all color shemes (only for internal usage)', 'hypnotherapy'),
				"std" => '',
				"refresh" => false,
				"type" => "hidden"
				),
		
			'scheme_info_single' => array(
				"title" => esc_html__('Colors for single post/page', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Specify colors for single post/page (not for alter blocks)', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
				
			'bg_color' => array(
				"title" => esc_html__('Background color', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Background color of the whole page', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'bd_color' => array(
				"title" => esc_html__('Border color', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the bordered elements, separators, etc.', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'text' => array(
				"title" => esc_html__('Text', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Plain text color on single page/post', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_light' => array(
				"title" => esc_html__('Light text', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the post meta: post date and author, comments number, etc.', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_dark' => array(
				"title" => esc_html__('Dark text', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the headers, strong text, etc.', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_link' => array(
				"title" => esc_html__('Links', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of links and accented areas', 'hypnotherapy') ),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_hover' => array(
				"title" => esc_html__('Links hover', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Hover color for links and accented areas', 'hypnotherapy') ),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_alter' => array(
				"title" => esc_html__('Colors for alternative blocks', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Specify colors for alternative blocks - rectangular blocks with its own background color (posts in homepage, blog archive, search results, widgets on sidebar, footer, etc.)', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'alter_bg_color' => array(
				"title" => esc_html__('Alter background color', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Background color of the alternative blocks', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bg_hover' => array(
				"title" => esc_html__('Alter hovered background color', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Background color for the hovered state of the alternative blocks', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_color' => array(
				"title" => esc_html__('Alternative border color', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Border color of the alternative blocks', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_hover' => array(
				"title" => esc_html__('Alternative hovered border color', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Border color for the hovered state of the alter blocks', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_text' => array(
				"title" => esc_html__('Alter text', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Text color of the alternative blocks', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_light' => array(
				"title" => esc_html__('Alter light', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with alternative background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_dark' => array(
				"title" => esc_html__('Alter dark', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the headers inside block with alternative background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_link' => array(
				"title" => esc_html__('Alter link', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the links inside block with alternative background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_hover' => array(
				"title" => esc_html__('Alter hover', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with alternative background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_input' => array(
				"title" => esc_html__('Colors for the form fields', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Specify colors for the form fields and textareas', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'input_bg_color' => array(
				"title" => esc_html__('Inactive background', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Background color of the inactive form fields', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bg_hover' => array(
				"title" => esc_html__('Active background', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Background color of the focused form fields', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_color' => array(
				"title" => esc_html__('Inactive border', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the border in the inactive form fields', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_hover' => array(
				"title" => esc_html__('Active border', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the border in the focused form fields', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_text' => array(
				"title" => esc_html__('Inactive field', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the text in the inactive fields', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_light' => array(
				"title" => esc_html__('Disabled field', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the disabled field', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_dark' => array(
				"title" => esc_html__('Active field', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the active field', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_inverse' => array(
				"title" => esc_html__('Colors for inverse blocks', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Specify colors for inverse blocks, rectangular blocks with background color equal to the links color or one of accented colors (if used in the current theme)', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'inverse_text' => array(
				"title" => esc_html__('Inverse text', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the text inside block with accented background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_light' => array(
				"title" => esc_html__('Inverse light', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with accented background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_dark' => array(
				"title" => esc_html__('Inverse dark', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the headers inside block with accented background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_link' => array(
				"title" => esc_html__('Inverse link', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the links inside block with accented background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_hover' => array(
				"title" => esc_html__('Inverse hover', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with accented background', 'hypnotherapy') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hypnotherapy_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),


			// Section 'Hidden'
			'media_title' => array(
				"title" => esc_html__('Media title', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'hypnotherapy')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'hypnotherapy') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'hypnotherapy')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),


			// Internal options.
			// Attention! Don't change any options in the section below!
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"type" => "hidden",
				),

		));


		// Prepare panel 'Fonts'
		$fonts = array(
		
			// Panel 'Fonts' - manage fonts loading and set parameters of the base theme elements
			'fonts' => array(
				"title" => esc_html__('* Fonts settings', 'hypnotherapy'),
				"desc" => '',
				"priority" => 1500,
				"type" => "panel"
				),

			// Section 'Load_fonts'
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'hypnotherapy') )
						. '<br>'
						. wp_kses_data( __('<b>Attention!</b> Press "Refresh" button to reload preview area after the all fonts are changed', 'hypnotherapy') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'hypnotherapy'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'hypnotherapy') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'hypnotherapy') ),
				"refresh" => false,
				"std" => '$hypnotherapy_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=hypnotherapy_get_theme_setting('max_load_fonts'); $i++) {
			$fonts["load_fonts-{$i}-info"] = array(
				"title" => esc_html(sprintf(__('Font %s', 'hypnotherapy'), $i)),
				"desc" => '',
				"type" => "info",
				);
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'hypnotherapy'),
				"desc" => '',
				"refresh" => false,
				"std" => '$hypnotherapy_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'hypnotherapy'),
				"desc" => $i==1 
							? wp_kses_data( __('Select font family to use it if font above is not available', 'hypnotherapy') )
							: '',
				"refresh" => false,
				"std" => '$hypnotherapy_get_load_fonts_option',
				"options" => array(
					'inherit' => esc_html__("Inherit", 'hypnotherapy'),
					'serif' => esc_html__('serif', 'hypnotherapy'),
					'sans-serif' => esc_html__('sans-serif', 'hypnotherapy'),
					'monospace' => esc_html__('monospace', 'hypnotherapy'),
					'cursive' => esc_html__('cursive', 'hypnotherapy'),
					'fantasy' => esc_html__('fantasy', 'hypnotherapy')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'hypnotherapy'),
				"desc" => $i==1 
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'hypnotherapy') )
											. '<br>'
								. wp_kses_data( __('<b>Attention!</b> Each weight and style increase download size! Specify only used weights and styles.', 'hypnotherapy') )
							: '',
				"refresh" => false,
				"std" => '$hypnotherapy_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Sections with font's attributes for each theme element
		$theme_fonts = hypnotherapy_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title']) 
								? $v['title'] 
								: esc_html(sprintf(__('%s settings', 'hypnotherapy'), $tag)),
				"desc" => !empty($v['description']) 
								? $v['description'] 
								: wp_kses_post( sprintf(__('Font settings of the "%s" tag.', 'hypnotherapy'), $tag) ),
				"type" => "section",
				);
	
			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = hypnotherapy_get_list_load_fonts(true);
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hypnotherapy'),
						'100' => esc_html__('100 (Light)', 'hypnotherapy'), 
						'200' => esc_html__('200 (Light)', 'hypnotherapy'), 
						'300' => esc_html__('300 (Thin)',  'hypnotherapy'),
						'400' => esc_html__('400 (Normal)', 'hypnotherapy'),
						'500' => esc_html__('500 (Semibold)', 'hypnotherapy'),
						'600' => esc_html__('600 (Semibold)', 'hypnotherapy'),
						'700' => esc_html__('700 (Bold)', 'hypnotherapy'),
						'800' => esc_html__('800 (Black)', 'hypnotherapy'),
						'900' => esc_html__('900 (Black)', 'hypnotherapy')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hypnotherapy'),
						'normal' => esc_html__('Normal', 'hypnotherapy'), 
						'italic' => esc_html__('Italic', 'hypnotherapy')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hypnotherapy'),
						'none' => esc_html__('None', 'hypnotherapy'), 
						'underline' => esc_html__('Underline', 'hypnotherapy'),
						'overline' => esc_html__('Overline', 'hypnotherapy'),
						'line-through' => esc_html__('Line-through', 'hypnotherapy')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hypnotherapy'),
						'none' => esc_html__('None', 'hypnotherapy'), 
						'uppercase' => esc_html__('Uppercase', 'hypnotherapy'),
						'lowercase' => esc_html__('Lowercase', 'hypnotherapy'),
						'capitalize' => esc_html__('Capitalize', 'hypnotherapy')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"refresh" => false,
					"std" => '$hypnotherapy_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}
			
			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters into Theme Options
		hypnotherapy_storage_merge_array('options', '', $fonts);

		// Add Header Video if WP version < 4.7
		if (!function_exists('get_header_video_url')) {
			hypnotherapy_storage_set_array_after('options', 'header_image_override', 'header_video', array(
				"title" => esc_html__('Header video', 'hypnotherapy'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'hypnotherapy') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hypnotherapy')
				),
				"std" => '',
				"type" => "video"
				)
			);
		}
	}
}




// -----------------------------------------------------------------
// -- Create and manage Theme Options
// -----------------------------------------------------------------

// Theme init priorities:
// 2 - create Theme Options
if (!function_exists('hypnotherapy_options_theme_setup2')) {
	add_action( 'after_setup_theme', 'hypnotherapy_options_theme_setup2', 2 );
	function hypnotherapy_options_theme_setup2() {
		hypnotherapy_options_create();
	}
}

// Step 1: Load default settings and previously saved mods
if (!function_exists('hypnotherapy_options_theme_setup5')) {
	add_action( 'after_setup_theme', 'hypnotherapy_options_theme_setup5', 5 );
	function hypnotherapy_options_theme_setup5() {
		hypnotherapy_storage_set('options_reloaded', false);
		hypnotherapy_load_theme_options();
	}
}

// Step 2: Load current theme customization mods
if (is_customize_preview()) {
	if (!function_exists('hypnotherapy_load_custom_options')) {
		add_action( 'wp_loaded', 'hypnotherapy_load_custom_options' );
		function hypnotherapy_load_custom_options() {
			if (!hypnotherapy_storage_get('options_reloaded')) {
				hypnotherapy_storage_set('options_reloaded', true);
				hypnotherapy_load_theme_options();
			}
		}
	}
}

// Load current values for each customizable option
if ( !function_exists('hypnotherapy_load_theme_options') ) {
	function hypnotherapy_load_theme_options() {
		$options = hypnotherapy_storage_get('options');
		$reset = (int) get_theme_mod('reset_options', 0);
		foreach ($options as $k=>$v) {
			if (isset($v['std'])) {
				if (strpos($v['std'], '$hypnotherapy_')!==false) {
					$func = substr($v['std'], 1);
					if (function_exists($func)) {
						$v['std'] = $func($k);
					}
				}
				$value = $v['std'];
				if (!$reset) {
					if (isset($_GET[$k]))
						$value = $_GET[$k];
					else {
						$tmp = get_theme_mod($k, -987654321);
						if ($tmp != -987654321) $value = $tmp;
					}
				}
				hypnotherapy_storage_set_array2('options', $k, 'val', $value);
				if ($reset) remove_theme_mod($k);
			}
		}
		if ($reset) {
			// Unset reset flag
			set_theme_mod('reset_options', 0);
			// Regenerate CSS with default colors and fonts
			hypnotherapy_customizer_save_css();
		} else {
			do_action('hypnotherapy_action_load_options');
		}
	}
}

// Override options with stored page/post meta
if ( !function_exists('hypnotherapy_override_theme_options') ) {
	add_action( 'wp', 'hypnotherapy_override_theme_options', 1 );
	function hypnotherapy_override_theme_options($query=null) {
		if (is_page_template('blog.php')) {
			hypnotherapy_storage_set('blog_archive', true);
			hypnotherapy_storage_set('blog_template', get_the_ID());
		}
		hypnotherapy_storage_set('blog_mode', hypnotherapy_detect_blog_mode());
		if (is_singular()) {
			hypnotherapy_storage_set('options_meta', get_post_meta(get_the_ID(), 'hypnotherapy_options', true));
		}
	}
}


// Return customizable option value
if (!function_exists('hypnotherapy_get_theme_option')) {
	function hypnotherapy_get_theme_option($name, $defa='', $strict_mode=false, $post_id=0) {
		$rez = $defa;
		$from_post_meta = false;
		if ($post_id > 0) {
			if (!hypnotherapy_storage_isset('post_options_meta', $post_id))
				hypnotherapy_storage_set_array('post_options_meta', $post_id, get_post_meta($post_id, 'hypnotherapy_options', true));
			if (hypnotherapy_storage_isset('post_options_meta', $post_id, $name)) {
				$tmp = hypnotherapy_storage_get_array('post_options_meta', $post_id, $name);
				if (!hypnotherapy_is_inherit($tmp)) {
					$rez = $tmp;
					$from_post_meta = true;
				}
			}
		}
		if (!$from_post_meta && hypnotherapy_storage_isset('options')) {
			if ( !hypnotherapy_storage_isset('options', $name) ) {
				$rez = $tmp = '_not_exists_';
				if (function_exists('trx_addons_get_option'))
					$rez = trx_addons_get_option($name, $tmp, false);
				if ($rez === $tmp) {
					if ($strict_mode) {
						$s = debug_backtrace();
						//array_shift($s);
						$s = array_shift($s);
						echo '<pre>' . sprintf(esc_html__('Undefined option "%s" called from:', 'hypnotherapy'), $name);
						if (function_exists('dco')) dco($s);
						else print_r($s);
						echo '</pre>';
						die();
					} else
						$rez = $defa;
				}
			} else {
				$blog_mode = hypnotherapy_storage_get('blog_mode');
				// Override option from GET or POST for current blog mode
				if (!empty($blog_mode) && isset($_REQUEST[$name . '_' . $blog_mode])) {
					$rez = $_REQUEST[$name . '_' . $blog_mode];
				// Override option from GET
				} else if (isset($_REQUEST[$name])) {
					$rez = $_REQUEST[$name];
				// Override option from current page settings (if exists)
				} else if (hypnotherapy_storage_isset('options_meta', $name) && !hypnotherapy_is_inherit(hypnotherapy_storage_get_array('options_meta', $name))) {
					$rez = hypnotherapy_storage_get_array('options_meta', $name);
				// Override option from current blog mode settings: 'home', 'search', 'page', 'post', 'blog', etc. (if exists)
				} else if (!empty($blog_mode) && hypnotherapy_storage_isset('options', $name . '_' . $blog_mode, 'val') && !hypnotherapy_is_inherit(hypnotherapy_storage_get_array('options', $name . '_' . $blog_mode, 'val'))) {
					$rez = hypnotherapy_storage_get_array('options', $name . '_' . $blog_mode, 'val');
				// Get saved option value
				} else if (hypnotherapy_storage_isset('options', $name, 'val')) {
					$rez = hypnotherapy_storage_get_array('options', $name, 'val');
				// Get ThemeREX Addons option value
				} else if (function_exists('trx_addons_get_option')) {
					$rez = trx_addons_get_option($name, $defa, false);
				}
			}
		}
		return $rez;
	}
}


// Check if customizable option exists
if (!function_exists('hypnotherapy_check_theme_option')) {
	function hypnotherapy_check_theme_option($name) {
		return hypnotherapy_storage_isset('options', $name);
	}
}

// Get dependencies list from the Theme Options
if ( !function_exists('hypnotherapy_get_theme_dependencies') ) {
	function hypnotherapy_get_theme_dependencies() {
		$options = hypnotherapy_storage_get('options');
		$depends = array();
		foreach ($options as $k=>$v) {
			if (isset($v['dependency'])) 
				$depends[$k] = $v['dependency'];
		}
		return $depends;
	}
}

// Return internal theme setting value
if (!function_exists('hypnotherapy_get_theme_setting')) {
	function hypnotherapy_get_theme_setting($name) {
		return hypnotherapy_storage_isset('settings', $name) ? hypnotherapy_storage_get_array('settings', $name) : false;
	}
}


// Set theme setting
if ( !function_exists( 'hypnotherapy_set_theme_setting' ) ) {
	function hypnotherapy_set_theme_setting($option_name, $value) {
		if (hypnotherapy_storage_isset('settings', $option_name))
			hypnotherapy_storage_set_array('settings', $option_name, $value);
	}
}
?>