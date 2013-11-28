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
          <?php include(locate_template('partials/sidebar-details.php')); ?>
        </div>
	  </div>
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
                $name = $precinct->name;
                $slug = $precinct->slug;
                $description = get_field('location_description', $precinctClass );
              ?>              
              <article class="<?php echo $precinctClass; ?>">
                <div class="color-bar"></div>
                <a href="#">
                  <h3><?php echo $name ?></h3>
                  <img src="<?php echo $image['sizes']['event-small']; ?>">
                  <div class="locationDescription"><p><?php echo $description; ?></p></div>
                </a>
                <div class="precinct-content">
                  <div class="row">
                    <div class="columns small-12 medium-6">
                      <img src="<?php bloginfo('template_url'); ?>/img/precinct-map-holder.gif">
                    </div>
                    <div class="columns small-12 medium-6 <?php echo 'markers-' . $precinctID; ?>">
                      <?php
                      $args = array( 
                          'post_type' => 'event',                         
                          'posts_per_page' => -1,                
                          'order' => 'ASC',
                          'orderby' => 'title',
                          'precinct' => $slug
                          );
                      
                      $the_query = new WP_Query( $args );
                      
                      // The Loop
                      if ( $the_query->have_posts() ) : ?>
                      <ul>
                      <?php
                        while ( $the_query->have_posts() ) : $the_query->the_post();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
              			 <?php endwhile; ?>
                      </br>
                     <?php endif;
                      
                      // Reset Post Data
                      wp_reset_postdata();
                      
                      ?>
                      <a class="button black small" href="<?php bloginfo('url'); ?>/precinct/<?php echo $precinct->slug ?>">MORE ></a>
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