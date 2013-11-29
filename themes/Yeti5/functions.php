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

add_action('admin_head','remove_media_button_from_event');


// Custom Excerpt

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
  global $post;
	return '  <a href="#" id="read-more"><b>Read More...</b></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');