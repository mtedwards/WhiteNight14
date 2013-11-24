<ul data-orbit data-options="bullets:false; stack_on_small: false;">
  <li>
    <div class="row">
      <div class="small-12 columns">
        <div class="flex-video widescreen">
                <?php 
                  $vid = 'http://youtu.be/cW_o5GSg9Ig'; 
                  $vid = preg_replace('/\s+/', '', $vid);   
                  $vid = wp_oembed_get($vid);
                  echo $vid;
                ?>
        </div>
      </div>
    </div>
  </li>
  <li>
    <div class="row">
      <div class="small-12 columns">
        <div class="flex-video widescreen">
                <?php 
                  $vid = 'http://youtu.be/B1Lj93zI_Do'; 
                  $vid = preg_replace('/\s+/', '', $vid);   
                  $vid = wp_oembed_get($vid);
                  echo $vid;
                ?>
        </div>
      </div>
    </div>
  </li>
</ul>