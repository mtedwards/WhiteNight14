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
			  <?php if(is_user_logged_in()) { ?>
			    <p><?php echo upb_bookmark_controls(); ?></p>
        <?php } else { ?>
          <p><a id="logged-out-my-planner">Sign in to add to my planner.</a></p>
        <?php } ?>
        <h5>Genre:</h5>
        <?php 
          $term_list = wp_get_post_terms($post->ID, 'genre', array("fields" => "all"));
          foreach($term_list as $term) {
            echo '<a href="' . get_bloginfo('url') . '/genre/' . $term->slug . '">' . $term->name . '</a> ';
          }
         ?>

        
      </aside><!-- /#sidebar -->
    </div>
    <div class="row">
      <footer class="small-12 columns">
			</footer>
    </div>
			
			
			
			
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	
		
<?php get_footer(); ?>