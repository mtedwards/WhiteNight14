<?php if ( is_user_logged_in() ) { 
  echo upb_bookmark_controls();
} else {
  echo '<a href="#" id="#myNightLoggedOut">+Add to My Night**</a>';  
}?> 

This

<p><?php echo $genreList ?></p>