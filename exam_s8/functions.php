<?php
/**
 * exam_s8 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package exam_s8
 */

if ( ! function_exists( 'exam_s8_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function exam_s8_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on exam_s8, use a find and replace
		 * to change 'exam_s8' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'exam_s8', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'exam_s8' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'exam_s8_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'exam_s8_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function exam_s8_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'exam_s8_content_width', 640 );
}
add_action( 'after_setup_theme', 'exam_s8_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function exam_s8_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'exam_s8' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'exam_s8' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'exam_s8_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function exam_s8_styles() {
	wp_enqueue_style( 'exam_s8-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.css' );

	wp_enqueue_script( 'exam_s8-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'exam_s8-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'exam_s8_styles' );




function jquery_lib() {
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js');

	wp_enqueue_script( 'min_js', get_template_directory_uri() . '/assets/myloadmore.js' , array( 'jquery' ), true );
	wp_enqueue_script( 'min', get_template_directory_uri() . '/js/wow-1.js', array('jquery'), null, true);
	
	
}
add_action( 'wp_enqueue_scripts', 'jquery_lib' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// Мои настройки


// допустим в functions.php мы регистрируем дополнительный размер так:
add_image_size( 'icon_services', 200, 139, true );
add_image_size( 'customers_img1', 185, 185, true );
add_image_size( 'team_img', 200, 200, true );


// далее в цикле выводим этот размер так:
the_post_thumbnail( 'spec_thumb' );

// ********







// Custom Pagination

function custom_pagination($numpages = '', $pagerange = '', $paged = '')
{

    if (empty($pagerange)) {
        $pagerange = 2;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default quries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if (!$numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function.
     */
    $pagination_args = array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'total' => $numpages,
        'current' => $paged,
        'show_all' => False,
        'end_size' => 1,
        'mid_size' => $pagerange,
        'prev_next' => True,
        'prev_text' => __('prev'),
        'next_text' => __('next'),
        'type' => 'plain',
        'add_args' => false,
        'add_fragment' => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='custom-pagination'>";
//                echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
        echo $paginate_links;
        echo "</nav>";
    }

}

// END Pagination




// ***********






//кастум код

function ale_customize_register($wp_customize){
   //All our sections, settings, and controls will be added here
	$wp_customize->add_section('ads',array(
    'title'      => __('Настройка секций slider', 'hw182'),
    'priority'   => 30,
	));

	$wp_customize->add_setting('ads_name',array(
		'default'=>'',
		'transport'=>'postMessage',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'ads_name',array(
		'label'=>__('Секция Name','hw182'),
		'section'=>'ads',
		'settings'=>'ads_name',
		'type'=>'input',
	)));

	$wp_customize->add_setting('ads_code',array(
		'default'=>'',
		'transport'=>'postMessage',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'ads_code',array(
		'label'=>__('Секция CHOOSE','hw182'),
		'section'=>'ads',
		'settings'=>'ads_code',
		'type'=>'textarea',
	)));

	$wp_customize->add_setting('ads_facebook',array(
		'default'=>'',
		'transport'=>'postMessage',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'ads_facebook',array(
		'label'=>__('Ссылка на facebook','hw182'),
		'section'=>'ads',
		'settings'=>'ads_facebook',
		'type'=>'textarea',
	)));

	$wp_customize->add_setting('ads_facebook-icon',array(
		'default'=>'',
		'transport'=>'postMessage',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'ads_facebook-icon',array(
		'label'=>__('Ссылка на icon facebook','hw182'),
		'section'=>'ads',
		'settings'=>'ads_facebook-icon',
		'type'=>'input',
	)));


	$wp_customize->add_setting('ads_img');
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'ads_img',array(
		'label'=>__('Загрузка изображения','hw182'),
		'section'=>'ads',
		'settings'=>'ads_img',
		
	)));

// Портфолио

	$wp_customize->add_section('ads_portfolio',array(
		'title'      => __('Настройка Portfolio', 'hw182'),
		'priority'   => 30,
		));

		$wp_customize->add_setting('ads_portfolio1',array(
			'default'=>'',
			'transport'=>'postMessage',
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'ads_portfolio1',array(
			'label'=>__('Секция Name','hw182'),
			'section'=>'ads_portfolio',
			'settings'=>'ads_portfolio1',
			'type'=>'input',
		)));

		$wp_customize->add_setting('ads_portfolio_text',array(
			'default'=>'',
			'transport'=>'postMessage',
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'ads_portfolio_text',array(
			'label'=>__('Секция Описание','hw182'),
			'section'=>'ads_portfolio',
			'settings'=>'ads_portfolio_text',
			'type'=>'textarea',
		)));

		$wp_customize->add_setting('ads_portfolio_cat',array(
			'default'=>'',
			'transport'=>'postMessage',
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'ads_portfolio_cat',array(
			'label'=>__('Название галереи','hw182'),
			'section'=>'ads_portfolio',
			'settings'=>'ads_portfolio_cat',
			'type'=>'input',
		)));
	


}
add_action( 'customize_register', 'ale_customize_register' );







// Подключение галерее isotop

function add_isotope() {
    wp_register_script( 'isotope', get_template_directory_uri().'/js/iso/isotope.pkgd.min.js', array('jquery'),  true );
    wp_register_script( 'isotope-init', get_template_directory_uri().'/js/isotope.js', array('jquery', 'isotope'),  true );
    wp_register_style( 'isotope-css', get_stylesheet_directory_uri() . '/css/isotope.css' );

    wp_enqueue_script('isotope-init');
    wp_enqueue_style('isotope-css');
}

add_action( 'wp_enqueue_scripts', 'add_isotope' );