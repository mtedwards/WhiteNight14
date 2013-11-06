<?php
get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
  
  <?php
  $args = array( 
      'post_type' => 'event',  
      );
  
  $the_query = new WP_Query( $args );
   
   if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
			</header>
			<div class="entry-content">
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>">View Event</a>
			</div>
		</article>
	<?php   
  endwhile;
  endif;
  
  // Reset Post Data
  wp_reset_postdata();
  
  ?> 

	</div>
		<br><br>
<?php get_footer(); ?>