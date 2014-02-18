<?php

require_once('lib/clean.php'); // do all the cleaning and enqueue here
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar

/**********************
Add theme supports
**********************/
function yeti_theme_support() {

      	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
      	add_theme_support('post-thumbnails');
      	add_image_size( 'event-thumb', 200, 200, true); // 200 by 200 hard cropped image
        add_image_size( 'event-small', 400, 225, true ); // Resize width 400 auto height
        add_image_size( 'event-medium', 720, 405, true ); // Resize width 750 auto height
        add_image_size( 'event-feature', 960, 540, true ); // Resize width 960 auto height
      
      	// rss thingy
      	add_theme_support('automatic-feed-links');
        
        if(! is_admin()){
          show_admin_bar(false);
        }
        
        show_admin_bar(true);
        
        
        // Add post formarts supports. http://codex.wordpress.org/Post_Formats
        //add_theme_support('post-formats', array('gallery', 'link', 'image', 'video', 'audio'));
        
        // Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
        add_theme_support('menus');
        register_nav_menus(array(
                'primary' => __('Primary Navigation', 'yeti')
        ));

}
add_action('after_setup_theme', 'yeti_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
        register_sidebar(array('name'=> $sidebar,
                'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
                'after_widget' => '</div></article>',
                'before_title' => '<h6><strong>',
                'after_title' => '</strong></h6>'
        ));
}

// return entry meta information for posts, used by multiple loops.
function yeti_entry_meta() {
        echo '<p class="byline"><time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'yeti'), get_the_time('l, F jS, Y'), get_the_time()) .'</time></p>';
        //echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

// THE FOLLOWING CONTENT SHOULD BE MOVED OUT TO A MUST USE PLUGIN

// Customise Log in page

function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo('template_url') . '/css/style-login.css'; ?>" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

//Clean up Events backend page

function remove_event_taxonomy_boxes() {
	remove_meta_box( 'tagsdiv-precinct' , 'event' , 'normal' );
	remove_meta_box( 'tagsdiv-venue' , 'event' , 'normal' );
	remove_meta_box( 'tagsdiv-genre' , 'event' , 'normal' );
	remove_meta_box( 'tagsdiv-accessibility' , 'event' , 'normal' );
}
add_action( 'admin_menu' , 'remove_event_taxonomy_boxes' );

function remove_media_button_from_event() {	
	global $post;
  if( $post->post_type == 'event' ) {
    remove_action( 'media_buttons', 'media_buttons' );
  }
}

//temporarily adding images to some events
// add_action('admin_head','remove_media_button_from_event');

// Custom Excerpt

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
  global $post;
	return '  <a href="' . get_permalink() . '" id="read-more"><b>Read More...</b></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Auto Login after Registration
function auto_login_new_user( $user_id ) {
  wp_set_current_user($user_id);
  wp_set_auth_cookie($user_id);
  wn_set_logged_in_cookie();
  wp_redirect( home_url() . '/my-night/' );
  triggerPasswordReset($user_id);
  exit;
}
add_action( 'user_register', 'auto_login_new_user' );


function triggerPasswordReset( $user_id ) {

	$userInfo = get_userdata( $user_id );
	$target   = site_url() . '/wp-login.php?action=lostpassword';
	$args     = array(
		'body'        => array( 'user_login' => $userInfo->user_login ),
		'sslverify'   => false,
	);
	wp_remote_post( $target, $args );
}


// Hide publisher box from certain users:

function wn_hide_publish_button() {
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/hide-admin-block.js', array( 'jquery' ), '201312041100', false );
}

function wn_hide_side_menu() {
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/hide-side-menu-block.js', array( 'jquery' ), '201312041100', false );
}


$user_id = get_current_user_id();
if ($user_id == 3) {
  add_action('admin_init', 'wn_hide_publish_button');
} elseif ($user_id == 122) {
  add_action('admin_init', 'wn_hide_side_menu');
}


// Allow the Editors Access to Gravity Forms

$editor = get_role( 'editor' );
$editor->add_cap( 'gravityforms_view_entries' );
$editor->add_cap( 'gravityforms_edit_entries' );
$editor->add_cap( 'gravityforms_delete_entries' );
$editor->add_cap( 'gravityforms_export_entries' );
$editor->add_cap( 'gravityforms_view_entry_notes' );
$editor->add_cap( 'gravityforms_edit_entry_notes' );

function wn_set_logged_in_cookie() {
  setcookie("wn_logged_in", true, time()+86400);
	}

add_action('wp_login', 'wn_set_logged_in_cookie');

function wn_kill_logged_in_cookie() {
 setcookie("wn_logged_in", false, 0);
 }

add_action('wp_logout', 'wn_kill_logged_in_cookie');

function change_author_permalinks() {

    global $wp_rewrite;

    // Change the value of the author permalink base to whatever you want here
    $wp_rewrite->author_base = 'my-night';

    $wp_rewrite->flush_rules();
}

add_action('init','change_author_permalinks');



function my_retrieve_password_subject_filter($old_subject) {
    // $old_subject is the default subject line created by WordPress.
    // (You don't have to use it.)

    $subject = sprintf( __('WHITE NIGHT MELBOURNE Password'));
    // This is how WordPress creates the subject line. It looks like this:
    // [Doug's blog] Password Reset
    // You can change this to fit your own needs.

    // You have to return your new subject line:
    return $subject;
}


// To get these filters up and running:
add_filter ( 'retrieve_password_title', 'my_retrieve_password_subject_filter', 10, 1 );

function my_post_queries( $query ) {

	if(is_tax()){
      // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', 50);
    }
  }
add_action( 'pre_get_posts', 'my_post_queries' );