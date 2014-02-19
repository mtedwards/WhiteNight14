<div class="row event-details">
  <div class="small-12 medium-6 large-12 columns">
    <div class="upb_add_remove_links">
      <?php $id = get_the_ID(); ?>
      <a href="#" rel="<?php echo $id; ?>" class="upb_add_bookmark upb_bookmark_control upb_bookmark_control_<?php echo $id; ?>">+Add to My Night</a>
    </div>
    <div class="row">
      <div class="small-12 columns share hide-for-medium-down">
        <h3>SHARE:</h3><div class="fb-like" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
          <div class="row">
              <div class="small-6 columns"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a></div>
              <div class="small-6 columns"></div>
                <div class="g-plus" data-action="share" data-annotation="none"></div>
            </div>
      </div>
    </div>
    <h3>Event Details</h3>
    <p>
      <b>START TIME </b><?php echo $startTime; ?><br>
      <?php echo $durationMsg; ?><br>
      <b>PRECINCT </b><a href="<?php bloginfo('url'); ?>/precinct/<?php echo $precinctSlug; ?>"><?php echo $precinctName ?></a><br>
      <?php echo $accessList; ?><br>
      <?php if(get_field('paid_event')){ ?>
        <?php echo $price; ?>
        <a onclick="_gaq.push(['_trackEvent', 'click', 'book now', '<?php the_title(); ?>'])" href="<?php echo $ticketLink ?>" class="button expand" target="_blank">BOOK NOW</a>
      <?php }//end if paid event ?>
      <?php echo $genreList ?>
    </p>
  </div>
  <div class="small-12 medium-6 large-12 columns">
    <p>
      <?php if(get_field('age_restriction_details')){ echo '<b>' . get_field('age_restriction_details') . '</b>'; } ?>
      <b>LOCATION</b> <?php echo $venueName; ?><br><br>
      <?php if(get_field('location_details')){ the_field('location_details'); echo '<br><br>'; } ?>
    <?php if($venueName == 'To Be Announced' || !$location['lat']) { 
       echo '</p>';
       } else {
    ?>
        <b>STREET ADDRESS</b> <?php echo $location['address']; ?>
    </p>
    <div class="single marker" style="display:none;" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
      <div class="wn-infoWindow">
    		  	<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
            <?php echo '<p><b>START TIME</b> ' . $startTime .'</p>'; ?>
      </div>
    </div>
    <div class="acf-map" id="single-map"></div>
    <?php } ?>
  </div>
</div>