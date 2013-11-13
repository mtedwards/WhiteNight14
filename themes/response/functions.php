<?php

require_once('lib/clean.php'); // do all the cleaning and enqueue here
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar

/**********************
Add theme supports
**********************/

show_admin_bar(false);

function reverie_theme_support() {
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	add_image_size( 'event-thumb', 200, 200, true); // 200 by 200 hard cropped image
  add_image_size( 'event-small', 400, 9999 ); // Resize width 400 auto height
  add_image_size( 'event-medium', 750, 9999 ); // Resize width 750 auto height
  add_image_size( 'event-large', 1000, 9999 ); // Resize width 1000 auto height

	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	//add_theme_support('post-formats', array('gallery', 'link', 'image', 'video', 'audio'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie')
	));

}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */



// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<p class="byline"><time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time></p>';
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


