<article class="<?php echo $precinctClass; ?>">
  <div class="color-bar"></div>
      <a class="box-open" href="#" onclick="_gaq.push(['_trackEvent', 'click', 'precinct', 'expand'])">
        <div class="precinctTitle">
          <h3><?php echo $name ?></h3>
        </div>
        <img src="<?php echo $image['sizes']['event-small']; ?>">
        <div class="locationDescription">
          <p><?php echo $description; ?></p>
        </div>
  		</a> 
  		<div class="precinct-content">
  		  <div class="row">
  		  	<div class="large-6 columns">
  		  	  <?php if($mapImage) { ?>
    		  	  <img src="<?php echo $mapImage['sizes']['event-small']; ?>">
  		  	  <?php } else { ?>
  		  		  <img src="<?php bloginfo('template_url'); ?>/img/precinct-map-holder.gif">
  		  		<?php } ?>
  		  	</div> 
  		  	<div class="small-12 medium-12 large-6 columns <?php echo 'markers-' . $precinctID; ?>">
              <?php
              $args = array( 
                  'post_type' => 'event',                         
                  'posts_per_page' => -1,                
                  'order' => 'ASC',
                  'orderby' => 'title',
                  'precinct' => $slug
                  );
              
              $the_query = new WP_Query( $args );
              
              // The Loop
              if ( $the_query->have_posts() ) : ?>
              <ul>
              <?php
                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      			 <?php endwhile; ?>
              </ul>
             <?php endif;
              
                // Reset Post Data
                wp_reset_postdata();
              
              ?>
              <a class="button black small" href="<?php bloginfo('url'); ?>/precinct/<?php echo $precinct->slug ?>">MORE ></a>
          </div>
  		  	</div> 
  		</div>
</article>