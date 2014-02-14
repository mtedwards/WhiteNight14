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
              	 <script>
                  if (document.cookie.indexOf("wn_logged_in") >= 0) {
                    $( '#my-night-menu-item-mobile' ).load( "/partial/mobile-menu-logged-in/", function() {});
                  }
                  else {
                    $( '#my-night-menu-item-mobile' ).load( "/partial/mobile-menu-logged-out/", function() {});
                  }
                </script>
              </li>
            </ul>
          </div>
          <div class="search menu-buttons">
            <a class="icon-list dropdown"></a>
            <div class="sub-menu right">
              <div class="row">
                <div class="small-4 columns">
                   <ul>
                      <li><a href="<?php echo $url; ?>/events/"><b>FULL PROGRAMME</b></a></li>
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
                <div class="small-4 columns">
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
                <div class="small-4 columns">
                     <h5>VISITOR INFO</h5>
                     <ul>                
                       <li><a href="<?php echo $url; ?>/visiting-melbourne/">Visiting Melbourne</a></li>
                       <!-- <li><a href="#">Getting Here</a></li> -->
                       <!-- <li><a href="#">Getting Around</a></li> -->
                       <!-- <li><a href="#">Map</a></li> -->
                       <li><a href="<?php echo $url; ?>/visitor-information/getting-there-getting-around/">Getting There &amp; Getting Around</a></li>
                       <li><a href="<?php echo $url; ?>/where-to-eat-rest/">Where to Eat &amp; Rest</a></li>
                       <li><a href="<?php echo $url; ?>/faq/">Frequently Asked Questions</a></li> 
                       <!-- <li><a href="#">Getting Home</a></li> -->
                    </ul>
                    <h5>About Us</h5>
                    <ul>
                      <li><a href="<?php echo $url; ?>/about-white-night-melbourne/">About White Night</a></li>
                      <li><a href="<?php echo $url; ?>/history-of-white-night/">History</a></li>
                      <li><a href="<?php echo $url; ?>/getting-involved/">Getting Involved</a></li>
                      <li><a href="<?php echo $url; ?>/contact-us/">Contact</a></li>
                     <!--
                     <li><a href="#">History</a></li>
                     <li><a href="#">International Events</a></li>
                     -->
                     <li><a href="<?php echo $url; ?>/the-team/">The Team</a></li>
                     <li><a href="<?php echo $url; ?>/partners">Partners / Supporters</a></li>
                    </ul>               
                  </div>
              </div>
              <div class="row">
                <div class="small-12 columns">
                  <?php get_search_form(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>