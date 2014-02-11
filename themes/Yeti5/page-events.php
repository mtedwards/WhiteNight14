<?php get_header(); ?>
  	<?php 
  	  $cur_precinct = $_GET['precinct'];
    	$cur_genre = $_GET['genre'];
    	$cur_accessibility = $_GET['accessibility']; ?>
<!-- Row for main content area -->
	<div class="small-12 columns title-box" role="main">
  	<h1 class="entry-title centered-text no-bottom margin-top2"><?php the_title(); ?></h1>
  	<p class="no-bottom hide-for-medium-down"><a href="<?php site_url(); ?>/events/">Explore</a> / <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
  	<div class="row">
    	<div class="small-12 columns">
      	<div class="acf-map" id="full-map"></div>
    	</div>
  	</div>	
	</div>
</div>
<div class="row main-content-blue">
  <div class="small-12 columns show-for-medium-down">
    <a href="#" class="button blue expand" id="toggleFilter"><h3>Filter...</h3></a>
  </div>
  <div class="small-12 columns filter-box">
   <form class="padding-top padding-bottom" name="filter" action="" method="GET">
    <div class="row">
      <div class="small-12 medium-6 large-3 columns">
        <select id="precinct" name="precinct">
          <option value="">All Precincts</option>
          <?php $precincts = get_terms('precinct');
            foreach ( $precincts as $precinct ) { 
            if( $precinct->slug == $cur_precinct ) { ?>
              <option selected value="<?php echo $precinct->slug; ?>"><?php echo $precinct->name; ?></option>
            <?php } else { ?>
              <option value="<?php echo $precinct->slug; ?>"><?php echo $precinct->name; ?></option>
            <?php } ?>
          <?php } ?>
        </select>      
      </div>
      <div class="small-12 medium-6 large-3 columns">
        <select id="genre" name="genre">
          <option value="">All Event Categories</option>
          <?php $genres = get_terms('genre');
            foreach ( $genres as $genre ) { 
            if( $genre->slug == $cur_genre ) { ?>
              <option selected value="<?php echo $genre->slug; ?>"><?php echo $genre->name; ?></option>
            <?php } else { ?>
              <option value="<?php echo $genre->slug; ?>"><?php echo $genre->name; ?></option>
            <?php } ?>
          <?php } ?>
        </select>
      </div>
      <div class="small-12 medium-6 large-3 columns">
        <select id="genre" name="accessibility">
          <option value="">All Accessibility</option>
          <?php $accessibilitys = get_terms('accessibility');
            foreach ( $accessibilitys as $accessibility ) { 
            if( $accessibility->term_taxonomy_id == $cur_accessibility ) { ?>   
              <option selected value="<?php echo $accessibility->term_taxonomy_id; ?>"><?php echo $accessibility->name; ?></option>
            <?php } else { ?>
              <option value="<?php echo $accessibility->term_taxonomy_id; ?>"><?php echo $accessibility->name; ?></option>
            <?php } ?>
          <?php } ?>
        </select>
      </div>
      <div class="small-12 medium-6 large-3 columns">
        <button type="submit" class="button small expand">UPDATE RESULTS</button>
      </div>
    </div>
  </form>
	</div>
</div>
<div class="row main-content-section padding-top">
  <div class="small-12 columns event-list">
  <?php
  $tax = array();
  if($cur_precinct) {
    $pre_tax = array(
            'taxonomy' => 'precinct',
            'field' => 'slug',
            'terms' => $cur_precinct,    
            'operator' => 'IN'                   
          );
    }
  
  if($cur_genre) {
    $gen_tax = array(
            'taxonomy' => 'genre',
            'field' => 'slug',
            'terms' => $cur_genre,    
            'operator' => 'IN'                   
          );
    }
  
  if($cur_accessibility) {
     $acc_tax = array(
          'taxonomy' => 'accessibility',
          'field' => 'term_taxonomy_id',
          'terms' => $cur_accessibility,    
          'operator' => 'IN'                   
        );  
      }
  
  $args = array( 
      'post_type' => 'event',  
      'posts_per_page' => -1,                
      'order' => 'ASC',
      'orderby' => 'title',
      'tax_query' => array(
        'relation' => 'AND',                   
          $pre_tax,
          $gen_tax,
          $acc_tax
      )
    );
  
  $the_query = new WP_Query( $args );
  
  // The Loop
  if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
  
    <?php 
      $id = get_the_ID();
      if($id == 132){} else {
    
    /* Lets get all the variables first */ 
        //StartTime
        $startTime = get_field('start_time');
        $startTimeText = '<b>START TIME</b> ' . $startTime .'<br>';
        
        	$duration = get_field('duration');
          if($duration == 720){
            if (get_field('all_night_details')){
              $durationMsg = get_field('all_night_details') . '<br>';
            } else { $durationMsg =''; }
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
          if($genres){
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
			  } ?>
        
    <article <?php post_class($precinctClass) ?> id="post-<?php the_ID(); ?>">
      <div class="color-bar"></div>
			<div class="entry-content row">
  			<div class="small-12 medium-12 large-8 hide-for-large-up columns padding top-title">
    			  <h3><?php if(get_field('pin_image')){ echo '<img src="' . get_field('pin_image') . '"/> &nbsp;';} ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  			</div>
  			<?php
				  $event_img = get_field('event_img');
				  if($event_img) {
				  ?>
  		    <figure class="small-12 medium-12 large-4 columns">
  				  <a href="<?php the_permalink(); ?>"><img src="<?php echo $event_img['sizes']['event-medium']; ?>"></a>
            <div class="upb_add_remove_links">
              <a href="#" rel="<?php echo $id; ?>" class="upb_add_bookmark upb_bookmark_control upb_bookmark_control_<?php echo $id; ?>">+</a>
            </div>
          </figure>
          <?php } //end if event_img ?>
          <div class="small-12 medium-12 large-8 columns padding">    		
    		  <div class="show-for-large-up">
    			  <h3><?php if(get_field('pin_image')){ echo '<img src="' . get_field('pin_image') . '"/> &nbsp;';} ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    			  <?php if($subtitle ){ ?>
    			    <h5 class="no-top no-bottom"><?php echo $subtitle; ?></h5>
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
  		<div style="display:none;" class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php the_field('pin_image'); ?>">
  	  		  <div class="wn-infoWindow">
    			  <img style="float:left; margin-right:5px;" src="<?php echo $event_img['sizes']['thumbnail']; ?>">
    			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
              <?php echo '<p><b>START TIME</b> ' . $startTime .'</p>'; ?>
  		  </div>
      </div>
    <?php } ?>
	</article>
  <?php
    } //end if ID - get rid of The Turning
  } // end white
  } else { 
    echo '<h2>Sorry there are no events that match your query</h2>';
    } // end if
    wp_reset_postdata(); ?>
</div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<?php get_footer(); ?>