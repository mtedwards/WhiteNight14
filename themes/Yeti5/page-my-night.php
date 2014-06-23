<?php get_header(); ?>
    <div class="small-12 columns">
      <?php $post_objects = upb_list_bookmarks();
        if($post_objects) {?>
      	  <div class="acf-map" id="full-map"></div>
        <?php } ?>
    	</div>
    	
<!-- Row for main content area -->
	<div class="small-12 medium-8 large-8 columns my-night" role="main">
  	<?php while (have_posts()) : the_post(); ?>
  		<article <?php post_class('padding-top') ?> id="post-<?php the_ID(); ?>">
  		  <?php 
          if( $post_objects ){ ?>
  				<h1 class="entry-title h2">Events I've Added To <span class="blue">+</span>My Night</h1>
          <?php } ?>
  			<div class="entry-content event-box-list">
  			<?php 
          if( $post_objects ){ ?>
  			<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2 ">
  			
        <?php
            foreach( $post_objects as $post): 
              $id = $post;
              $mypost = get_post($id);
              $permalink = get_permalink( $id );
              //Lets set up ALL the variables first
            	$event_img = get_field('event_img',$id);
            	$event_feat = $event_img['sizes']['event-small'];
            	
            	$pinImage = get_field('pin_image', $id);
            	
            	$precinct = get_the_terms( $id, 'precinct' );
            	foreach($precinct as $pre) {
              	$precinctClass = 'precinct_' . $pre->term_id;
              	$precinctName  = $pre->name;
              	$precinctSlug  = $pre->slug;
            	}
              $startTime = get_field('start_time',$id);
              // duration is either a message or an end time. output it always $durationMsg
            	$duration = get_field('duration',$id);
              if($duration == 720){
                $msg = get_field('all_night_details',$id);
                if($msg){
                  $durationMsg = get_field('all_night_details',$id) .'<br>';
                } else {$durationMsg =  null;}
              } else {
                $duration = $duration . ' minutes';
                $time = strtotime($startTime);
          		$end = date("g:i a ", strtotime($duration, $time));
                $durationMsg = '<b>END TIME</b> ' . $end .'<br>';
              } 
              
              //Genres out put is $genreList    
              $genres = get_the_terms( $id, 'genre' );              
              $genreList = "";              
              foreach($genres as $genre) {
                $genreLink = '<a href="'. site_url() .'/events/?genre='. $genre->slug .'">' . $genre->slug . '</a> ';
                $genreList .= $genreLink;
              }
              
                  // VENUE and LOCATION DETAILS
              if(get_field('existing_venue',$id)) {
            		  $venue = get_field('venue',$id);
            		  $venueName = $venue[0]->name;
            		  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
            	 } else {
            	    $venueName = get_field('venue_name',$id);;
            		  $location = get_field('location',$id);
            	 }
              
              $location_details = get_field('location_details');

              // the_field('start_time',$id); ?>
              <li class="my-event">
              <article <?php post_class($precinctClass) ?> id="post-<?php the_ID(); ?>">
                <div class="color-bar"></div>
                  <div class="padding">
                    <h3><?php if($pinImage){ echo '<img class="pinImage" src="' . $pinImage . '"/> &nbsp;'; } ?><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
                    <p class="hide"><?php echo $location['address']; ?></p>
                  </div>
                
                <figure class="aligncenter">
        				  <a href="<?php echo $permalink; ?>"><img style="width:100%" class="featureImg" src="<?php echo $event_feat; ?>"></a>
        				  <a href="#" rel="<?php echo $id; ?>" class="upb_del_bookmark upb_bookmark_control upb_bookmark_control_<?php echo $id; ?>">X</a>
                </figure>
                <div class="event-details padding">
                  <p>
                    <b>Start Time</b> <?php echo $startTime; ?><br>
                    <?php echo $durationMsg; ?>
                    <b>Precinct</b> <a href="<?php echo get_bloginfo('url') . '/precinct/' . $precinctSlug ?>"><?php echo $precinctName; ?></a> 
                  </p>
                  <p>
                    <?php echo $genreList ?>
                  </p>
                </div>
                <?php if($location['lat']){ ?>
                <div class="single marker" style="display:none;" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php echo $pinImage; ?>">
                  <div class="wn-infoWindow">
                		  <img style="float:left; margin-right:5px;" src="<?php echo $event_img['sizes']['thumbnail']; ?>">
                		  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                        <?php echo '<p><b>START TIME</b> ' . $startTime .'</p>'; ?>
                  </div>
                </div>
                <?php } // end if location ?>
              </article>
              </li>
            <?php  
            endforeach; ?>
            </ul>
            <?php
            wp_reset_postdata();
          } else { ?>
          <div class="row">
            <div class="small-12 columns">
              <h2>Planning your night is easy!</h2>
              <h4>Click the blue <span class="blue">plus +</span> on any event to add it to your night.</h4>
          
              <p>Explore the <a href="<?php bloginfo('url'); ?>/events">full programme</a> or browse the <a href="<?php bloginfo('url'); ?>/precincts">precincts</a> to find events that appeal to you.</p>
            </div>
          </div>
          <div class="row">
            <div class="small-12 medium-6 columns">
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
            <div class="small-12 medium-6 columns">
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
         <?php } //endif;  ?>
         <?php if (!is_user_logged_in() ) { ?>
         <div class="row">
	         <div class="small-12 medium-12 large-8 large-centered columns centered-text">
	         	<h5>You are currently not Logged In</h5>
		        <a class="button blue expand padding-bottom logout" href="<?php echo wp_login_url(get_bloginfo('url')); ?>" title="Logout">Login</a>
	         </div>
         </div>
         <?php } ?>
  			</div>
  		</article>
  	<?php endwhile; // End the loop ?>
	</div>
  <div class="small-12 medium-4 large-4 columns is-single-page featured-info my-night-featured">
  	   <?php if ( is_user_logged_in() ) { ?>
        <div class="social centered-text white-bg button-box">
          <a onclick="_gaq.push(['_trackEvent', 'click', 'print', '<?php the_title(); ?>'])" id="print" class="button black expand padding-bottom logout" href="#" title="Print">Print <span class="blue">+</span>My Night</a>
        </div>
                <!-- AddThis Button BEGIN -->
        <div class="social centered-text white-bg button-box">
        	<h2>Share your night</h2>
			<?php 
				global $current_user;
				get_currentuserinfo();
				$userName = $current_user->user_login;
			?>
			<div class="addthis_toolbox addthis_default_style addthis_32x32_style"
				addthis:url="<?php bloginfo('url'); ?>/my-night/<?php echo $userName; ?>"
                addthis:title="<?php echo $userName; ?>'s +My Night | White Night Melbourne"
                addthis:description="View the events I'm looking forward to at White Night Melbourne">
			<ul>
				<li><a class="addthis_button_facebook"></a></li>
				<li><a class="addthis_button_twitter"></a></li>
				<li><a class="addthis_button_google_plusone_share"></a></li>
				<li><a class="addthis_button_email"></a></li>
				<li><a class="addthis_button_compact"></a></li>
			</ul>
			</div>
			<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51ca4a5d3398899f"></script>
			<!-- AddThis Button END -->
        </div>
      <?php } ?>
      <div class="centered-text date-text hide-for-medium-down white-bg">
        <h2>22 February 2014</h2>
        <h3 class="no-bottom">7PM TO 7AM</h3>
      </div>
      <div class="centered-text countdown hide-for-medium-down white-bg">
        <h6>Countdown to White Night Melbourne</h6>
        <div id="countdown"></div>
      </div>
      <div class="social centered-text white-bg">
        <a href="https://www.facebook.com/WhiteNightMelbourne" class="social-icon facebook" target="_blank" onclick="_gaq.push(['_trackEvent', 'click', 'social', 'facebook'])" >Like us on Facebook</a>
        <a href="https://twitter.com/whitenightmelb" class="social-icon twitter" target="_blank" onclick="_gaq.push(['_trackEvent', 'click', 'social', 'twitter'])">Follow us on Twitter</a>
        <a href="http://instagram.com/whitenightmelb/" class="social-icon instagram" target="_blank" onclick="_gaq.push(['_trackEvent', 'click', 'social', 'instagram'])">Follow us on Instagram</a>
        <a href="https://www.youtube.com/user/WhiteNightMelbourne" class="social-icon youtube" target="_blank" onclick="_gaq.push(['_trackEvent', 'click', 'social', 'youtube'])">Join our YouTUbe Channel</a>
        <a href="https://plus.google.com/109173756154545584645" class="social-icon gplus" target="_blank" onclick="_gaq.push(['_trackEvent', 'click', 'social', 'gplus'])">Join us on Google +</a>
        <h2>#WHITENIGHTMELB</h2>
      </div>
      <div class="hide-for-medium-down centered-text">
        <?php $myNightEvents = upb_list_bookmarks(); ?>
        <?php if(! $myNightEvents) { ?>
          <a href="#" class="openMyNight"><img src="<?php bloginfo('template_url'); ?>/img/planningMN2.jpg"></a>
        <?php } ?>
      </div>
       <?php if ( is_user_logged_in() ) { ?>
        <div class="social centered-text white-bg button-box">
          <a class="button blue expand padding-bottom logout" href="<?php echo wp_logout_url(get_bloginfo('url')); ?>" title="Logout">Logout</a>
        </div>
		<?php } ?>
		<?php include(locate_template('partials/promo-boxes.php')); ?> 
      
  </div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php get_footer(); ?>