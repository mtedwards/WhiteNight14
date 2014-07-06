<?php get_header(); the_post();?>

<!-- Row for main content area -->
	<div class="small-12 columns" role="main">
	  <div class="row featured-info">
	      <div class="centered-text date-text show-for-small-only white-bg">
	        <h2>22 February 2014</h2>
	        <h3>7PM TO 7 AM</h3>
	      </div>
	    	<div class="small-12 medium-8 large-8 columns">
          <?php include_once('slider.php'); ?>
        </div>
        <div class="small-12 medium-4 large-4 columns">
          <?php include(locate_template('partials/sidebar-details.php')); ?>
        </div>
	  </div>

	  <div class="row">
	    <div class="small-12 columns">
	      <div class="row">
	        <div class="small-12 columns">
	          <p>&nbsp;</p>
	        </div>
	      </div>
  	    <div class="row">
    	    <div class="small-12 medium-6 large-6 columns">
        	  <?php the_content(); ?>
      	  </div>
      	  <div class="small-12 medium-6 large-6 columns">
      	    <p><b>Sign-up now to find out more as the 2015 programme is released:</b></p>
        	  <form action="">
          	  <div>
            	  <label for="email">Email</label>
            	  <input type="email" name="email" />
          	  </div>
          	  <div>
          	    <label for="firstName">First Name</label>
          	    <input type="text" name="firstName" />
          	  </div>
          	  <div>
          	    <label for="lastName">Last Name</label>
          	    <input type="text" name="lastName" />
          	   </div>
          	   <div>
            	   <label for="state">State</label>
            	   <select name="state" id="">
              	   <option value="act">ACT</option>
              	   <option value="nsw">NSW</option>
              	   <option value="nt">NT</option>
              	   <option value="qld">QLD</option>
              	   <option value="sa">SA</option>
              	   <option value="tas">TAS</option>
              	   <option value="vic">VIC</option>
              	   <option value="wa">WA</option>
            	   </select>
          	   </div>
          	   <input class="expand button blue" type="submit" value="Sign Up"/>
        	  </form>
      	  </div>
  	    </div>
	    </div>
  	  <div class="row">
	        <div class="small-12 columns">
	          <p>&nbsp;</p>
	        </div>
	      </div>
	  </div>
	</div><?php //end role main ?>
<?php get_footer(); ?>