<?php
/**
 * About configuration
 *
 * @package Super_Construction
 */

$config = array(
	'menu_name' => esc_html__( 'About Super Construction', 'super-construction' ),
	'page_name' => esc_html__( 'About Super Construction', 'super-construction' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'super-construction' ), 'Super Construction' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'super-construction' ), 'Super Construction' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','super-construction' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/downloads/super-construction/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','super-construction' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/demo/super-construction/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','super-construction' ),
			'url'    => 'https://www.prodesigns.com/wordpress-themes/documentation/super-construction/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','super-construction' ),
			'url'  => 'https://wordpress.org/support/theme/super-construction/reviews/',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'super-construction' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'super-construction' ),
		'support'             => esc_html__( 'Support', 'super-construction' ),
		'upgrade_to_pro'      => esc_html__( 'Upgrade to Pro', 'super-construction' ),
		'free_pro'            => esc_html__( 'FREE VS. PRO', 'super-construction' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'super-construction' ),
			'text'                => esc_html__( 'Find step by step instructions with video documentation to setup theme easily.', 'super-construction' ),
			'button_label'        => esc_html__( 'View documentation', 'super-construction' ),
			'button_link'         => 'https://www.prodesigns.com/wordpress-themes/documentation/super-construction/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'super-construction' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'super-construction' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'super-construction' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=super-construction-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'super-construction' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'super-construction' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'super-construction' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','super-construction' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'super-construction' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'super-construction' ) . '</a>',
			),

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'super-construction' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'super-construction' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'super-construction' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'super-construction' ),
			'button_label' => esc_html__( 'Contact Support', 'super-construction' ),
			'button_link'  => esc_url( 'https://www.prodesigns.com/wordpress-themes/support/item/super-construction/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'super-construction' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'super-construction' ),
			'button_label' => esc_html__( 'View Documentation', 'super-construction' ),
			'button_link'  => 'https://www.prodesigns.com/wordpress-themes/documentation/super-construction/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'super-construction' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for additional features and options.', 'super-construction' ),
			'button_label' => esc_html__( 'View Pro Version', 'super-construction' ),
			'button_link'  => 'https://www.prodesigns.com/wordpress-themes/downloads/super-construction-plus/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Youtube Video Tutorials', 'super-construction' ),
			'icon'         => 'dashicons dashicons-video-alt3',
			'text'         => esc_html__( 'Please check our youtube channel for video instructions of Super Construction setup and customization.', 'super-construction' ),
			'button_label' => esc_html__( 'Video Tutorials', 'super-construction' ),
			'button_link'  => 'https://www.youtube.com/watch?v=qjSGtZuJMVg&list=PL-Ic437QwxQ86hPySM7-gsUBKNGaHetpy',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Customization Request', 'super-construction' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'We have dedicated team members for theme customization. Feel free to contact us any time if you need any customization service.', 'super-construction' ),
			'button_label' => esc_html__( 'Customization Request', 'super-construction' ),
			'button_link'  => 'https://www.prodesigns.com/wordpress-themes/contact-us/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'sixth' => array(
			'title'        => esc_html__( 'Child Theme', 'super-construction' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'super-construction' ),
			'button_label' => esc_html__( 'About child theme', 'super-construction' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
	),

	// Upgrade.
	'upgrade_to_pro' 	=> array(
		'description'   => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'super-construction' ),
		'button_label' 	=> esc_html__( 'Upgrade to Pro', 'super-construction' ),
		'button_link'  	=> 'https://www.prodesigns.com/wordpress-themes/downloads/super-construction-plus/',
		'is_new_tab'   	=> true,
	),

    // Free vs pro array.
    'free_pro' => array(
	    array(
		    'title'		=> esc_html__( 'Custom Widgets', 'super-construction' ),
		    'desc' 		=> esc_html__( 'Widgets added by theme to enhance features', 'super-construction' ),
		    'free' 		=> esc_html__('10','super-construction'),
		    'pro'  		=> esc_html__('12','super-construction'),
	    ),
	    
	    array(
		    'title'     => esc_html__( 'Google Fonts', 'super-construction' ),
		    'desc' 		=> esc_html__( 'Google fonts options for changing the overall site fonts', 'super-construction' ),
		    'free'  	=> 'no',
		    'pro'   	=> esc_html__('100+','super-construction'),
	    ),
	    array(
		    'title'     => esc_html__( 'Color Options', 'super-construction' ),
		    'desc'      => esc_html__( 'Options to change primary color of the site', 'super-construction' ),
		    'free'      => esc_html__('no','super-construction'),
		    'pro'       => esc_html__('yes','super-construction'),
	    ),
	    array(
		    'title'     => esc_html__( 'WooCommerce Ready', 'super-construction' ),
		    'desc'      => esc_html__( 'Theme supports/works with WooCommerce plugin', 'super-construction' ),
		    'free'      => esc_html__('no','super-construction'),
		    'pro'       => esc_html__('yes','super-construction'),
	    ),
        array(
    	    'title'     => esc_html__( 'Latest Product Carousel', 'super-construction' ),
    	    'desc'      => esc_html__( 'Widget to display latest products in carousel mode', 'super-construction' ),
    	    'free'      => esc_html__('no','super-construction'),
    	    'pro'       => esc_html__('yes','super-construction'),
        ),

        array(
    	    'title'     => esc_html__( 'Fact Counter', 'super-construction' ),
    	    'desc'      => esc_html__( 'Widget to display facts count that goes up when viewport is visible', 'super-construction' ),
    	    'free'      => esc_html__('no','super-construction'),
    	    'pro'       => esc_html__('yes','super-construction'),
        ),
        array(
    	    'title'     => esc_html__( 'Hide Footer Credit', 'super-construction' ),
    	    'desc'      => esc_html__( 'Option to enable/disable Powerby(Designer) credit in footer', 'super-construction' ),
    	    'free'      => esc_html__('no','super-construction'),
    	    'pro'       => esc_html__('yes','super-construction'),
        ),
        array(
    	    'title'     => esc_html__( 'Override Footer Credit', 'super-construction' ),
    	    'desc'      => esc_html__( 'Option to Override existing Powerby credit of footer', 'super-construction' ),
    	    'free'      => esc_html__('no','super-construction'),
    	    'pro'       => esc_html__('yes','super-construction'),
        ),
	    array(
		    'title'     => esc_html__( 'SEO', 'super-construction' ),
		    'desc' 		=> esc_html__( 'Developed with high skilled SEO tools.', 'super-construction' ),
		    'free'  	=> 'yes',
		    'pro'   	=> 'yes',
	    ),
	    array(
		    'title'     => esc_html__( 'Support Forum', 'super-construction' ),
		    'desc'      => esc_html__( 'Highly experienced and dedicated support team for your help plus online chat.', 'super-construction' ),
		    'free'      => esc_html__('yes', 'super-construction'),
		    'pro'       => esc_html__('High Priority', 'super-construction'),
	    )

    ),

);
Super_Construction_About::init( apply_filters( 'super_construction_about_filter', $config ) );
