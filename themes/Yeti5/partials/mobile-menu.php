<?php 
  /*
    Template Name: Mobile Menu
  */
?>
<?php $url = get_bloginfo('url'); ?>
<div class="mobile-menu">
          <div class="logo">
            <a href="<?php echo $url; ?>"><img src="<?php bloginfo('template_url'); ?>/img/white-logo.png"alt="White Night Melbourne logo"></a>
          </div>
          <div class="menu-buttons">
            <ul>
              <li id="my-night-menu-item-mobile">
                <?php //include(locate_template('partials/mobile-menu-logged-out.php')); ?>
              </li>
            </ul>
          </div>
          <div class="search menu-buttons">
            <a class="icon-list dropdown"></a>
            <div class="sub-menu right">
              <div class="row">
                <div class="small-12 columns">
                    <h5>SUBMISSIONS</h5>
                    <ul>
                      <li><a href="<?php echo $url; ?>/2015-eoi/performance/">Performance</a></li>
                      <li><a href="<?php echo $url; ?>/2015-eoi/lighting-av-projection/">Lighting / AV / Projection</a></li>
                      <li><a href="<?php echo $url; ?>/2015-eoi/installation-visual-art/">Installation / Visual Art</a></li>
                      <li><a href="<?php echo $url; ?>/2015-eoi/venues-galleries-spaces/">Venues / Galleries / Spaces</a></li>
                      <li><a href="<?php echo $url; ?>/2015-eoi/buskers/">Buskers</a></li>
                      <li><a href="<?php echo $url; ?>/2015-eoi/cafes-bars-restaurants-food-trucks/">Cafes / Bars / Restaurants / Food Trucks</a></li>
                      <li><a href="<?php echo $url; ?>/2015-eoi/box-funding/">Out of the Box Funding</a></li>
                    </ul>
                </div>
                <div class="small-12 columns">
                     <h5>&nbsp;</h5>
                     <h5>ABOUT</h5>
                     <ul>
                      <li><a href="<?php echo $url; ?>/about-white-night-melbourne/">About White Night</a></li>
                      <li><a href="<?php echo $url; ?>/2015-eoi//">Getting Involved</a></li>
                      <li><a href="<?php echo $url; ?>/history-of-white-night/">History</a></li>
                      <li><a href="<?php echo $url; ?>/contact-us/">Contact Us</a></li>
                     <!--
                     <li><a href="#">History</a></li>
                     <li><a href="#">International Events</a></li>
                     -->
                     <li><a href="<?php echo $url; ?>/the-team/">The Team</a></li>
                     <li><a href="<?php echo $url; ?>/partners">Partners/Supporters</a></li>
                    </ul>
                    <h5>&nbsp;</h5>                    
                    <h5>EXPLORE</h5>
                    <ul>
                      <li><a href="<?php echo $url; ?>/events/">2014 Full Programme</a></li>
                      <li><a href="<?php echo $url; ?>/events/">2013 Full Programme</a></li>
                    </ul>               
                  </div>
              </div>
            </div>
          </div>
        </div>