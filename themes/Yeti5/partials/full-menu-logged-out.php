<?php /*
  Template Name: Full Menu Logged OUT
*/ ?>

 <a id="menu-full-my-night" class="menu-button dropdown" href="#"><span class="blue">+</span>My Night
                      <span class="small">Login / Create</span></a>
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
                            'redirect' => get_bloginfo('url'), 
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
                            <a href="<?php echo wp_lostpassword_url( get_bloginfo('url') ); ?>" title="Lost Password">Lost Password?</a>
                        </div>
                    </div>
                    <div class="row">
                      <div class="small-12 columns margin-bottom">
                        <h3>Don't have a login?</h3>
                        <a href="#" id="switchtoMNlogin" class="button expand blue margin-bottom">Register for My Night</a>
                      </div>
                    </div>
                  </div>
