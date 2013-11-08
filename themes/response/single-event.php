<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		  <?php $address = get_field('address'); ?>
		<div class="row">
			<header class="small-12 columns">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<h3 class="subheader"><?php the_field('sub_title'); ?></h3>
				<?php if(get_field('all_night')) {
  				echo '<b>7pm - 7am</b> This is an all night event.';
				} else {
				  $start = get_field('start_time');
				  $time = strtotime($start);
				  $duration = get_field('duration');
				  $duration = $duration . 'minutes';
				  $end = date("g:i a ", strtotime($duration, $time));
  				echo '<b>Start:</b> ' . $start . '<br>';
  				echo '<b>End:</b> ' .  $end . '<br>';
				}?>	
			</header>
		</div>
		<div class="row">
			<div class="entry-content small-12 medium-8 large-8 columns">
				<?php 
				  $event_img = get_field('event_img');
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
				  <?php }
            
            the_content(); 
            
            $video = get_field('video_url'); if($video){
            echo wp_oembed_get($video); }
          ?>
			</div>
			<aside id="sidebar" class="small-12 medium-4 large-4 columns">
			  <p><?php echo upb_bookmark_controls(); ?></p>
			    <style>
              #map-canvas {
                height: 100%;
                height: 0;
                margin: 0 0 10px 0;
                padding: 0 0 66% 0;
              }
            </style>

			
			  <b><?php the_field('precinct'); ?></b><br>
				<?php 
 
            $location = get_field('location');
             
            if( !empty($location) ):
            ?>
            <?php the_field('venue'); echo ', ' . $location[address]; ?>.<hr>
            <div class="acf-map">
            	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
              	  <h4><?php the_title(); ?></h4>
                  <p class="address"><?php echo $location['address']; ?></p>
                  <p><a href="<?php the_permalink(); ?>">Learn More</a> </p>
              	
            	</div>
            </div>
            <?php endif; ?>
				<hr>
			
    	  <?php the_tags('<b>Tags:</b> <span class="radius secondary label">','</span> <span class="radius secondary label">','</span><hr>'); ?>
    				
    		<?php $terms = wp_get_post_terms($post->ID, 'genre' );
              $count = count($terms);
                 if ( $count > 0 ){
                     echo "<b>Genre:</b> ";
                     foreach ( $terms as $term ) {
                       echo "<span class='radius secondary label'><a href='" . get_bloginfo('url') . "/genre/" . $term->slug . "'>" . $term->name . "</a></span> ";
                        
                     }
                     echo "<hr>";
                 } ?>
                 
        <?php $accessabilities = wp_get_post_terms($post->ID, 'accessability' );
              $count = count($accessabilities);
                 if ( $count > 0 ){
                     echo "<b>Accessability:</b> ";
                     foreach ( $accessabilities as $access ) {
                       echo "<span class='radius secondary label'><a href='" . get_bloginfo('url') . "/accessability/" . $access->slug . "'>" . $access->name . "</a></span> ";
                        
                     }
                     echo "<hr>";
                 } ?>
    
    	
    	  <?php  
    	    $artist_name = get_field('artist_name');
    	    $artist_bio = get_field('artist_bio');
    	    $creative_credit = get_field('creative_credit');
    	    $presented_by = get_field('presented_by');
    	    if($artist_name || $artist_bio || $creative_credit || $presented_by ) {?>
      	    <h4>Artist Details:</h4>
    	    <?php }
          if($artist_name) {
            echo '<p><b>Artist Name:</b><br>' . $artist_name . '</p>';
          }
          if($artist_bio) {
            echo '<b>Artist Bio:</b><br>' . $artist_bio;
          }
          if($creative_credit) {
            echo '<p><b>Creative Credit:</b><br>' . $creative_credit . '</p>';
          }
          if($presented_by) {
            echo '<p><b>Presented by:</b><br>' . $presented_by . '</p>';
          }
    	   
    	   ?>
          
        
      </aside><!-- /#sidebar -->
    </div>
    <div class="row">
      <footer class="small-12 columns">
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			</footer>
    </div>
			
			
			
			
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php //get_sidebar(); ?>
			
  <style type="text/css">
       
      .acf-map {
      	width: 100%;
      	height: 400px;
      	border: #ccc solid 1px;
      	margin: 20px 0;
      }
       
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
    (function($) {
     
    /*
    *  render_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$el (jQuery element)
    *  @return	n/a
    */
     
    function render_map( $el ) {
     
    	// var
    	var $markers = $el.find('.marker');
     
    	// vars
    	var args = {
    		zoom		: 16,
    		center		: new google.maps.LatLng(0, 0),
    		mapTypeId	: google.maps.MapTypeId.ROADMAP
    	};
     
    	// create map	        	
    	var map = new google.maps.Map( $el[0], args);
     
    	// add a markers reference
    	map.markers = [];
     
    	// add markers
    	$markers.each(function(){
     
        	add_marker( $(this), map );
     
    	});
     
    	// center map
    	center_map( map );
     
    }
     
    /*
    *  add_marker
    *
    *  This function will add a marker to the selected Google Map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$marker (jQuery element)
    *  @param	map (Google Map object)
    *  @return	n/a
    */
     
    function add_marker( $marker, map ) {
     
    	// var
    	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
     
    	// create marker
    	var marker = new google.maps.Marker({
    		position	: latlng,
    		map			: map
    	});
     
    	// add to array
    	map.markers.push( marker );
     
    	// if marker contains HTML, add it to an infoWindow
    	if( $marker.html() )
    	{
    		// create info window
    		var infowindow = new google.maps.InfoWindow({
    			content		: $marker.html()
    		});
     
    		// show info window when marker is clicked
    		google.maps.event.addListener(marker, 'click', function() {
     
    			infowindow.open( map, marker );
     
    		});
    	}
     
    }
     
    /*
    *  center_map
    *
    *  This function will center the map, showing all markers attached to this map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	map (Google Map object)
    *  @return	n/a
    */
     
    function center_map( map ) {
     
    	// vars
    	var bounds = new google.maps.LatLngBounds();
     
    	// loop through all markers and create bounds
    	$.each( map.markers, function( i, marker ){
     
    		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
     
    		bounds.extend( latlng );
     
    	});
     
    	// only 1 marker?
    	if( map.markers.length == 1 )
    	{
    		// set center of map
    	    map.setCenter( bounds.getCenter() );
    	    map.setZoom( 16 );
    	}
    	else
    	{
    		// fit to bounds
    		map.fitBounds( bounds );
    	}
     
    }
     
    /*
    *  document ready
    *
    *  This function will render each map when the document is ready (page has loaded)
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	5.0.0
    *
    *  @param	n/a
    *  @return	n/a
    */
     
    $(document).ready(function(){
     
    	$('.acf-map').each(function(){
     
    		render_map( $(this) );
     
    	});
     
    });
     
    })(jQuery);
</script>	
	
		
<?php get_footer(); ?>