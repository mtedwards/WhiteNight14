<?php

// display the most recent set of images
function instaPhotos() {

  $data = instpull();

  if($data){
      if(isset($data->data)){
        $photos = $data->data;
      }
    }
    if($photos){
        foreach($photos as $photo){
          $img = $photo->images->low_resolution->url;
          $name = $photo->user->username;
          $link = $photo->link;
          $return .= '<figure><a href="' . $link . '" target="_blank"><img src="' . $img . '" alt="Instagram by ' . $name . '"></a><figcaption><a href="' . $link . '" target="_blank">@' . $name . '</a></figcaption></a></figure>';
          //$return .= var_dump($photo);
        }
      return '<div class="instaWrap">' . $return .'</div>';
    } else {
      return '<div class="instaWrap"><h3>There are currently no images</h3></div>';
    }

}






// display the get more URL if it exists
function instaNextURL() {
    $data = instpull();
    
    if($data){
      if(isset($data->pagination->next_url)){
        $nextURL = $data->pagination->next_url;
      }
    }
    if($nextURL){
      return '<div class="loadMore"><a href="#" id="loadMore" data-more="'. $nextURL.'">Load More</a></div>';
    }
}



//and the shortcode
function mifp_insta_shortcode() {
  $insta = instaPhotos();
  $insta .= instaNextURL();
	return $insta;
}
add_shortcode('insta_gallery', 'mifp_insta_shortcode');






// display the most recent image favourited
function instaSingle() {
  $data = instpull();

  if($data){
      if(isset($data->data)){
        $photos = $data->data;
      }
    }
    if($photos){
          $photo = $photos[0];
          $img = $photo->images->low_resolution->url;
          $name = $photo->user->full_name;
          echo '<img src="' . $img . '" alt="Instagram by ' . $name . '">';
    } else {
        echo '<h3>Oops</h3>';
    }
}

//and the shortcode
function mifp_instaSingle_shortcode() {
 
	instaSingle();
 
}
add_shortcode('insta_single', 'mifp_instaSingle_shortcode');



function mifp_instaSingleLink_shortcode( $atts ) {
  extract($atts);


   $data = instpull();

  if($data){
      if(isset($data->data)){
        $photos = $data->data;
      }
    }
    if($photos){
          $photo = $photos[0];
          $img = $photo->images->low_resolution->url;
          $name = $photo->user->full_name;
          if($atts){
            $instaLink = '<a href="' .  $link . '"><img src="' . $img . '" alt="Instagram by ' . $name . '"></a>';
          } else {
            $instaLink ='<img src="' . $img . '" alt="Instagram by ' . $name . '">';
          }
    } else {
        $instaLink ='<h3>Oops</h3>';
    }
    return $instaLink;
}
add_shortcode('insta_single_link', 'mifp_instaSingleLink_shortcode');