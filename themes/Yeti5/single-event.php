<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		  <div class="row">
  		  <div class="small-12 columns centered-text title-box">
    		   <h1 class="entry-title"><?php the_title(); ?></h1>
           <h3 class="subheader"><?php the_field('sub_title'); ?></h3>
  		  </div>
		  </div>
      <div class="row">
        <div class="small-12 medium-12 large-8 columns">
        <div class="show-for-medium-down">
            <?php get_template_part( 'event', 'details' ); ?>
          </div>
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
            <?php } ?>
        </div>
        <div class="small-12 medium-12 large-4 columns">
          <div class="show-for-large-up">
            <?php get_template_part( 'event', 'details' ); ?>
          </div>
        </div>
      </div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>

		
<?php get_footer(); ?>