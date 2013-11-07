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
				<?php the_field('venue'); echo ', ' . $address[address]; ?>.<hr>
				<div id="map-canvas"></div>
				<hr>
			
    	  <?php the_tags('<b>Tags:</b> <span class="radius secondary label">','</span> <span class="radius secondary label">','</span><hr>'); ?>
    				
    		<?php $terms = get_terms( 'genre' );
              $count = count($terms);
                 if ( $count > 0 ){
                     echo "<b>Genre:</b> ";
                     foreach ( $terms as $term ) {
                       echo "<span class='radius secondary label'><a href='" . get_bloginfo('url') . "/genre/" . $term->slug . "'>" . $term->name . "</a></span> ";
                        
                     }
                     echo "<hr>";
                 } ?>
                 
        <?php $accessabilities = get_terms( 'accessability' );
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
			
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script>
    // This example displays a marker at the center of Australia.
    // When the user clicks the marker, an info window opens.
    
    function initialize() {
      var myLatlng = new google.maps.LatLng(<?php echo $address[coordinates]; ?>);
      var mapOptions = {
        zoom: 12,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
    
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    
      var contentString = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h4 id="firstHeading" class="firstHeading"><?php the_title(); ?></h4>'+
          '<div id="bodyContent">'+
          '<p></p>' +
          '</div>'+
          '</div>';
    
      var infowindow = new google.maps.InfoWindow({
          content: contentString
      });
    
      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: '<?php the_title(); ?>'
      });
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
      });
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);

  </script>		
	
		
<?php get_footer(); ?>