<!-- <ul data-orbit data-options="bullets:false; stack_on_small: false;"> -->
<ul>
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
</ul>