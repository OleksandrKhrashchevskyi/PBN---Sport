<?php
/**
 * Minimal Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Minimal_Blocks
 */

if ( ! function_exists( 'minimal_blocks_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function minimal_blocks_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Minimal Blocks, use a find and replace
         * to change 'minimal-blocks' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'minimal-blocks', get_template_directory() . '/languages' );
        
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );


        // Gutenberg align wide support
        add_theme_support( 'align-wide' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary-nav' => esc_html__( 'Primary Menu', 'minimal-blocks' ),
            'footer-nav' => esc_html__( 'Footer Menu', 'minimal-blocks' ),
            'social-nav' => esc_html__( 'Social Menu', 'minimal-blocks' ),
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
        add_theme_support( 'custom-background', apply_filters( 'minimal_blocks_custom_background_args', array(
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

        /*
        * Enable support for Post Formats.
        *
        * See: https://codex.wordpress.org/Post_Formats
        */
        add_theme_support( 'post-formats', array(
            'image',
            'video',
            'quote',
            'gallery',
            'audio',
        ) );
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /*
        * Add theme support for gutenberg block
        */
        add_theme_support( 'align-wide' );

    }
endif;
add_action( 'after_setup_theme', 'minimal_blocks_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minimal_blocks_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'minimal_blocks_content_width', 640 );
}
add_action( 'after_setup_theme', 'minimal_blocks_content_width', 0 );

/**
 * function for google fonts
 */
if (!function_exists('minimal_blocks_fonts_url')) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function minimal_blocks_fonts_url(){

        $fonts_url = '';
        $fonts = array();

        $minimal_blocks_primary_font   = minimal_blocks_get_option('primary_font',true);
        $minimal_blocks_secondary_font = minimal_blocks_get_option('secondary_font',true);
        $minimal_blocks_tertiary_font = minimal_blocks_get_option('tertiary_font',true);

        $minimal_blocks_fonts   = array();
        $minimal_blocks_fonts[] = $minimal_blocks_primary_font;
        $minimal_blocks_fonts[] = $minimal_blocks_secondary_font;
        $minimal_blocks_fonts[] = $minimal_blocks_tertiary_font;

        for ($i = 0; $i < count($minimal_blocks_fonts); $i++) {

            if ('off' !== sprintf(_x('on', '%s font: on or off', 'minimal-blocks'), $minimal_blocks_fonts[$i])) {
                $fonts[] = $minimal_blocks_fonts[$i];
            }

        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
            ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 *
 * @since Minimal Blocks 1.0
 *
 */
function minimal_blocks_scripts() {

    $min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

    wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/lib/ionicons/css/ionicons' . $min . '.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/lib/magnific-popup/magnific-popup.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/lib/slick/css/slick' . $min . '.css');
    wp_enqueue_style('sidr-nav', get_template_directory_uri() . '/assets/lib/sidr/css/jquery.sidr.css');
    wp_enqueue_style( 'wp-mediaelement' );
    wp_enqueue_style( 'minimal-blocks-style', get_stylesheet_uri() );
    wp_add_inline_style('minimal-blocks-style', minimal_blocks_inline_css());
    $fonts_url = minimal_blocks_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('minimal-blocks-google-fonts', $fonts_url, array(), null);
    }
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style( 'minimal-blocks-woocommerce-style', get_template_directory_uri() . '/assets/thememattic/css/woocommerce.css' );

    }

    wp_enqueue_script( 'minimal-blocks-skip-link-focus-fix', get_template_directory_uri() . '/assets/thememattic/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/lib/slick/js/slick' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-sidr', get_template_directory_uri() . '/assets/lib/sidr/js/jquery.sidr' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-match-height', get_template_directory_uri() . '/assets/lib/jquery-match-height/jquery.matchHeight' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/assets/lib/magnific-popup/jquery.magnific-popup'.$min.'.js', array('jquery'), '', true);
    wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script('masonry');
    wp_enqueue_script('theiaStickySidebar', get_template_directory_uri() . '/assets/lib/theiaStickySidebar/theia-sticky-sidebar.min.js', array('jquery'), '', true);


    $args = minimal_blocks_get_localized_variables();

    wp_enqueue_script('script', get_template_directory_uri() . '/assets/thememattic/js/script.js', array( 'jquery', 'wp-mediaelement' ), '', true);
    wp_localize_script( 'script', 'minimalBlocksVal', $args );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'minimal_blocks_scripts' );

/**
 * Enqueue admin scripts and styles.
 *
 * @since Minimal Blocks 1.0
 */
function minimal_blocks_admin_scripts($hook){
    if ('widgets.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('minimal_blocks-widgets-js', get_template_directory_uri() . '/assets/thememattic/js/widgets.js', array('jquery','wp-util'), '1.0.0', true);
        wp_enqueue_style('minimal_blocks-widgets-css', get_template_directory_uri() . '/assets/thememattic/css/widgets.css');

    }
}
add_action('admin_enqueue_scripts', 'minimal_blocks_admin_scripts');

/**
 * Print admin widget styles.
 *
 * @since Minimal Blocks 1.0
 */
function minimal_blocks_widget_styles(){
    ?>
    <style>
        .me-widefat{
            border-spacing: 0;
            width: 90%;
            clear: both;
            margin: 5px 0;
        }
        .me-remove-youtube-url{
            color: red;
            cursor: pointer;
        }
    </style>
    <?php
}
add_action( "admin_print_styles-widgets.php", 'minimal_blocks_widget_styles' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Minimal Blocks 1.0
 *
 */
function minimal_blocks_post_nav_background() {
    if ( ! is_single() ) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
        return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
        $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
        $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style( 'minimal-blocks-style', $css );
}
add_action( 'wp_enqueue_scripts', 'minimal_blocks_post_nav_background' );

function minimal_blocks_get_customizer_value(){
    global $minimal_blocks;
    $minimal_blocks = minimal_blocks_get_options();
}
add_action('init','minimal_blocks_get_customizer_value');

/**
 * Load all required files.
 */
require get_template_directory() . '/inc/init.php';

//* Add description to menu items
add_filter( 'walker_nav_menu_start_el', 'minimalblocks_add_description', 10, 2 );
function minimalblocks_add_description( $item_output, $item ) {
    $description = $item->post_content;
    if (('' !== $description) && (' ' !== $description) ) {
        return preg_replace( '/(<a.*)</', '$1' . '<span class="menu-description">' . $description . '</span><', $item_output) ;
    }
    else {
        return $item_output;
    };
}
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * remove the excerpt dot.
 */
add_filter('excerpt_more','__return_false');

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function($size ) {
    return array(
        'width' => 250,
        'height' => 250,
        'crop' => 1,
    );
}); 



add_action( 'template_redirect', 'author_archive_redirect' );
add_filter( 'author_link', 'remove_author_pages_link' );

// редиректим на главную со страниц авторов
function author_archive_redirect() {
   if( is_author() ) {
       wp_redirect( home_url(), 301 );
       exit;
   }
}

// удаляем ссылку
function remove_author_pages_link( $content ) {
    return home_url();
}





function crunchify_remove_version() {
    return '';
}
add_filter('the_generator', 'crunchify_remove_version');
 
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
 
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
 
function crunchify_cleanup_query_string( $src ){ 
    $parts = explode( '?', $src ); 
    return $parts[0]; 
} 
add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 ); 
add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );




remove_action( 'add_option_new_admin_email', 'update_option_new_admin_email' );
remove_action( 'update_option_new_admin_email', 'update_option_new_admin_email' );
 
function wpdocs_update_option_new_admin_email( $old_value, $value ) {
update_option( 'admin_email', $value );
}
add_action( 'add_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );
add_action( 'update_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );





add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    }
    return $title;
}




//Удаляем category из УРЛа категорий
add_filter( 'category_link', function($a){
    return str_replace( 'category/', '', $a );
}, 99 );


























