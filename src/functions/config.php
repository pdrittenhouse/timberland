<?php
/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
    /** Add timber support. */
    public function __construct() {
        add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
        add_filter( 'timber/context', array( $this, 'add_to_context' ) );
        add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
        add_action( 'init', array( $this, 'register_post_types' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
        add_action( 'init', array( $this, 'register_navs' ) );
        add_action( 'init', array( $this, 'register_widget_areas' ) );
        parent::__construct();
    }
    /** This is where you can register custom post types. */
    public function register_post_types() {

    }
    /** This is where you can register custom taxonomies. */
    public function register_taxonomies() {

    }
    /** This is where you can register nav menu locations. */
    public function register_navs() {
      register_nav_menus(
        array(
          'primary' => __( 'Primary' ),
          'secondary' => __( 'Secondary' ),
          'footer' => __( 'Footer' ),
          'social' => __( 'Social' ),
          'utility' => __( 'Utility' ),
        )
      );
    }
    /** This is where you can register custom widget areas. */
    public function register_widget_areas() {

      register_sidebar( array(
        'name'          => 'Header',
        'id'            => 'header_widget_area',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      ) );

      register_sidebar( array(
        'name'          => 'Primary',
        'id'            => 'primary_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      ) );

      register_sidebar( array(
        'name'          => 'Secondary',
        'id'            => 'secondary_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      ) );

      register_sidebar( array(
        'name'          => 'Territory',
        'id'            => 'tertiary_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      ) );

      register_sidebar( array(
        'name'          => 'Footer',
        'id'            => 'footer_widget_area',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      ) );
    }

    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}.
     */
    public function add_to_context( $context ) {
        $context['foo'] = 'bar';
        $context['stuff'] = 'I am a value set in your functions.php file';
        $context['notes'] = 'These values are available everytime you call Timber::context();';

        // Site
        $context['site'] = $this;
        $context['display_header_text'] = display_header_text();

        // Site Icon
        $icon_src = get_site_icon_url();
        $icon_path = parse_url($icon_src);
        $context['site_icon'] = $icon_path['path'];

        // Custom Logo
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if (!empty($logo)) {
          $logo_src = esc_url( $logo[0] );
          $logo_path = parse_url($logo_src);
          $context['site_logo'] = $logo_path['path'];
        }

        // Header Background
        $header_bg_src = get_header_image();
        $header_bg_path = parse_url($header_bg_src);
        $context['header_bg'] = $header_bg_path['path'];

        // Menus
        $context['menu'] = new Timber\Menu();
        $context['menu_primary'] = new \Timber\Menu( 'primary' );
        $context['menu_secondary'] = new \Timber\Menu( 'secondary' );
        $context['menu_footer'] = new \Timber\Menu( 'footer' );
        $context['menu_social'] = new \Timber\Menu( 'social' );
        $context['menu_utility'] = new \Timber\Menu( 'utility' );

        // TODO: Set link target, title attribute and css classes screen attributes

        return $context;
    }

    public function theme_supports() {
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

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5', array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats', array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );

        add_theme_support( 'menus' );
    }

    /** This Would return 'foo bar!'.
     *
     * @param string $text being 'foo', then returned 'foo bar!'.
     */
    public function myfoo( $text ) {
        $text .= ' bar!';
        return $text;
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function add_to_twig( $twig ) {
        $twig->addExtension( new Twig_Extension_StringLoader() );
        $twig->addFilter( new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );
        return $twig;
    }

}

new StarterSite();
