<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
  	<h1 class="entry-title"><?php the_title(); ?></h1>
  	<div class="row">
    	<div class="small-12 columns">
      	<div class="acf-map" id="full-map"></div>
    	</div>
  	</div>	
	</div>
</div>
<div class="row main-content-blue">
  <div class="small-12 columns">
  <h3>Filter</h3>
	<?php 
	  $cur_precinct = $_GET['precinct'];
  	$cur_genre = $_GET['genre'];
  	$cur_accessibility = $_GET['accessibility'];
	?>
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
        <button type="submit" class="button small expand">FILTER</button>
      </div>
    </div>
  </form>
	</div>
</div>
<div class="row main-content-section padding-top">
  <div class="small-12 columns">
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
  if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <article <?php post_class('list') ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content row">
			<div class="small-12 medium-4 large-4 columns">
  			<?php 
				  $event_img = get_field('event_img');
				  $terms = get_the_terms( $post->ID, 'on-draught' );
				  if($event_img) { 
				  ?>
  		    <figure>
  				  <img src="<?php echo $event_img['sizes']['event-medium']; ?>">
          </figure>
          <?php } //end if event_img ?>
			</div>
			<div class="small-12 medium-8 large-8 columns">
  			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  			<h4 class="subheader"><?php the_field('sub_title'); ?></h3>
				<?php the_content(); ?>
				<p><br></p>
				<?php $startTime = get_field('start_time');
				  if($startTime) {
  				  echo '<p><b>START TIME</b> ' . $startTime .'</p>';
            $time = strtotime($startTime);
  				  $duration = get_field('duration');
  				  
  				  if($duration == '720') {
    				  echo '<p>' . get_field('all_night_details') . '</p>';
  				  } else {
    				  $duration = $duration . 'minutes';
    				  $endTime = date("g:i a ", strtotime($duration, $time));
    				  echo '<p><b>END TIME</b> ' . $endTime .'</p>';
  				  }// end if all night
				  } //end if startTime
				 ?>
			</div>
		</div>
		 <?php if(get_field('existing_venue')) {
  			  $venue = get_field('venue');
  			  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
			  } else {
  			  $location = get_field('location');
			  } ?>
  			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
  			  <div class="wn-infoWindow">
      			  <img style="float:left; margin-right:5px;" src="<?php echo $event_img['sizes']['thumbnail']; ?>">
      			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                <?php echo '<p><b>START TIME</b> ' . $startTime .'</p>'; ?>
  			  </div>
        </div>
		</article>
  <?php
  endwhile;
  else: ?>
    <h2>Sorry there are no events that match your query</h2>
  <? 
    endif;
    
    // Reset Post Data
    wp_reset_postdata();
  
  ?>

	</div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<?php get_footer(); ?>






