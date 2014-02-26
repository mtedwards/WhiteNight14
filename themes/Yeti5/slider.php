<!--
<div style="display:none" id="featured" class="orbit-container">
	<ul data-orbit data-options="bullets:false; stack_on_small: false; timer_speed: 4000; resume_on_mouseout: true;">
		<?php $sliders = get_field('slider');
			if($sliders) {
				foreach($sliders as $slider){
		 ?>
		 			<li>
		 				<a onclick="_gaq.push(['_trackEvent', 'click', 'carousel', '<?php echo $slider['link']; ?>'])" href="<?php echo $slider['link']; ?>" <?php if($slider['new_page']) {?> target="_blank"<?php } ?>><img style="width:100%"; src="<?php echo $slider['image']['sizes']['large']; ?>"></a>
		 			</li>
		 <?php 
		 		} //end for each
		 	} else { ?>
		  <li>
		    <div class="row">
		      <div class="small-12 columns">
		        <div class="flex-video widescreen">
		                <?php 
		                  $vid = 'http://youtu.be/t2fx5bUhOgI'; 
		                  $vid = preg_replace('/\s+/', '', $vid);   
		                  $vid = wp_oembed_get($vid);
		                  echo $vid;
		                ?>
		        </div>
		      </div>
		    </div>
		  </li>
		 <?php } ?>
	</ul>
</div>
-->
<ul>
	<li>
		<img style="width:100%"; src="<?php bloginfo('template_url') ?>/img/thankyouWeb1.png">
	</li>
</ul>