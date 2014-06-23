<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php the_post(); 
  	//Lets set up ALL the variables first
  	$event_img = get_field('event_img');
  	$event_feat = $event_img['sizes']['event-small'];
  	
  	
  	$precinct = get_the_terms( $post->ID, 'precinct' );
  	foreach($precinct as $pre) {
    	$precinctClass = 'precinct_' . $pre->term_id;
    	$precinctName  = $pre->name;
    	$precinctSlug  = $pre->slug;
  	}
  	
  	// TIME
  	
  	$startTime = get_field('start_time');
  	
  	// duration is either a message or an end time. output it always $durationMsg
  	$duration = get_field('duration');
    if($duration == 720){
      $durationMsg = get_field('all_night_details');
    } else {
      $duration = $duration . ' minutes';
      $time = strtotime($startTime);
			$end = date("g:i a ", strtotime($duration, $time));
      $durationMsg = '<b>END TIME</b> ' . $end;
    }
    
    // Accessability. Output is $accessList
    
    $accessibilities = get_the_terms( $post->ID, 'accessibility' );
    
    if($accessibilities) {
      $accessList = "<b>ACCESSIBILITY</b> ";
      
      foreach($accessibilities as $accessibility) {
        $accessLink = '<a href="'. site_url() .'/events/?accessibility='. $accessibility->term_taxonomy_id .'">' . $accessibility->slug . '</a> ';
        $accessList .= $accessLink;
      } 
    }      
    //Price
    
    if(get_field('paid_event')){
      $price = '<b>PRICE</b> ' . get_field('paid_event_text');
      
      $ticketLink = get_field('paid_event_button_url');
      
    }
    
    //Genres out put is $genreList
    
    $genres = get_the_terms( $post->ID, 'genre' );
    
    $genreList = "";
    
    if($genres){
      foreach($genres as $genre) {
        $genreLink = '<a href="'. site_url() .'/events/?genre='. $genre->slug .'">' . $genre->slug . '</a> ';
        $genreList .= $genreLink;
      } 
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
		  <div class="centered-text margin-top margin-bottom title-box precinct-color">
		    <div class="color-bar"></div>
  		   <h1 class="h2 no-bottom"><?php the_title(); ?></h1>
         <h3 class="subheader no-top"><?php the_field('sub_title'); ?></h3>
		  </div>
      <div class="row">
        <div class="small-12 medium-12 large-8 columns">
        <?php 
				  if($event_img) { ?>
				<figure class="aligncenter">
    				  <img style="width:100%" src="<?php echo $event_feat; ?>">
    				  <?php if($event_img['caption']){ ?>
                <figcaption>Image: <?php echo $event_img['caption']; ?></figcaption>
              <?php } ?>
            </figure>
            <?php } ?>
          <div class="show-for-medium-down">
            <?php include(locate_template('partials/event-details.php')); ?>
          </div>
          <div class="show-for-medium-down excerpt-text">
            <?php the_excerpt(); ?>
          </div>
          <div class="show-for-large-up full-text">
            <?php the_content(); ?>
            <?php if(current_user_can( 'manage_options' )){
               edit_post_link('edit', '<p>', '</p>');
            } ?>
            <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-colorscheme="light"></div>
          </div>
        </div>
        <div class="small-12 medium-12 large-4 columns">
          <div class="show-for-large-up">
            <?php include(locate_template('partials/event-details.php')); ?>
          </div>
        </div>
      </div>
		</article>

	</div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php get_footer(); ?>

    <script type="text/javascript">
      $('#bookmark-control').hide();   
  </script>