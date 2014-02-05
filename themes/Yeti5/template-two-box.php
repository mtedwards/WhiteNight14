<?php
/*
  Template Name: Two Box
*/
 get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-8 large-8 columns" role="main">
  	<?php while (have_posts()) : the_post(); ?>
  		<article <?php post_class('padding-top') ?> id="post-<?php the_ID(); ?>">
  				<h1 class="entry-title h2"><?php the_title(); ?></h1>
  			<div class="entry-content">
  			  <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail('large', array('class' => 'alignleft'));
            }
            
            the_content(); ?>
            <div class="row two-boxes">
              <div class="small-12 medium-6 large-6 columns">
                <div class="box">
                  <div class="padme">
                    <h3><?php the_field('title_left'); ?></h3>  
                  </div>
                  <?php 
                    $left_image = get_field('image_left');
                    $link = get_field('button_url_left');
                   ?>
                   <a href="<?php echo $link ?>" target="_blank">
                     <img src="<?php echo $left_image['url']; ?>">
                   </a>
                   <div class="padme">
                     <?php the_field('text_left'); ?>
                     <a href="<?php echo $link ?>" target="_blank" class="button blue expand"><?php the_field('button_text_left'); ?></a>
                   </div>
                </div>
              </div>
              <div class="small-12 medium-6 large-6 columns">
                <div class="box">
                  <div class="padme">
                    <h3><?php the_field('title_right'); ?></h3>
                  </div>
                    <?php 
                    $right_image = get_field('image_right');
                    $right_link = get_field('button_url_right');
                   ?>
                   <a href="<?php echo $right_link ?>" target="_blank">
                     <img src="<?php echo $right_image['url']; ?>">
                   </a>
                   <div class="padme">
                     <?php the_field('text_right'); ?>
                     <a href="<?php echo $right_link ?>" target="_blank" class="button blue expand"><?php the_field('button_text_right'); ?></a>   
                   </div> 
                </div>            
              </div>
            </div>
            <div class="row">
              <div class="small-12 columns">
                <small><?php the_field('fine_print_text'); ?></small>
                <br><br>
              </div>
            </div>
  			</div>
  		</article>
  	<?php endwhile; // End the loop ?>
	</div>
  <div class="small-12 medium-4 large-4 columns is-single-page featured-info">
      <?php include(locate_template('partials/sidebar-details.php')); ?>
  </div>
		
<?php get_footer(); ?> 