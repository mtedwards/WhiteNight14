<?php get_header(); the_post();?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	  <div class="precinct-list">
  	  <div class="centered-text date-text show-for-medium-down white-bg">
        <h2>Explore the Precincts</h2>
      </div>
	    <?php 
            $args = array(
              'orderby' => 'slug',
              'order'   => 'ASC'
            );
	          $precincts = get_terms('precinct', $args);
            foreach ( $precincts as $precinct ) {
                $precinctClass = 'precinct_' . $precinct->term_id;
                $image = get_field('main_image', $precinctClass );
                $mapImage = get_field('map_image', $precinctClass );
                $name = $precinct->name;
                $slug = $precinct->slug;
                $description = get_field('location_description', $precinctClass );
              ?>              
              <?php include(locate_template('partials/front-page-box.php')); ?>  
      <?php } ?>
      <div class="content"></div>
	  </div><?php // end .precinct-list ?>
	  <div class="row">
  	  <div class="small-12 columns">
    	  <h2>DON'T MISS OUT!</h2>
        <p>New events and programmes will be added every week. Make sure you keep up-to-date by creating your own <a href="#" class="openMyNight">My Night Account</a>, following us on <a href="https://www.facebook.com/WhiteNightMelbourne" target="_blank">Facebook</a> and <a href="https://twitter.com/whitenightmelb" target="_blank">Twitter</a> or check back regularly before you head out on a night like no other.</p>
  	  </div>
	  </div>
	</div><?php //end role main ?>
  <script //src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php get_footer(); ?>