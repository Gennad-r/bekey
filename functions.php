<?php
//show_admin_bar( false );
require_once 'class-wp-bootstrap-navwalker.php';
if ( ! function_exists( 'bekey_setup' ) ) :
		function custom_excerpt_length( $length ) {
		return 10;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function bekey_setup() {

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 300, 250, true );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bekey' ),
		) );
		


	}
endif;
add_action( 'after_setup_theme', 'bekey_setup' );

function bekey_widgets_init() {
	register_sidebar( array(
		'name'          => 'Facebook',
		'id'            => 'sidebar-fb',
		'description'   => 'Add widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => 'GitHub',
		'id'            => 'sidebar-gh',
		'description'   => 'Add widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'bekey_widgets_init' );



function bekey_scripts() {

	global $wp_query; 

	wp_enqueue_style( 'bekey-style', get_stylesheet_uri() );

	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/app/css/main.min.css', array(), null );

	wp_deregister_script( 'jquery' );

	wp_register_script( 'bekey-main', get_template_directory_uri() . '/app/js/scripts.min.js', array(), null, true );

	wp_localize_script( 'bekey-main', 'bekey_main_params', array(
		'ajaxurl' => admin_url("admin-ajax.php"),
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

	wp_enqueue_script( 'bekey-main' );

}
add_action( 'wp_enqueue_scripts', 'bekey_scripts' );

function bekey_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( 'parts/content', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
 
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'bekey_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'bekey_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}