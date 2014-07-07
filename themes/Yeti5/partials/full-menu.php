<?php 
  /*
    Template Name: Full Menu
  */
?>
<?php $url = get_bloginfo('url'); ?>
<div class="full-menu">
          <div class="logo">
            <a href="<?php echo $url; ?>"><img src="<?php bloginfo('template_url'); ?>/img/white-logo.png"alt="White Night Melbourne logo"></a>
          </div>
          <div class="menu-buttons">
            <ul>
              <li>
                <a id="menu-full-explore" class="menu-button dropdown" href="#">Submissions</a>
                <div class="sub-menu">
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
              </li>
              <li>
                <a id="menu-full-info" class="menu-button dropdown" href="#">About</a>
                 <div class="sub-menu">
                  <div class="left">
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
                  </div>
                  <div class="right">
                  </div>
                 </div><?php //end submenu ?>
              </li>
              <li>
                <a id="menu-full-info" class="menu-button dropdown" href="#">Explore</a>
                 <div class="sub-menu">
                  <div class="left">
                     <ul>
                         <li><a href="<?php echo $url; ?>/events/">2014 Full Programme</a></li>
                         <li><a href="<?php echo $url; ?>/events/">2013 Full Programme</a></li> 
                    </ul>
                  </div>
                  <div class="right">
                  </div>
                 </div><?php //end submenu ?>
              </li>
            </ul>
          </div>
          <div class="menu-buttons search">
            <ul>
             <li>             
               <a id="menu-full-search" class="menu-button dropdown" href="#"><i class="icon-search"></i></a>
                <div class="sub-menu">
                  <?php get_search_form(); ?>
                </div>
             </li>
            </ul>
          </div>
        </div>