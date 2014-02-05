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
                <a id="menu-full-explore" class="menu-button dropdown" href="#">EXPLORE</a>
                <div class="sub-menu">
                  <div class="left">
                    <ul>
                      <li><a href="<?php echo $url; ?>/events/"><h5>FULL PROGRAMME</h5></a></li>
                      <!-- <li><a href="#"><b>Journeys</b></a></li> -->
                    </ul>
                    <h5>Precincts</h5>
                    <ul>
                      <li><a href="<?php echo $url; ?>/precinct/01-northern-lights/">Northern Lights</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/02-lucky-dip/">Lucky Dip</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/03-jrb/">J + R&B</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/04-shadows/">Shadows</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/05-rags-to-riches/">Rags to Riches</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/06-wonderland/">Wonderland</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/07-the-vortex/">The Vortex</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/08-midden/">Midden</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/09-alex-and-the-engineer/">Alex and the engineer</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/10-tattooed-city/">Tattooed City</a></li>
                      <li><a href="<?php echo $url; ?>/precinct/11-outer-limits/">Outer Limits</a></li>
                    </ul>
                    
                  </div>
                  <div class="right">
                    <ul>
                      <li><a href="<?php echo $url; ?>/events/?genre=art">Art</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=design">Design</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=family">Family</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=fashion">Fashion</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=film">Film</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=lighting">Lighting</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=music">Music</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=performance">Performance</a></li>
                      <li><a href="<?php echo $url; ?>/events/?genre=sport">Sport</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li id="my-night-menu-item">
              </li>
                <script>
                  if (document.cookie.indexOf("wn_logged_in") >= 0) {
                    $( '#my-night-menu-item' ).load( "/partial/full-menu-logged-in/", function() {});
                  }
                  else {
                    $( '#my-night-menu-item' ).load( "/partial/full-menu-logged-out/", function() {});
                  }
                </script>
              <li>
                <a id="menu-full-info" class="menu-button dropdown" href="#">Visitor Info</a>
                 <div class="sub-menu">
                  <div class="left">
                    <h5>VISITOR INFO</h5>
                     <ul>
        
                         <li><a href="<?php echo $url; ?>/visiting-melbourne/">Visiting Melbourne</a></li>
                         <!-- <li><a href="<?php echo $url; ?>/visitor-information/getting-there-getting-around/">Getting Here / Getting Around</a></li> -->
                         <!-- <li><a href="#">Map</a></li> -->
                         <li><a href="<?php echo $url; ?>/visitor-information/getting-there-getting-around/">Getting There &amp; Getting Around</a></li>
                         <li><a href="<?php echo $url; ?>/where-to-eat-rest/">Where to Eat &amp; Rest</a></li>
                         <!-- <li><a href="#">Getting Home</a></li> -->
                         
                
                    </ul>
                    <h5>About Us</h5>
                    <ul>
                      <li><a href="<?php echo $url; ?>/about-white-night-melbourne/">About White Night</a></li>
                      <li><a href="<?php echo $url; ?>/history-of-white-night/">History</a></li>
                      <li><a href="<?php echo $url; ?>/getting-involved/">Getting Involved</a></li>
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
                  <?php if ( is_user_logged_in() ) { ?>
                      <a class="button blue expand padding-bottom logout" href="<?php echo wp_logout_url(get_bloginfo('url')); ?>" title="Logout">Logout</a>
                    <?php } ?>
                 </div><?php //end submenu ?>
              </li>
            </ul>
          </div>
          <div class="menu-buttons search">
            <ul>
             <li>             
               <a id="menu-full-search" class="menu-button dropdown" href="#">?</a>
                <div class="sub-menu">
                  <?php get_search_form(); ?>
                </div>
             </li>
            </ul>
          </div>
        </div>