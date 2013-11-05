<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-8 large-8 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		  <?php $address = get_field('address'); ?>
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<h3 class="subheader"><?php the_field('sub_title'); ?></h3>
				<b><?php the_field('precinct'); ?></b><br>
				<?php the_field('venue'); echo ', ' . $address[address]; ?>.
			</header>
			<div class="entry-content">
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
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			</footer>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>