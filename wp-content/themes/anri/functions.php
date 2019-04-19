<?php
/**
 * Anri functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Anri
 */

if ( ! function_exists( 'anri_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function anri_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Anri, use a find and replace
		 * to change 'anri' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'anri', get_template_directory() . '/languages' );

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
			'menu-anri' => esc_html__( 'Anri-Menu', 'anri' ),
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
		add_theme_support( 'custom-background', apply_filters( 'anri_custom_background_args', array(
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
add_action( 'after_setup_theme', 'anri_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anri_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'anri_content_width', 640 );
}
add_action( 'after_setup_theme', 'anri_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function anri_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'anri' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'anri' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'anri' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'anri' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'anri' ),
		'id'            => 'footer-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'anri' ),
		'before_widget' => '<div class="col-sm-5  col-md-5 page-footer__top-about">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'anri' ),
		'id'            => 'footer-widget-2',
		'description'   => esc_html__( 'Add widgets here.', 'anri' ),
		'before_widget' => '<div class="col-sm-3  col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'anri' ),
		'id'            => 'footer-widget-3',
		'description'   => esc_html__( 'Add widgets here.', 'anri' ),
		'before_widget' => '<div class="col-sm-4  col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_widget('social_icon');
	register_widget('popular_post');
	register_widget('custom_tag_cloud');
	register_widget('anri_subscription');
	register_widget('anri_categories');
	register_widget('anri_recent_posts');
}
add_action( 'widgets_init', 'anri_widgets_init' );

Class social_icon extends WP_Widget {
	public function __construct() {
		parent::__construct('social-icon','Social Icon',array(
			'description' => 'This is a social icon.Upload social Icon',
		));
	}
	public function widget( $args, $instance ) {
		?>
			<?php echo $args['before_widget']?>
		        <?php echo $args['before_title']?><?php echo $instance['title']; ?><?php echo $args['after_title']?>
		        <div class="sidebar-widget__follow-me">
		          <div class="sidebar-widget__follow-me-icons">
		            <a href="<?php echo $instance['facebook_link']; ?>">
		              <svg>
		                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
		              </svg>
		            </a>
		            <a href="<?php echo $instance['twitter_link']; ?>">
		              <svg>
		                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
		              </svg>
		            </a>
		            <a href="<?php echo $instance['google_plus_link']; ?>">
		              <svg>
		                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#google"></use>
		              </svg>
		            </a>
		            <a href="<?php echo $instance['pinterest_link']; ?>">
		              <svg>
		                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pinterest"></use>
		              </svg>
		            </a>
		            <a href="<?php echo $instance['instagram_link']; ?>">
		              <svg>
		                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
		              </svg>
		            </a>
		          </div>
		        </div>
		    <?php echo $args['after_widget']?>
		<?php
	}
	public function form( $instance ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title')?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $instance['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook_link')?>">Facebook Link</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook_link')?>" name="<?php echo $this->get_field_name('facebook_link')?>" value="<?php echo $instance['facebook_link']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_link')?>">Twitter Link</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_link')?>" name="<?php echo $this->get_field_name('twitter_link')?>" value="<?php echo $instance['twitter_link']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google_plus_link')?>">Google Plus Link</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('google_plus_link')?>" name="<?php echo $this->get_field_name('google_plus_link')?>" value="<?php echo $instance['google_plus_link']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest_link')?>">Pinterest Link</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest_link')?>" name="<?php echo $this->get_field_name('pinterest_link')?>" value="<?php echo $instance['pinterest_link']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram_link')?>">Instagram Link</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram_link')?>" name="<?php echo $this->get_field_name('instagram_link')?>" value="<?php echo $instance['instagram_link']; ?>">
		</p>

		<?php
	}
	public function update( $new_instance, $old_instance ) {
		$new = array();
		$new['title'] = strip_tags($new_instance['title']);
		$new['facebook_link'] = esc_url(strip_tags($new_instance['facebook_link']));
		$new['twitter_link'] = esc_url(strip_tags($new_instance['twitter_link']));
		$new['google_plus_link'] = esc_url(strip_tags($new_instance['google_plus_link']));
		$new['pinterest_link'] = esc_url(strip_tags($new_instance['pinterest_link']));
		$new['instagram_link'] = esc_url(strip_tags($new_instance['instagram_link']));
		return $new;
	}
}

Class popular_post extends WP_Widget {

	public function __construct() {
		parent::__construct('popular-post','Popular Posts');
	}

	public function form( $instance ) {
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('count_post'); ?>">Posts Per Page</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('count_post'); ?>" name="<?php echo $this->get_field_name('count_post'); ?>" value="<?php echo $instance['count_post']; ?>">
			</p>
		<?php
	}

	public function widget( $args, $instance ) {
		?>
		  <?php echo $args['before_widget']; ?>
            <?php echo $args['before_title']; ?><?php echo $instance['title'] ?><?php echo $args['after_title']; ?>
            <?php
	            $pop = new WP_Query(array(
	            	'post_type' => 'post',
	            	'posts_per_page' => $instance['count_post'],
	            	'meta_key' => 'view',
	            	'orderby' => 'meta_value_num',
	            )); 
            ?> 
            <?php while($pop->have_posts()):$pop->the_post(); ?>
            <div class="sidebar-widget__popular">
              <div class="sidebar-widget__popular-item">
                <div class="sidebar-widget__popular-item-image">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                </div>
                <div class="sidebar-widget__popular-item-info">
                  <div class="sidebar-widget__popular-item-date">
                    <span><?php the_time('F d, Y'); ?></span>
                  </div>
                  <div class="sidebar-widget__popular-item-content">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </div>
                </div>
              </div>
            </div>
        	<?php endwhile; ?>
          <?php echo $args['after_widget']; ?>
          <?php
	}
}

Class custom_tag_cloud extends WP_Widget_Tag_Cloud{
	public function widget( $args, $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy( $instance );

		if ( ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			if ( 'post_tag' === $current_taxonomy ) {
				$title = __( 'Tags' );
			} else {
				$tax = get_taxonomy( $current_taxonomy );
				$title = $tax->labels->name;
			}
		}

		$show_count = ! empty( $instance['count'] );

		/**
		 * Filters the taxonomy used in the Tag Cloud widget.
		 *
		 * @since 2.8.0
		 * @since 3.0.0 Added taxonomy drop-down.
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see wp_tag_cloud()
		 *
		 * @param array $args     Args used for the tag cloud widget.
		 * @param array $instance Array of settings for the current widget.
		 */
		$tag_cloud = wp_tag_cloud( apply_filters( 'widget_tag_cloud_args', array(
			'taxonomy'   => $current_taxonomy,
			'echo'       => false,
			'show_count' => $show_count,
		), $instance ) );

		if ( empty( $tag_cloud ) ) {
			return;
		}

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo '<div class="sidebar-widget__tag-cloud">';

		echo $tag_cloud;

		echo "</div>\n";
		echo $args['after_widget'];
	}
}

function post_view($id,$echo = false) {
	$view = get_post_meta($id,'view',true);
	if($view == NULL) {
		$view = 0;
	}
	$view++;
	update_post_meta($id,'view',$view);
	if($echo == false) {
		return $view;
	}
	else {
		echo $view;
	}
}
/**
 * Enqueue scripts and styles.
 */
function anri_scripts() {
	wp_enqueue_style( 'anri-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7', false );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0', false );

	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '20151215', true );

	wp_localize_script( 'script', 'jekono', array(
		'admin_ajax' => admin_url('/admin-ajax.php'),
		'security' => wp_create_nonce('jamonchay'),
	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'anri_scripts' );

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
//An widget is created in following file
require get_template_directory() . '/inc/Widget/anri_subscription.php';
require get_template_directory() . '/inc/Widget/anri_categories.php';
require get_template_directory() . '/inc/Widget/anri_recent_posts.php';
require get_template_directory() . '/inc/Files/menu.php';
require get_template_directory() . '/inc/class.custom-comment.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('phpmailer_init','mail_setup');

function mail_setup($mailer) {
	//Server settings
                              // Enable verbose debug output
    $mailer->isSMTP();                                      // Set mailer to use SMTP
    $mailer->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mailer->SMTPAuth = true;                               // Enable SMTP authentication
    $mailer->Username = 'rockertuhin96@gmail.com';                 // SMTP username
    $mailer->Password = 'srt480652srt';                           // SMTP password
    $mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mailer->Port = 587;                                    // TCP port to connect to

}

add_filter('comment_class','anri_comment_er_li_tag_er_class');
function anri_comment_er_li_tag_er_class($default) {
	$default[] = 'single-post__comments-item';
	return $default;
}

add_action('wp_ajax_jekono_name','ajax_output');
function ajax_output() {
	if(!check_ajax_referer('jamonchay','security')) {
		echo "Invalid Output";
	}
	else {
		echo "Ajax works Succesfully";
		die();
	}
}

