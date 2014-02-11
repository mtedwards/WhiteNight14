<?php get_header(); ?>
<!-- Row for main content area -->
	<div class="small-12 medium-8 large-8 columns" role="main">
  	<?php while (have_posts()) : the_post(); ?>
  		<article <?php post_class('padding-top') ?> id="post-<?php the_ID(); ?>">
  				<h1 class="entry-title h2"><?php the_title(); ?></h1>
  			<div class="entry-content">
  				<?php the_content(); ?>
  			</div>
  		</article>
  	<?php endwhile; // End the loop ?>
	</div>
  <div class="small-12 medium-4 large-4 columns is-single-page featured-info">
      <?php include(locate_template('partials/sidebar-details.php')); ?>
  </div>
		
<?php get_footer(); ?>