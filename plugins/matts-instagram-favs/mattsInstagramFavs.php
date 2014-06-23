<?php
/*
Plugin Name: Matt's Instagram Favs Plugin
Description: Display images an instagram account has favourited.
Author: Matt Edwards
Author URI: http://twitter.com/mtedwards
Version: 0.1
*/


/*************************
* global variables
*************************/

$mifp_prefix = 'mifp';
$mifp_plugin_name = 'Matt\'s Instagram Favs Plugin';


// retrieve settings
$mifp_options = get_option('mifp_settings');

/*************************
* includes
*************************/

include('includes/scripts.php'); // this controls all JS / CSS
include('includes/data-retrieval.php'); // this grabs the data from instagram
include('includes/data-display.php'); // this has disply option functions
include('includes/options-page.php'); // creates the options page