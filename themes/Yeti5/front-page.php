<?php get_header(); the_post();?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	  <div class="row featured-info">
	      <div class="centered-text date-text show-for-medium-down">
	        <h2>22 February 2014</h2>
	        <h3>7PM TO 7 AM</h3>
	      </div>
	    	<div class="small-12 large-8 columns">
          <?php include_once('slider.php'); ?>
          <ul class="small-block-grid-4 genre-list">
          <?php $genres = get_terms('genre'); 
            foreach ( $genres as $genre ) {
              echo '<li><a href="/genre/' . $genre->slug . '">' . $genre->name . '</a></li>';
              }
           ?>
          </ul>
        </div>
        <div class="small-12 large-4 columns">
          <div class="centered-text date-text hide-for-medium-down">
  	        <h2>22 February 2014</h2>
  	        <h3>7PM TO 7 AM</h3>
  	      </div>
  	      <div class="centered-text countdown hide-for-medium-down">
  	        <h6>Countdown to White Night Melbourne</h6>
  	        <div id="countdown"></div>
  	      </div>
  	      <div class="social centered-text">
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
	    <?php $precincts = get_terms('precinct');
            foreach ( $precincts as $precinct ) {?>
              <?php //print_r($precinct); ?>
              <?php
                $precinctID = 'precinct_' . $precinct->term_id;
                //echo $precinctID;
                $image = get_field('main_image', $precinctID );
              ?>
              <div>
                <a href="#">
                  <h3><?php echo $precinct->name ?></h3>
                  <img src="<?php echo $image['sizes']['event-small']; ?>">
                  <p><?php echo $precinct->description; ?></p>       
                </a>
                <div style="display:none">
                  <div class="row">
                    <div class="columns small-12 medium-6">
                      MAP
                    </div>
                    <div class="columns small-12 medium-6">
                      <a href="/precinct/<?php echo $precinct->slug ?>">MORE ></a>
                    </div>
                  </div>
                </div>
              </div>
      <?php } ?>

	  </div>
	</div><?php //end role main ?>
<?php get_footer(); ?>