<?php get_header(); the_post();?>

<!-- Row for main content area -->
	<div class="small-12 columns title-box" role="main">
  	<h1 class="entry-title centered-text no-bottom margin-top2"><?php the_title(); ?></h1>
  	<p class="no-bottom hide-for-medium-down"><a href="<?php site_url(); ?>/events/">Explore</a> / <a href="<?php site_url(); ?>/precincts/">Precincts</a></p>
	</div>
</div>
<div class="row main-content-section padding-top">
  <div class="small-12 columns">
    <?php the_content(); ?>
  </div>
  <div class="small-12 columns partners-section">
    <?php 
      $sections = get_field('section');
      foreach($sections as $section) { ?>
      <div class="row">
        <div class="small-12 columns">
        <h3><?php echo $section['section_title']; ?></h3>
          <?php $partners = $section['partners']; 
            foreach ($partners as $partner) { ?>
              <a href="<?php echo $partner['partner_link']; ?>" target="_blank">
                <img src="<?php echo $partner['partner_image']['sizes']['medium']; ?>">
              </a>
          <?php } // end foreach partner ?>
        </div>
      </div>
     <?php 
      } // end foreach section
     ?>
  </div>
<?php get_footer(); ?>






