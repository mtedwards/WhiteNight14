<?php get_header(); the_post();?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	  <div class="row featured-info">
	      <div class="centered-text date-text show-for-medium-down white-bg">
	        <h2>22 February 2014</h2>
	        <h3>7PM TO 7 AM</h3>
	      </div>
	    	<div class="small-12 large-8 columns">
          <?php include_once('slider.php'); ?>
        </div>
        <div class="small-12 large-4 columns">
          <?php include(locate_template('partials/sidebar-details.php')); ?>
        </div>
	  </div>

	  <div class="row">
  	  <div class="small-12 columns">
    	  <?php the_content(); ?>
  	  </div>
	  </div>
	</div><?php //end role main ?>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php get_footer(); ?>