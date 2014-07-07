<?php get_header(); ?>
<!-- Row for main content area -->
	<div class="small-12 medium-8 large-8 columns" role="main">
  	<?php while (have_posts()) : the_post(); ?>
  		<article <?php post_class('padding-top') ?> id="post-<?php the_ID(); ?>">
  				<h1 class="entry-title h2"><?php the_title(); ?></h1>
  			<div class="entry-content">
  				<?php
            $entries = GFAPI::get_entries('3');
            echo '<pre>';
              print_r($entries[0]);
            echo '</pre>';
          ?>
          <table>
              <tr>
                <th>
                  Title
                </th>  
              </tr>
            <?php foreach($entries as $entry){ ?>
              <tr>
                <td>
                  <a href="<?php echo get_bloginfo('url') . '/submission/?id=' . $entry['id'];  ?>"><?php echo $entry[1]; ?></a>
                </td>
                <td>
                  <?php echo $entry[10]; ?>
                  <img src="<?php echo $entry[10]; ?>" alt="" />
                </td>
              </tr>
            <?php } ?>
          </table>
          
  			</div>
  		</article>
  	<?php endwhile; // End the loop ?>
	</div>
  <div class="small-12 medium-4 large-4 columns is-single-page featured-info">
      <?php include(locate_template('partials/sidebar-details.php')); ?>
	 <?php include(locate_template('partials/promo-boxes.php')); ?>  
</div>
		
<?php get_footer(); ?>