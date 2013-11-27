<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); 
  	//Lets set up ALL the variables first
  	$event_img = get_field('event_img');
  	
  	$precinct = get_the_terms( $post->ID, 'precinct' );
  	foreach($precinct as $pre) {
    	$precinctClass = 'precinct_' . $pre->term_id;
    	$precinctName  = 'precinct_' . $pre->name;
    	$precinctSlug  = 'precinct_' . $pre->slug;
  	}
  	
  	// TIME
  	
  	$startTime = get_field('start_time');
  	
  	// duration is either a message or an end time. output it always $durationMsg
  	$duration = get_field('duration');
    if($duration == 720){
      $durationMsg = '<b>DURATION</b> ' . get_field('all_night_details');
    } else {
      $duration = $duration . ' minutes';
      $time = strtotime($startTime);
			$end = date("g:i a ", strtotime($duration, $time));
      $durationMsg = '<b>END TIME</b> ' . $end;
    }
    
    // Accessability. Output is $accessList
    
    $accessibilities = get_the_terms( $post->ID, 'accessibility' );
    
    $accessList = "<b>ACCESSIBILITY</b> ";
    
    foreach($accessibilities as $accessibility) {
      $accessLink = '<a href="/accessibility/'. $accessibility->slug .'">' . $accessibility->slug . '</a> ';
      $accessList .= $accessLink;
    } 
    
    //Price
    
    if(get_field('paid_event')){
      $price = '<b>PRICE</b> ' . get_field('paid_event_text');
      
      $ticketLink = get_field('paid_event_button_url');
      
    }
    
    //Genres out put is $genreList
    
    $genres = get_the_terms( $post->ID, 'genre' );
    
    $genreList = "";
    
    foreach($genres as $genre) {
      $genreLink = '<a href="/accessibility/'. $genre->slug .'">' . $genre->slug . '</a> ';
      $genreList .= $genreLink;
    } 
    
    // VENUE and LOCATION DETAILS
    if(get_field('existing_venue')) {
  		  $venue = get_field('venue');
  		  $venueName = $venue[0]->name;
  		  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
  	 } else {
  	    $venueName = get_field('venue_name');
  		  $location = get_field('location');
  	 }
    
    $location_details = get_field('location_details');
    
    // CREDITS
    
    $presentedBy = get_field('presented_by');
    $creativeCredit = get_field('creative_credit');
    
    ?>
		<article <?php post_class($precinctClass) ?> id="post-<?php the_ID(); ?>">
		  <div class="row">
  		  <div class="small-12 columns centered-text title-box precinct-color">
  		    <div class="color-bar"></div>
    		   <h1 class="h2 no-bottom"><?php the_title(); ?></h1>
           <h3 class="subheader"><?php the_field('sub_title'); ?></h3>
  		  </div>
		  </div>
      <div class="row">
        <div class="small-12 medium-12 large-8 columns">
        <?php 
				  if($event_img) { 
  				  $small_url = $event_img['sizes']['event-small'];
  				  $med_url = $event_img['sizes']['event-medium'];
  				  $large_url = $event_img['sizes']['event-large'];
				  ?>
				    <figure class="aligncenter">
    				  <img src="<?php echo $small_url; ?>" data-interchange="
    				    [<?php echo $small_url; ?>, (only screen and (min-width: 1px))],
    				    [<?php echo $med_url; ?>, (only screen and (min-width: 450px))],
    				    [<?php echo $large_url; ?>, (only screen and (min-width: 750px))]"
    				  >
              <figcaption><?php echo $event_img['caption']; ?></figcaption>
            </figure>
            <?php } ?>
          <div class="show-for-medium-down">
            <?php include(locate_template('event-details.php')); ?>
          </div>
        </div>
        <div class="small-12 medium-12 large-4 columns">
          <div class="show-for-large-up">
            <?php include(locate_template('event-details.php')); ?>
          </div>
        </div>
      </div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>

		
<?php get_footer(); ?>