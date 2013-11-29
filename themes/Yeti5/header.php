<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container" role="document">
  <header class="row">
  <div class="small-12 columns">
    <div class="main-menu contain-to-grid fixed">
      <nav class="top-bar" data-topbar>
        <div class="full-menu">
          <div class="logo">
            <a href="/"><img src="<?php bloginfo('template_url'); ?>/img/white-logo.png"alt="White Night Melbourne logo"></a>
          </div>
          <div class="menu-buttons">
            <ul>
              <li>
                <a id="menu-full-explore" class="menu-button dropdown" href="#">EXPLORE</a>
                <div class="sub-menu">
                  <div class="left">
                    <ul>
                      <li><a href="<?php bloginfo('url'); ?>/events/"><b>FULL PROGRAM</b></a></li>
                      <!-- <li><a href="#"><b>Journeys</b></a></li> -->
                    </ul>
                    <b>Precincts</b>
                    <ul>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/01-northern-lights/">Northern Lights</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/02-lucky-dip/">Lucky Dip</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/03-jrb/">J+R&B</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/04-shadows/">Shadows</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/04-the-vortex/">The Vortex</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/05-rags-to-riches/">Rags to Riches</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/06-wonderland/">Wonderland</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/08-midden/">Midden</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/09-alex-and-the-engineer/">Alex and the engineer</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/10-tattooed-city/">Tattooed City</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/precinct/11-outer-limits/">Outer Limits</a></li>
                    </ul>
                    
                  </div>
                  <div class="right">
                    <ul>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=art">Art</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=design">Design</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=family">Family</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=fashion">Fashion</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=film">Film</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=lighting">Lighting</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=music">Music</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=performance">Performance</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/events/?genre=sport">Sport</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li>
                <?php if(!is_user_logged_in()){ // REMOVE THE ! WHEN FINISHED TESTING!!!!! ?>
                  <a  class="menu-button" href="<?php bloginfo('url'); ?>/my-night"><span class="blue">+</span>My Night</a>

                <?php } else { ?>
                  <a id="menu-full-my-night" class="menu-button dropdown" href="#"><span class="blue">+</span>My Night
                      <span class="small">Login Create</span></a>
                  <div class="sub-menu my-night-dropdown">
                    <h4>Create a My Night Account</h4>
                    <div class="row">
                      <div class="small-6 columns">
                        <b>Create a My Night Account so you can:</b>
                        <ul>
                          <li>Save your favourite events.</li>
                          <li>Invite your friends and family to join you</li>
                          <li>Stay up-to-date with White Night Melbourne News</li>
                        </ul>
                      </div>
                      <div class="small-6 columns">
                          <form action="" method="post"> 
                            <div class="row">
                              <div class="small-12 columns">
                                <input type="text" name="" placeholder="Username" id="" class="input"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="small-12 columns">
                                <input type="text" name="" placeholder="email" id="" class="input" /> 
                              </div>
                            </div>
                             <div class="row">
                              <div class="small-12 columns">
                                <input class="button" type="submit" value="Register" id="register" />
                              </div>
                            </div>
                          </form>
                             <div class="row">
                              <div class="small-12 columns">
                                <p><small>A password will be emailed to you.</small></p>
                              </div>
                            </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="small-12 columns">
                        <a href="#" class="button expand">Login to My Night</a>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </li>
              <li>
                <a id="menu-full-info" class="menu-button dropdown" href="#">Vistor Info</a>
                 <div class="sub-menu">
                  <div class="left">
                    <b>VISITOR INFO</b>  
                    <ul>
                      <li><a href="#">Visting Melbourne</a></li>
                      <li><a href="#">Getting Here</a></li>
                      <li><a href="#">Getting Around</a></li>
                      <li><a href="#">Map</a></li>
                      <li><a href="<?php bloginfo('url'); ?>/where-to-eat-rest/">Where to Eat & Rest</a></li>
                      <li><a href="#">Getting Home</a></li>
                    </ul>
                    <b>About Us</b>
                    <ul>
                      <li><a href="<?php bloginfo('url'); ?>/contact-us/">Contact Us</a></li>
                    </ul>
                    
                  </div>
                  <div class="right">
                  </div>

              </li>
            </ul>
          </div>
          <div class="search">
          </div>
        </div>
        
      </nav>
    </div>  
  </div>

  </header>
  <div class="row main-content-section">