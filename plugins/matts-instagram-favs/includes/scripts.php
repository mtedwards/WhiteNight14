<?php 
  
  
  function mifp_load_scripts() {
	wp_enqueue_script( 'mifp-scripts', plugins_url( 'mifp.js', __FILE__ ), array( 'jquery' ), '1.0' );
	
	global $mifp_options;
  
  $css = $mifp_options['instagram_css'];
	
	if($css == 'Yes'){
  	wp_enqueue_style('mifp-styles', plugin_dir_url( __FILE__ ) . 'plugin_styles.css');
	}
	
}
add_action( 'wp_enqueue_scripts', 'mifp_load_scripts' );