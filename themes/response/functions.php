<?php

require_once('lib/clean.php'); // do all the cleaning and enqueue here
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar

/**********************
Add theme supports
**********************/
function reverie_theme_support() {

	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	add_image_size( 'homepage-thumb', 220, 180, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
	// set_post_thumbnail_size(150, 150, false);
	
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
?>