<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-12 large-12 columns" role="main">
    <?php
      $args = array( 
        'post_type' => 'event',  
        'posts_per_page' => 200,
        'order' => 'ASC',
        'orderby' => 'title'
      );
    $the_query = new WP_Query( $args );
    
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <table>
        <thead>
          <tr>
            <th width="200">Sub Title</th>
            <th width="500"><?php the_field('sub_title'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Genre</td>
            <td><?php $genres = get_field('genre');
              foreach( $genres as $genre){
               echo $genre->name.', '; 
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>State Time</td>
            <td><?php the_field('start_time'); ?></td>
          </tr>
          <tr>
            <td>Duration</td>
            <td>
              <?php
                $duration = get_field('duration');
                if($duration == 720) {
                  echo 'All Night';
                } else {
                  echo $duration . ' mins';
                }
              ?>
             </td>
          </tr>
          <tr>
            <td>Single Session?</td>
            <td><?php if(get_field('single_session')){echo 'YES';} else {echo 'NO';} ?></td>
          </tr>
          <?php $time_details = get_field('all_night_details');
            if($time_details){ ?>
          <tr>
            <td>Time Details</td>
            <td><?php echo $time_details; ?></td>
          </tr>
          <?php } ?>
          <tr>
            <td>Precinct</td>
            <td><?php $precincts = get_field('precinct');
              foreach( $precincts as $precinct){
               echo $precinct->name; 
              }
              ?>
              </td>
          </tr>
          <?php if(get_field('existing_venue')){ ?>
            <tr>
              <td>Venue</td>
              <td><?php $venues = get_field('venue');
                foreach( $venues as $venue){
                 echo $venue->name; 
                }
                ?>
              </td>
            </tr>
          <?php } else { ?>
            <tr>
              <td>Venue</td>
              <td><?php the_field('venue_name'); ?></td>
            </tr>
            <tr>
              <td>Location</td>
              <td><?php $location = get_field('location'); echo $location['address']; ?></td>
            </tr>
            <tr>
              <td>Location Details</td>
              <td><?php the_field('location_details'); ?></td>
            </tr>
            <tr>
              <td>Accessibility</td>
              <td><?php $accessibilitys = get_field('accessibility');
                foreach( $accessibilitys as $accessibility){
                 echo $accessibility->name.','; 
                }
                ?>
              </td>
            </tr>
          <?php } ?>
          <?php if(get_field('paid_event')){?>
            <tr>
              <td>Paid Event</td>
              <td>YES</td>
            </tr>
            <tr>
              <td>Paid Event Text</td>
              <td><?php the_field('paid_event_text'); ?></td>
            </tr>
            <tr>
              <td>Booking Url</td>
              <td><?php the_field('paid_event_button_url'); ?></td>
            </tr>
          <?php } else { ?>
            <tr>
              <td>Paid Event</td>
              <td>NO</td>
            </tr>
          <?php } ?>
          <?php $artists = get_field('artist_details');
            if($artists){ ?>
              <tr>
                <td></td>
                <td>ARTIST DETAILS</td>
              </tr>
            <?php foreach($artists as $artist){ ?>
              <tr>
                <td><?php echo $artist['artist_name']; ?></td>
                <td><?php echo $artist['artist_bio']; ?></td>
              </tr>
            <?php } //end for each ?>
          <?php } //end if artists ?>
            <tr>
              <td>Age Restricted?</td>
              <td><?php if(get_field('age_restricted')){echo 'YES';} else {echo 'NO';} ?></td>
            </tr>
            <?php if(get_field('age_restriction_details')){ ?>
              <tr>
                <td>Age Restriction Details</td>
                <td><?php the_field('age_restriction_details');?>
                </td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    <?php 
    endwhile;
    endif;
    wp_reset_postdata();
    ?>
	</div>
<?php get_footer(); ?>