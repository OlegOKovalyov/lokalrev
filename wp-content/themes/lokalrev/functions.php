<?php
/**
 * Lokal Revisorer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lokal_Revisorer
 */

add_filter('show_admin_bar', '__return_false'); // отключить
//add_filter('show_admin_bar', '__return_true'); // включить

if ( ! function_exists( 'lokalrev_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lokalrev_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Lokal Revisorer, use a find and replace
		 * to change 'lokalrev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lokalrev', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'lokalrev' ),
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
		add_theme_support( 'custom-background', apply_filters( 'lokalrev_custom_background_args', array(
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
			'height'      => 268,
			'width'       => 51,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'lokalrev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lokalrev_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'lokalrev_content_width', 640 );
}
add_action( 'after_setup_theme', 'lokalrev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lokalrev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lokalrev' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lokalrev' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer-1', 'lokalrev' ),
        'id'            => 'sidebar-footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'lokalrev' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer-2', 'lokalrev' ),
        'id'            => 'sidebar-footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'lokalrev' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer-3', 'lokalrev' ),
        'id'            => 'sidebar-footer-4',
        'description'   => esc_html__( 'Add widgets here.', 'lokalrev' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer-4', 'lokalrev' ),
        'id'            => 'sidebar-footer-5',
        'description'   => esc_html__( 'Add widgets here.', 'lokalrev' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer-5', 'lokalrev' ),
        'id'            => 'sidebar-footer-6',
        'description'   => esc_html__( 'Add widgets here.', 'lokalrev' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Colophon', 'lokalrev' ),
        'id'            => 'sidebar-footer-7',
        'description'   => esc_html__( 'Add widgets here.', 'lokalrev' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'lokalrev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lokalrev_scripts() {
	wp_enqueue_style( 'lokalrev-style', get_stylesheet_uri() );

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js' );

	wp_enqueue_script( 'lokalrev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lokalrev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script('lokalrev-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'lokalrev_scripts' );

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

/**
 * Filter the except length to 25 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function format_comment() {  ?>
<li>This is whack, yo.</li>
<?php }


/**
 * Callback Function for lokalrev Theme comment.php
 */
if ( ! function_exists( 'lokalrev_comment' ) ) :
    function lokalrev_comment( $comment, $args, $depth ) {
        global $commentnumber;
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' : ?>
                <li class="post pingback">
                    <p><?php _e( 'Pingback:', 'my_press' ); ?> <?php comment_author_link(); ?></p>
                    <?php edit_comment_link( __( 'Edit', 'my_press' ), '<span class="edit-link">', '</span>' ); ?>
                </li>
                <?php break;
            default :
                $commentnumber++; ?>
            <div <?php comment_class(); ?> id="div-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment">
                    <div class="comment-meta">
                        <div class="author-img">
                            <?php $avatar_size = 55; echo get_avatar( $comment, $avatar_size ); ?>
                        </div>


                        <?php if ( $comment->comment_approved == '0' ) : ?>
                            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'my_press' ); ?></em>
                        <?php endif; ?>
                    </div>
                    <div class="comment-content">
                        <div class="comment-author vcard">
                            <?php
                            //                            $avatar_size = 55;
                            $comment_date = get_comment_date();
                            $current_date = current_time('mysql');
                            if ( '0' != $comment->comment_parent )
                                $avatar_size = 39;
                            //                            echo get_avatar( $comment, $avatar_size );
                            /* translators: 1: comment author, 2: date and time */
                            printf( __( '%1$s', 'my_press' ),
                                sprintf( '<span class="fn">%s</span>', get_comment_author_link() )
                            );
                            echo '<span class="days-ago">';
                            echo lokalrev_date_different( $current_date, $comment_date );
                            echo ' dage siden</span>';
                            ?>
                        </div><!-- .comment-author .vcard -->
                        <!--<span class="commentnumber"><?php /*echo $commentnumber; */?></span>-->
                        <?php comment_text(); ?>
                    </div>
                    <!--<div class="reply">
                        <?php /*comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'my_press' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); */?>
                    </div>--><!-- .reply -->
                    <?php //edit_comment_link( __( 'Edit', 'my_press' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- #comment-## -->
                <?php
                break;
        endswitch;
    }
endif;

/**
 * Gen Different Betwean Two Dates in Days.
 */
function lokalrev_date_different ($d1, $d2) {

    // Return the number of days between the two dates:
    return round(abs(strtotime($d1) - strtotime($d2))/86400);

}