<?php get_header(); ?>
<!-- Row for main content area -->
	<div class="small-12 columns title-box" role="main">
  	<h1 class="entry-title centered-text no-bottom margin-top2"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>
  	<p class="no-bottom hide-for-medium-down"><a href="<?php site_url(); ?>/events/">Explore</a> / <a href="<?php site_url(); ?>/precincts/">Precincts</a> / <a href="#"><?php echo $term->name; ?></a></p>
  	<div class="row">
    	<div class="small-12 columns">
      	<div class="acf-map" id="full-map"></div>
    	</div>
    	<div class="small-12 columns">
      	<div class="white-box hide-for-medium-down">
      	  <div class="row ">
      	  <div class="small-8 columns">
        	  <?php echo term_description(); ?>        	  
      	  </div>
      	  <div class="small-4 columns">
        	  <h3>SHARE THIS PRECINCT:</h3>
        	  <div class="fb-like" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
          <div class="row">
              <div class="small-6 columns"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a></div>
              <div class="small-6 columns"></div>
                <div class="g-plus" data-action="share" data-annotation="none"></div>
            </div>

      	  </div>
      	</div>
      	</div>
    	</div>
  	</div>	
	</div>
</div>
<div class="row main-content-section padding-top">
  <div class="small-12 columns event-list">
  <?php
  if (have_posts() ) :?>
  <h2>Events in this precinct:</h2>
  <?php while ( have_posts() ) : the_post(); ?>
  
    <?php /* Lets get all the variables first */ 
        //StartTime
        $startTime = get_field('start_time');
        $startTimeText = '<b>START TIME</b> ' . $startTime .'<br>';
        
        	$duration = get_field('duration');
          if($duration == 720){
            if (get_field('all_night_details')){
              $durationMsg = get_field('all_night_details') . '<br>';
            } else {$durationMsg ='';}
          } else {
            $duration = $duration . ' minutes';
            $time = strtotime($startTime);
      			$end = date("g:i a ", strtotime($duration, $time));
            $durationMsg = '<b>END TIME</b> ' . $end. '<br>';
          }

        
        $subtitle = get_field('sub_title');
        
        //Precinct
        
        $precinct = get_the_terms( $post->ID, 'precinct' );
        	foreach($precinct as $pre) {
          	$precinctClass = 'precinct_' . $pre->term_id;
          	$precinctName  = $pre->name;
          	$precinctSlug  = $pre->slug;
        	}
        	
        	$precinctMsg = '<b>PRECINCT </b><a href="/precinct/'. $precinctSlug.'">' .$precinctName .'</a><br>';
        	
        	 //Genres out put is $genreList
    
          $genres = get_the_terms( $post->ID, 'genre' );
          
          $genreList = "";
          if($genres) {
            foreach($genres as $genre) {
              $genreLink = '<a href="'. site_url() .'/events/?genre='. $genre->slug .'">' . $genre->slug . '</a> ';
              $genreList .= $genreLink;
            } 
          }
          
          
        
        //location
        
        if(get_field('existing_venue')) {
  			  $venue = get_field('venue');
  			  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
			  } else {
  			  $location = get_field('location');
			  }         
        $post_type = get_post_type( $post );
        if($post_type == 'event') { ?>
        <article <?php post_class($precinctClass) ?> id="post-<?php the_ID(); ?>">
          <div class="color-bar"></div>
    			<div class="entry-content row">
    			
      			<div class="small-12 medium-12 large-8 hide-for-large-up columns padding top-title">
        			  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      			</div>
      			<?php 
    				  $event_img = get_field('event_img');
    				  if($event_img) { 
    				  ?>
      		    <figure class="small-12 medium-12 large-4 columns">
      				  <img src="<?php echo $event_img['sizes']['event-medium']; ?>">
          			<?php $id = get_the_ID(); ?>
                <div class="upb_add_remove_links">
                  <a href="#" rel="<?php echo $id; ?>" class="upb_add_bookmark upb_bookmark_control upb_bookmark_control_<?php echo $id; ?>">+</a>
                </div>
              </figure>
              <?php } //end if event_img ?>
        		<div class="small-12 medium-12 large-8 columns padding">
        		  <div class="show-for-large-up">
        			  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        			  <?php if($subtitle ){ ?>
        			    <h5><?php echo $subtitle; ?></h5>
        			  <?php } ?>
              </div>
              <div class="show-for-large-up">
                <?php the_excerpt(); ?>
              </div>
                <p>
                  <?php 
                    echo $startTimeText;
                    echo $durationMsg;
                    echo $precinctMsg;
                    echo $genreList;    //Genres out put is $genreList
                  ?>
                </p>
      			</div>
    		</div>
        <?php if($location['lat']) { ?>
      		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
      		  <div class="wn-infoWindow">
        			  <img style="float:left; margin-right:5px;" src="<?php echo $event_img['sizes']['thumbnail']; ?>">
        			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                  <?php echo '<p><b>START TIME</b> ' . $startTime .'</p>'; ?>
      		  </div>
          </div>
        <?php } ?>
    		</article>
		
      <?php } // end if event  ?>
		
		
  <?php
  endwhile;
  endif;
  wp_reset_postdata(); ?>

</div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<?php get_footer(); ?>