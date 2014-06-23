<?php
function instpull() {
    
    global $mifp_options;
    $data = get_transient('instapull');
    if(false === $data){
      $access_token = $mifp_options['instagram_access_token'];
      $userID = $mifp_options['instagram_user_id'];
      $display = $mifp_options['instagram_display'];
      
      if($display == 'All'){
        $data = file_get_contents('https://api.instagram.com/v1/users/' . $userID . '/media/recent?access_token=' . $access_token . '&callback=?&count=16');
      } else {
        $data = file_get_contents('https://api.instagram.com/v1/users/self/media/liked?access_token=' . $access_token . '&callback=?&count=16');
      }
      set_transient('instapull', $data, 300);
    }
    
    $data = json_decode($data);    
    return $data;
}