<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-12 large-12 columns" role="main">
  		<article <?php post_class('padding-top') ?> id="post-<?php the_ID(); ?>">
  				<h1 class="entry-title h2"><?php the_title(); ?></h1>
  			<div class="entry-content">
  				<div class="row">
          	<div class="small-12 columns">
            	<div class="my-map"></div>
            	<div class="filters">
              	<input id="addMarkers" class="filterClick" type="checkbox" checked="checked">
              	<label for="addMarkers">Events</label>
                <input id="addMarkers2" class="filterClick" type="checkbox"> 
                <label for="addMarkers2">EAT</label>
                <input id="addMarkers3" class="filterClick" type="checkbox"> 
                <label for="addMarkers3">Getting Around</label>
                <input id="addMarkers4" class="filterClick" type="checkbox"> 
                <label for="addMarkers4">Amenities</label>
            	</div>   
          	</div>
        	</div>	


	
	
          	<?php
          	$args = array( 
                'post_type' => 'event',  
                'posts_per_page' => -1,                
                'order' => 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                  array(
                      'taxonomy' => 'precinct',
                      'field' => 'slug',
                      'terms' => '03-jrb',    
                      'operator' => 'IN'                   
                    )
                )
              );
          	
          	$the_query = new WP_Query( $args );
          	
          	// The Loop
          	if ( $the_query->have_posts() ) : ?>
          	
          	<?php
          	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          	  <?php 
          	    if(get_field('existing_venue')) {
            			  $venue = get_field('venue');
            			  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
          			  } else {
            			  $location = get_field('location');
          			  } ?>
          			  
          	  <div style="display:none" class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          		  <div class="wn-infoWindow">
            			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
          		  </div>
              </div>
          	<?php endwhile; ?>
          	<?php endif;
          	
          	// Reset Post Data
          	wp_reset_postdata();
          	
          	?>
          	
          	
          	<?php
          	$args = array( 
                'post_type' => 'eat',  
                'posts_per_page' => -1,                
                'order' => 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                  array(
                      'taxonomy' => 'precinct',
                      'field' => 'slug',
                      'terms' => '08-midden',    
                      'operator' => 'IN'                   
                    )
                )
              );
          	
          	$the_query = new WP_Query( $args );
          	
          	// The Loop
          	if ( $the_query->have_posts() ) : ?>
          	
          	<?php
          	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          	  <?php 
          	    if(get_field('existing_venue')) {
            			  $venue = get_field('venue');
            			  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
          			  } else {
            			  $location = get_field('location');
          			  } ?>
          			  
          	  <div style="display:none" class="marker2" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          		  <div class="wn-infoWindow">
            			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
          		  </div>
              </div>
          	<?php endwhile; ?>
          	<?php endif;
          	
          	// Reset Post Data
          	wp_reset_postdata();
          	
          	?>
          	
          	
          	<?php
          	$args = array( 
                'post_type' => 'event',  
                'posts_per_page' => -1,                
                'order' => 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                  array(
                      'taxonomy' => 'precinct',
                      'field' => 'slug',
                      'terms' => '04-shadows',    
                      'operator' => 'IN'                   
                    )
                )
              );
          	
          	$the_query = new WP_Query( $args );
          	
          	// The Loop
          	if ( $the_query->have_posts() ) : ?>
          	
          	<?php
          	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          	  <?php 
          	    if(get_field('existing_venue')) {
            			  $venue = get_field('venue');
            			  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
          			  } else {
            			  $location = get_field('location');
          			  } ?>
          			  
          	  <div style="display:none" class="marker3" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          		  <div class="wn-infoWindow">
            			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
          		  </div>
              </div>
          	<?php endwhile; ?>
          	<?php endif;
          	
          	// Reset Post Data
          	wp_reset_postdata();
          	
          	?>
          	
          	
          	<?php
          	$args = array( 
                'post_type' => 'event',  
                'posts_per_page' => -1,                
                'order' => 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                  array(
                      'taxonomy' => 'precinct',
                      'field' => 'slug',
                      'terms' => '01-northern-lights',    
                      'operator' => 'IN'                   
                    )
                )
              );
          	
          	$the_query = new WP_Query( $args );
          	
          	// The Loop
          	if ( $the_query->have_posts() ) : ?>
          	
          	<?php
          	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          	  <?php 
          	    if(get_field('existing_venue')) {
            			  $venue = get_field('venue');
            			  $location = get_field('location', 'venue_' . $venue[0]->term_id ); 
          			  } else {
            			  $location = get_field('location');
          			  } ?>
          			  
          	  <div style="display:none" class="marker4" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          		  <div class="wn-infoWindow">
            			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
          		  </div>
              </div>
          	<?php endwhile; ?>
          	<?php endif;
          	
          	// Reset Post Data
          	wp_reset_postdata();
          	
          	?>
          	
          	
          	
          	
	  			</div>
  		</article>
	</div>
 <style type="text/css">
 
.my-map {
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
    */
     
    function render_map( $el, myMarker, myMarker2 ) {
      
    	// var
    	var $markers = $(myMarker);
      var $markers2 = $(myMarker2);
      var $markers3 = $('.marker3');
      var $markers4 = $('.marker4');
      
    	// vars
    	var args = {
    		zoom		: 14,
    		center		:  new google.maps.LatLng(-37.81, 144.96),
    		mapTypeId	:  google.maps.MapTypeId.ROADMAP
    	};
     
    	// create map	        	
    	var map = new google.maps.Map( $el[0], args);
      
    	// add a markers reference
    	map.markers = [];
      
      $markers.hide();
      $markers2.hide();
      $markers3.hide();
      $markers4.hide();
      
      window.markers1 = $markers;
      window.markers2 = $markers2;
      window.markers3 = $markers3;
      window.markers4 = $markers4;
      window.map = map;
      mapCenter = args.center;

    	// center map
    	center_map( map );
    	
    	make_Markers();
     
    }
    


     /*
      $('#addMarkers').on( "click", function() {
                markers1.each(function(){
              	  add_marker( $(this), map );
                });
                center_map( map );
            });
            
            $('#addMarkers2').on( "click", function() {
                markers2.each(function(){
              	  add_marker( $(this), map );
                });
                center_map( map );
            });
      */
  
      function make_Markers() {
        if ($('#addMarkers').is(':checked')) {
              markers1.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers2').is(':checked')) {
            markers2.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers3').is(':checked')) {
              markers3.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers4').is(':checked')) {
            markers4.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers').is(':checked')||$('#addMarkers2').is(':checked')||$('#addMarkers3').is(':checked')||$('#addMarkers4').is(':checked')) {
            center_map( map );
          } else {
            map.setCenter(mapCenter);
          }
      }

      
      $('.entry-content').on( "click", ".filterClick", function() {
          
          $('.my-map').replaceWith('<div class=\"my-map\"></div>');
          
          $('.my-map').each(function(){
            render_map($(this),'.marker','.marker2');
          });
          
         // make_Markers();
      });
       
    /*
    *  add_marker
    */
     
    function add_marker( $marker, map ) {
     
    	// var
    	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    	
    	var inconImage = 'https://maps.google.com/mapfiles/kml/shapes/schools_maps.png';
     
    	// create marker
    	var marker = new google.maps.Marker({
    		position	: latlng,
    		map			  : map,
    		icon     : inconImage
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
    */
     
    function center_map( map ) {    
    	// vars
    	var bounds = new google.maps.LatLngBounds();
    	// loop through all markers and create bounds
    	$.each( map.markers, function( i, marker ){
    		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
  
    		bounds.extend( latlng );
     
    	});
      
      console.log(map.markers.length);
    	// only 1 marker?
    	if( map.markers.length <= 2 )
    	{
    		// set center of map
    	    map.setCenter( bounds.getCenter() );
    	    map.setZoom( 14 );
    	}
    	else
    	{
    		// fit to bounds
    		map.fitBounds( bounds );
    	}
     
    }
    
  

  	$('.my-map').each(function(){
  		render_map($(this),'.marker','.marker2');
  	});
  
  
	
})(jQuery)
</script>  
<?php get_footer(); ?>