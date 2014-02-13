<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 columns title-box" role="main">
	  	<h1 class="entry-title centered-text margin-top2"><?php the_title(); ?></h1>
	  	<p class="no-bottom hide-for-medium-down"><a href="<?php site_url(); ?>/events/">Explore</a> / Eat<br><br></p>
	  	<p>White Night Melbourne is engaging the best food trucks in town to offer a delectable range of cuisines from multicultural dishes to sweet favourites. Participating cafes, restaurants and bars throughout all precincts will extend their trading hours for this special event with many options to feast on during your journey.</p>
	</div>
</div>
<div class="row main-content-section padding-top eat">
  <div class="small-12 columns">
   	
   	<?php //PRECINCT 1 
   		$slug = '01-northern-lights';
   	?>
   	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 1: NORTHERN LIGHTS</h1>
  	<article class="precinct_27">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php

		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : 
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>
  	
  	<?php //PRECINCT 2 
   		$slug = '02-lucky-dip';

   	?>
  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 2: Lucky Dip</h1>
  	<article class="precinct_26">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>
  	
  	<?php //PRECINCT 3 
   		$slug = '03-jrb';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 3: J + R&B</h1>
  	
  	<article class="precinct_25">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>
  	
  	
  	<?php //PRECINCT 4 
   		$slug = '04-shadows';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 4: SHADOWS</h1>
  	
  	<article class="precinct_24">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>
  	
  	  	<?php //PRECINCT 5 
   		$slug = '05-rags-to-riches';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 5: Rags to Riches</h1>
  	
  	<article class="precinct_23">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>

  	  	<?php //PRECINCT 6 
   		$slug = '06-wonderland';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 6: Wonderland</h1>
  	
  	<article class="precinct_22">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>
  
  	  	<?php //PRECINCT 7 
   		$slug = '07-the-vortex';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 7: The Vortex</h1>
  	
  	<article class="precinct_21">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>
  

<?php //PRECINCT 8 
   		$slug = '08-midden';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 8: Midden</h1>
  	
  	<article class="precinct_20">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>

  
  
	 <?php //PRECINCT 9 
   		$slug = '09-alex-and-the-engineer';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 9: Alex and the Engineer</h1>
  	
  	<article class="precinct_19">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>


	 <?php //PRECINCT 10 
   		$slug = '10-tattooed-city';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 10: Tattooed City</h1>
  	
  	<article class="precinct_18">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>  
  
	 <?php //PRECINCT 11 
   		$slug = '11-outer-limits';
   	?>

  	
  	<h1 id="<?php echo $slug; ?>" class="entry-title margin-top2">EAT IN PRECINT 11: Outer Limits</h1>
  	
  	<article class="precinct_31">
  		<div class="color-bar"></div>
  		<div class="inner">
		  	<?php
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '1', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) :
		  		$has_village = true;
			  	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	  
			  	  <h3><?php the_title(); ?></h3>
			  	  <?php if(get_field('description')) {
				  	  echo '<p><b>DESCRIPTION </b>' . get_field('description') . '</p>';
			  	  } ?>
			  	  <?php if(get_field('opening_hours')) {
				  	  echo '<p><b>OPENING HOURS</b> ' . get_field('opening_hours') . '</p>';
			  	  } ?>
			  	<?php 
			  	endwhile;
			else :
				$has_village = false;
		  	endif;
		  	wp_reset_postdata();
		  	
		  	$args = array(   
				'tax_query' => array(
					array(
			            'taxonomy' => 'precinct',
			            'field' => 'slug',
			            'terms' => $slug,    
			            'operator' => 'IN'                   
			          )
				), 	
		  	'post_type' => 'eat',
		  	'posts_per_page' => 99,
		   	'order' => 'DESC',
		   	'orderby' => 'title',
		  	
		  	'meta_key' => 'is_village',      
		  	'meta_value' => '0', 
		  	);
		  	$the_query = new WP_Query( $args );
		  	if ( $the_query->have_posts() ) : ?>
				<h3 class="margin-top2">Dining Options:</h3>
				<p>We are delighted to welcome the following restaurants and venues who have chosen to participate in White Night Melbourne 2014.  They will be extending their hours, subject to demand and supplies.</p><p><br></p>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	   <?php 
			  	  	  $location = get_field('location');
			  	  	  $alt_location = get_field('alternate_address');
			  	  ?>
			  	  <p><b class="uppercase"><?php the_title(); ?></b> <?php if($alt_location){ echo $alt_location; } else { echo str_replace('Victoria, Australia', '', $location[address]); } ?>. <?php the_field('phone'); ?></p>
			  	  
			  	<?php 
			  	endwhile;
		  	endif;
		  	wp_reset_postdata();
		  	?>
	  	</div>
	 </article>

  	
  	
  </div>
</div>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php get_footer(); ?>





