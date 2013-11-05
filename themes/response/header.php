<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="contain-to-grid sticky">
	<!-- Starting the Top-Bar -->
	<nav class="top-bar">
	    <ul class="title-area">
	        <li class="name">
	        	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	        </li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	    </ul>
	    <section class="top-bar-section">
	    <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="left">%3$s</ul>',
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li'
	            ) ),
	        ) );
	    ?>
	    </section>
	</nav>
	<!-- End of Top-Bar -->
</div>
<!-- Start the main container -->
<section class="container row" role="document">