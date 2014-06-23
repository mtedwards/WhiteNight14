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

<header class="container row">
  <div class="small-6 large-3 columns">
    <b>White Night Melbourne</b>
  </div>
  <div class="small-6 large-3 columns my-planner">
    <b><a id="my-planner-button" href="">My Planner</a></b>
    <div id="my-planner-header" class="my-planner-login-box">
      <?php if (is_user_logged_in()) : ?>
    		<div class="logout">
    		    <?php 
    		      $bookmarks = upb_get_user_meta(upb_get_user_id());
    		      $num_bookmarks = count($bookmarks);
    		     ?>
    				<span class="small">You have <?php echo $num_bookmarks; ?> Events Saved<br>View <a href="<?php bloginfo('url'); ?>/my-night/">My Events</a></span>
    				
        </div> <!-- end .logout -->
    	<?php else : ?>
    		<form name="loginform" id="loginform" action="<?php echo get_option('siteurl'); ?>/wp-login.php" method="post">
    			<div class="form-section user">
    					<span class="small">Email</span><br>
    					<input value="Email" class="input" type="text" size="20" tabindex="10" name="log" id="user_login" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" /><br>
    				</div> 	
    				<div class="form-section password">
    					<span class="small">Password</span><br>
    					<input value="Password" class="input" type="password" size="20" tabindex="20" name="pwd" id="user_pass" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}" /><br><a class="small" href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" title="Forgot your password?">Forgot your password?</a>
    				</div>
    				<div class="form-section log-in">
    					<input name="wp-submit" class="small" id="wp-submit" value="Log In" tabindex="100" type="submit">
    					<input name="redirect_to" value="<?php echo get_option('siteurl'); ?>/current-offers/" type="hidden">
    					<input name="testcookie" value="1" type="hidden">
    				</div> 
    			</div>				
    		</form>
    	<?php endif; ?>
    </div>
  </div>
</header>
<!-- Start the main container -->
<section class="container row" role="document">