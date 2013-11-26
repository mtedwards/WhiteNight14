<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
		</article>
	<?php endwhile; // End the loop ?>

	</div>

		
<?php get_footer(); ?>