<?php get_header(); the_post();?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	  <div class="row featured-info">
	      <div class="centered-text date-text show-for-medium-down white-bg">
	        <h2>22 February 2014</h2>
	        <h3>7PM TO 7 AM</h3>
	      </div>
	    	<div class="small-12 large-8 columns">
          <?php include_once('slider.php'); ?>
          <ul class="small-block-grid-4 genre-list">
          <?php $genres = get_terms('genre'); 
            foreach ( $genres as $genre ) {
              echo '<li><a href="'. get_bloginfo('url') .'/events/?genre=' . $genre->slug . '">' . $genre->name . '</a></li>';
              }
           ?>
          </ul>
        </div>
        <div class="small-12 large-4 columns">
          <div class="centered-text date-text hide-for-medium-down white-bg">
  	        <h2>22 February 2014</h2>
  	        <h3>7PM TO 7 AM</h3>
  	      </div>
  	      <div class="centered-text countdown hide-for-medium-down white-bg">
  	        <h6>Countdown to White Night Melbourne</h6>
  	        <div id="countdown"></div>
  	      </div>
  	      <div class="social centered-text white-bg">
            <a href="https://www.facebook.com/WhiteNightMelbourne" class="social-icon facebook" target="_blank">Like us on Facebook</a>
            <a href="https://twitter.com/whitenightmelb" class="social-icon twitter" target="_blank">Follow us on Twitter</a>
            <a href="http://instagram.com/whitenightmelb/" class="social-icon instagram" target="_blank">Follow us on Instagram</a>
            <a href="https://www.youtube.com/user/WhiteNightMelbourne" class="social-icon youtube" target="_blank">Join our YouTUbe Channel</a>
            <a href="" class="social-icon gplus" target="_blank">Join us on Google +</a>
  	        <h2>#WHITENIGHTMELB</h2>
  	      </div>
        </div>
	  </div>
	  <div class="precinct-list">
	  <div class="centered-text date-text show-for-medium-down white-bg">
      <h2>Explore the Precincts</h2>
    </div>
	    <?php $precincts = get_terms('precinct');
            foreach ( $precincts as $precinct ) {
                $precinctID = 'precinct_' . $precinct->term_id;
                $image = get_field('main_image', $precinctID );
                $name = $precinct->name;
                $description = get_field('location_description', $precinctID );
              ?>              
              <article class="<?php echo $precinctID; ?>">
                <a href="#">
                  <h3><?php echo $name ?></h3>
                  <img src="<?php echo $image['sizes']['event-small']; ?>">
                  <!-- <p><?php echo $description; ?></p>  -->
                </a>
                <div class="precinct-content">
                  <div class="row">
                    <div class="columns small-12 medium-6">
                      <div class="acf-map" id="<?php echo 'map-' . $precinctID; ?>"></div>
                    </div>
                    <div class="columns small-12 medium-6 <?php echo 'markers-' . $precinctID; ?>">
                      <?php
                      $args = array( 
                          'post_type' => 'event',                         
                          'posts_per_page' => -1,                
                          'order' => 'ASC',
                          'orderby' => 'title',
                          'precinct' => $name
                          );
                      
                      $the_query = new WP_Query( $args );
                      
                      // The Loop
                      if ( $the_query->have_posts() ) :
                      while ( $the_query->have_posts() ) : $the_query->the_post();?>
                      <?php the_title(); ?><br>
              			 <?php
                      endwhile;
                      endif;
                      
                      // Reset Post Data
                      wp_reset_postdata();
                      
                      ?>
                      <a class="button black small" href="/precinct/<?php echo $precinct->slug ?>">MORE ></a>
                    </div>
                  </div>
                </div>
              </article>     
      <?php } ?>
      <div class="content"></div>
	  </div><?php // end .precinct-list ?>
	</div><?php //end role main ?>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php get_footer(); ?>