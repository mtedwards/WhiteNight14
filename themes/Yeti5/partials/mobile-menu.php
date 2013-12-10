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
              <li>
                <?php if(is_user_logged_in()){ // REMOVE THE ! WHEN FINISHED TESTING!!!!! ?>
                  <a  class="menu-button" href="<?php echo $url; ?>/my-night"><span class="blue">+</span>My<br>Night</a>

                <?php } else { ?>
                  <a id="menu-full-my-night" class="menu-button dropdown" href="#"><span class="blue">+</span>My<br>Night
                  <div class="sub-menu my-night-dropdown" id="createMN">
                    <h4>Create a <span class="blue">+</span>My Night Account</h4>
                    <div class="row">
                      <div class="small-6 columns">
                        <b>Create a <span class="blue">+</span>My Night Account so you can:</b>
                          <ul class="small-menu">
                            <li>Save your favourite events.</li>
                            <li>Invite your friends and family to join you</li>
                            <li>Stay up-to-date with White Night Melbourne News</li>
                          </ul>
                      </div>
                        <div class="small-6 columns">
                          <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">   
                            <div class="row">
                              <div class="small-12 columns">
                                <input type="text" name="user_login" placeholder="Username" id="" class="input"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="small-12 columns">
                                <input type="text" name="user_email" placeholder="Email" id="" class="input" /> 
                              </div>
                            </div>
                             <div class="row">
                              <div class="small-12 columns">
                                <?php do_action('register_form'); ?> 
                                <input class="button" type="submit" value="Register" id="register" onclick="_gaq.push(['_trackEvent', 'click', 'my night', 'register'])" />
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
                      <div class="small-12 columns margin-bottom">
                        <a href="#" id="switchtoMNlogin" class="button expand blue margin-bottom">Login to My Night</a>
                      </div>
                    </div>
                  </div>
                  <div class="sub-menu my-night-dropdown" id="loginMN">
                    <h4>Login to <span class="blue">+</span>My Night</h4>
                    <div class="row">
                        <div class="small-12 columns">
                          <?php $args = array(
                            'echo' => true,
                            'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
                            'form_id' => 'loginform',
                            'label_username' => __( 'Username' ),
                            'label_password' => __( 'Password' ),
                            'label_remember' => __( 'Remember Me' ),
                            'label_log_in' => __( 'Log In' ),
                            'id_username' => 'user_login',
                            'id_password' => 'user_pass',
                            'id_remember' => 'rememberme',
                            'id_submit' => 'wp-submit',
                            'remember' => true,
                            'value_username' => NULL,
                            'value_remember' => false ); ?> 
                            <?php wp_login_form( $args ); ?>
                            <a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" title="Lost Password">Lost Password?</a>
                        </div>
                    </div>
                    <div class="row">
                      <div class="small-12 columns margin-bottom">
                        <h3>Don't have a login?</h3>
                        <a href="#" id="switchtoMNlogin" class="button expand blue margin-bottom">Register for My Night</a>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </li>
              <li>
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
                      <li><a href="<?php echo $url; ?>/precinct/03-jrb/">J+R&B</a></li>
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
                       <li><a href="<?php echo $url; ?>/visitor-information/">Visiting Melbourne</a></li>
                       <!-- <li><a href="#">Getting Here</a></li> -->
                       <!-- <li><a href="#">Getting Around</a></li> -->
                       <!-- <li><a href="#">Map</a></li> -->
                       <li><a href="<?php echo $url; ?>/where-to-eat-rest/">Where to Eat &amp; Rest</a></li>
                       <!-- <li><a href="#">Getting Home</a></li> -->
                    </ul>
                    <h5>About Us</h5>
                    <ul>
                      <li><a href="<?php echo $url; ?>/about-white-night-melbourne/">About White Night</a></li>
                      <li><a href="<?php echo $url; ?>/history-of-white-night/">History</a></li>
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
            </div>
          </div>
        </div>