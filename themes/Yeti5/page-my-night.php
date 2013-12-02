<?php get_header(); ?>
    <div class="small-12 columns">
      	<div class="acf-map" id="full-map"></div>
    	</div>
    	
<!-- Row for main content area -->
	<div class="small-12 medium-8 large-8 columns my-night" role="main">
  	<?php while (have_posts()) : the_post(); ?>
  		<article <?php post_class('padding-top') ?> id="post-<?php the_ID(); ?>">
  				<h1 class="entry-title h2">Events I've Added To <span class="blue">+</span>My Night</h1>
  			<div class="entry-content event-box-list">
  			<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2 ">
        <?php $post_objects = upb_list_bookmarks();
          if( $post_objects ): 
            foreach( $post_objects as $post): 
              $id = $post;
              $mypost = get_post($id);
              
              //Lets set up ALL the variables first
            	$event_img = get_field('event_img',$id);
            	$event_feat = $event_img['sizes']['event-feature'];
            	
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
                  $durationMsg = '<b>DURATION</b> ' . get_field('all_night_details',$id) .'<br>';
                }
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
                $genreLink = '<a href="/accessibility/'. $genre->slug .'">' . $genre->slug . '</a> ';
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
                    <h3><?php the_title(); ?></h3>
                  </div>
                
                <figure class="aligncenter">
        				  <img src="<?php echo $event_feat; ?>">
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
                <div class="single marker" style="display:none;" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                  <div class="wn-infoWindow">
                		  <img style="float:left; margin-right:5px;" src="<?php echo $event_img['sizes']['thumbnail']; ?>">
                		  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                        <?php echo '<p><b>START TIME</b> ' . $startTime .'</p>'; ?>
                  </div>
                </div>
              </article>
              </li>
            <?php  
            endforeach; ?>
            </ul>
            <?php
            wp_reset_postdata();
          endif; 
          ?>  				
  			</div>
  		</article>
  	<?php endwhile; // End the loop ?>
	</div>
  <div class="small-12 medium-4 large-4 columns is-single-page featured-info">
      <?php include(locate_template('partials/sidebar-details.php')); ?>
  </div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php get_footer(); ?>