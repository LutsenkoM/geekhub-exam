<?php
/**
 * GH-exam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GH-exam
 */

if ( ! function_exists( 'gh_exam_setup' ) ) :

function gh_exam_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gh_exam_content_width', 640 );
}
add_action( 'after_setup_theme', 'gh_exam_content_width', 0 );

// ENQUEUE STYLES AND SCRIPTS
    function gh_exam_scripts() {
        wp_enqueue_style('bootstrap.min.css', get_template_directory_uri() . '/style/stylesheets/lib/bootstrap.min.css');
        wp_enqueue_style('slick.css', get_template_directory_uri() . '/style/stylesheets/lib/slick.css');
        wp_enqueue_style('slick-theme.css', get_template_directory_uri() . '/style/stylesheets/lib/slick-theme.css');
        wp_enqueue_style('font-awesome.min.css', get_template_directory_uri() . '/style/stylesheets/lib/font-awesome/css/font-awesome.min.css');
        wp_enqueue_style( 'gh-exam-style', get_stylesheet_uri() );

        wp_enqueue_script('jquery-3.2.0.min.js', get_template_directory_uri() . '/js/lib/jquery-3.2.0.min.js');
        wp_enqueue_script('tether.min.js', get_template_directory_uri() . '/js/lib/tether.min.js');
        wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/js/lib/bootstrap.min.js');
        wp_enqueue_script('slick.min.js', get_template_directory_uri() . '/js/lib/slick.min.js');
        wp_enqueue_script('custom.js', get_template_directory_uri() . '/js/custom.js');
        wp_enqueue_script( 'gh-exam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
        wp_enqueue_script( 'gh-exam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'gh_exam_scripts' );
// ENQUEUE STYLES AND SCRIPTS

//REGISTERED POST TYPES
function post_types_init() {
//Slider-intro
        $slider_main = array(
            'label' => 'Test',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'test'),
            'query_var' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'thumbnail',
                'author',
                'page-attributes',)
        );
        register_post_type('test', $slider_main);
//Slider-intro end

}
add_action('init', 'post_types_init');
//REGISTERED POST TYPES

// WIDGETS
function gh_exam_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gh-exam' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gh-exam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(array(
        'name' => esc_html__('Footer', 'gh-exam'), //name widget in admin panel
        'id' => 'footer-1', //id widget
        'description' => esc_html__('Add widgets here.', 'gh-exam'),
        'before_widget' => '<div class="widget-footer">',// wrapper widget
        'after_widget' => '</div>',//
        'before_title' => '<h2 class="widget-title-foot">',
        'after_title' => '</h2>',
    ));
}
add_action( 'widgets_init', 'gh_exam_widgets_init' );
// WIDGETS END

//Comment Block
    function mytheme_comment($comment, $args, $depth) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body ">
        <?php endif; ?>
                <div class="avatar ">
                    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </div>
                <div class="comment-block ">
                    <div class="comment-author vcard">
                        <?php printf( __( '<p class="fn">%s</p>' ), get_comment_author_link() ); ?>
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php
                            /* translators: 1: date, 2: time */
                            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
                        ?>


                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                        <br />
                    <?php endif; ?>

                    <?php comment_text(); ?>

                    <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text'=> 'reply' ) ) ); ?>
                    </div>
                </div>
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>
        <?php
    }
//Comment Block END

// Change position of commetn forms
    add_filter( 'comment_form_fields', 'example_order_comment_form_fields' );
    function example_order_comment_form_fields( $fields ) {
        $comment = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment;
        return $fields;
    }
// Change position of commetn forms end

//Add new fields to comment form
    add_filter('comment_form_default_fields', 'custom_fields_comments');
    function custom_fields_comments($fields) {

        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $fields[ 'author' ] = '<p class="comment-form-author">'.
            '<label for="author">' . __( '' ) . '</label>'.
            ( $req ? '<span class="required"></span>' : '' ).
            '<input id="author" name="author" placeholder="Name*" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
            '" size="30" tabindex="1"' . $aria_req . ' /></p>';

        $fields[ 'email' ] = '<p class="comment-form-email">'.
            '<label for="email">' . __( '' ) . '</label>'.
            ( $req ? '<span class="required"></span>' : '' ).
            '<input id="email" name="email" placeholder="Email Address *" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
            '" size="30"  tabindex="2"' . $aria_req . ' /></p>';

//    $fields[ 'url' ] = '<p class="comment-form-url">'.
//        '<label for="url">' . __( 'Website' ) . '</label>'.
//        '<input id="url" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
//        '" size="30"  tabindex="3" /></p>';


        $fields[ 'phone' ] = '<p class="comment-form-phone">'.
            '<label for="phone">' . __( '' ) . '</label>'.
            '<input id="phone" name="phone" placeholder="Phone number*" type="text" size="30"  tabindex="4" /></p>';

        return $fields;
    }
//Add new fields to comment form end

// AFTER THEME SETUP
function gh_exam_setup() {
    load_theme_textdomain( 'gh-exam', get_template_directory() . '/languages' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    //MENU
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
        )
    );
    //MENU-END
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
    add_theme_support( 'custom-background', apply_filters( 'gh_exam_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
    //Load logo
    add_theme_support( 'custom-logo' );
    //Load logo end

    //Add post formats support
        add_theme_support('post-formats', array('aside', 'gallery', 'link'));
    //Add post formats end
}
endif;
add_action( 'after_setup_theme', 'gh_exam_setup' );
// AFTER THEME SETUP END




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
