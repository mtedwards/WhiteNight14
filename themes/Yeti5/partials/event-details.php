<div class="row event-details">
  <div class="small-12 medium-6 large-12 columns">
    <?php if ( is_user_logged_in() ) { 
      echo upb_bookmark_controls();
    } else {
      echo '<a href="#" class="upb_bookmark_control" id="#myNightLoggedOut">+Add to My Night**</a>';  
    }?>    
    <h3>Event Details</h3>
    <p>
      <b>START TIME </b><?php echo $startTime; ?><br>
      <?php echo $durationMsg; ?><br>
      <b>PRECINCT </b><a href="<?php bloginfo('url'); ?>/precinct/<?php echo $precinctSlug; ?>"><?php echo $precinctName ?></a><br>
      <?php echo $accessList; ?><br>
      <?php if(get_field('paid_event')){ ?>
        <?php echo $price; ?>
        <a href="<?php echo $ticketLink ?>" class="button expand" target="_blank">BOOK NOW</a>
      <?php }//end if paid event ?>
      <?php echo $genreList ?>
    </p>
  </div>
  <div class="small-12 medium-6 large-12 columns">
    <p>
      <b>VENUE</b> <?php echo $venueName; ?><br>
      <b>STREET ADDRESS</b> <?php echo $location['address']; ?>
    </p>
    <div class="single marker" style="display:none;" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
      <div class="wn-infoWindow">
    		  <img style="float:left; margin-right:5px;" src="<?php echo $event_img['sizes']['thumbnail']; ?>">
    		  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
            <?php echo '<p><b>START TIME</b> ' . $startTime .'</p>'; ?>
      </div>
    </div>
    <div class="acf-map" id="single-map"></div>
  </div>
</div>