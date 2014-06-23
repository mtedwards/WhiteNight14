<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-8 large-8 columns" role="main">
    <h1 class="entry-title h2"><?php printf( __( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article <?php post_class('padding-top') ?> id="post-<?php the_ID(); ?>">
  				<h3 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
  				
  			<div class="entry-content">
  				<?php 
    				$event_img = get_field('event_img');
            $event_thumb = $event_img['sizes']['thumbnail'];
            if($event_img){
              echo '<img class="alignleft" src="' . $event_thumb . '">';
            }
  				?>
  				<?php if(get_field('sub_title')){
    				echo '<h5>' . get_field('sub_title') . '</h5>';
  				} ?>
  				
  				<?php the_excerpt(); ?>
  			</div>
  			<hr>
  		</article>

			<?php endwhile; ?>
      
    <?php else : ?>
    <h3>Sorry... We didn't find anything<br>Try another search?</h3>  
      <div class="row">
        <div class="small-12 medium-8  large-6  columns">
          <?php get_search_form(); ?>
        </div>
      </div>
		<?php endif; ?>
    	
	</div>

  <div class="small-12 medium-4 large-4 columns is-single-page featured-info">
      <?php include(locate_template('partials/sidebar-details.php')); ?>
      <div class="centered-text white-bg button-box color-buttons">
	<?php $sidebar_links = get_field('sidebar_links','options');
		if($sidebar_links) {
			foreach($sidebar_links as $sidebar_link){
	 ?>
	 	<a onclick="_gaq.push(['_trackEvent', 'click', 'sidebar - ', '<?php echo $sidebar_link['link']; ?>'])" href="<?php echo $sidebar_link['link']; ?>" <?php if($sidebar_link['new_page']) {?> target="_blank"<?php } ?>><img src="<?php echo $sidebar_link['image']['url']; ?>"></a>
	 <?php 
	 		} //end for each 
	 	} //end if 
	 ?>
</div>
  </div>
		
<?php get_footer(); ?>