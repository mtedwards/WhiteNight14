  /*
  Other Elements:
  foundation/foundation.abide.js
  foundation/foundation.accordion.js
  foundation/foundation.alert.js
  foundation/foundation.clearing.js
  foundation/foundation.dropdown.js
  foundation/foundation.reveal.js
  foundation/foundation.tooltip.js
  foundation/foundation.magellan.js
  foundation/foundation.offcanvas.js
  foundation/foundation.interchange.js
  foundation/foundation.joyride.js
  foundation/foundation.tab.js
  
*/

// @codekit-prepend "respond.js", "rem.js"
// @codekit-prepend  "foundation/foundation.js", "foundation/foundation.orbit.js", "foundation/foundation.topbar.js", "foundation/foundation.interchange.js", "foundation/foundation.orbit.js", "jquery.countdown.js", "menu.js"

(function ($) {
  $(document).ready(function(){
      $(document).foundation();
      
      // Countdown
      
      var newYear = new Date(); 
      newYear = new Date(new Date(2015, 2-1, 21, 19)); 
      $('#countdown').countdown({until: newYear, format: 'dHM'});
      
      // Replace Content on Event Read More
      
      $('.excerpt-text').on('click','#read-more', function(e){
        e.preventDefault();
        var newContent = $('.full-text').html();
        $('.excerpt-text').html(newContent);
      });
   
    // Filter open and close box
    
    var filterWidth = +$('.filter-box').width();
    
    if(filterWidth<800){
      $('.filter-box').slideUp();
    }
    
    $('body').on('click','#toggleFilter',function(e){
       e.preventDefault();
      $('.filter-box').slideToggle();
    });
    
    $('.event-list .upb_del_bookmark').html('X');
    $('.event-list .upb_add_bookmark').html('+'); 
   
   //Front Page Planning My Night Button
  
   if (document.cookie.indexOf("wn_logged_in") >= 0) {
    
   } else {
     $('figure .upb_add_remove_links').html('<a href="#" class="upb_bookmark_control" id="myNightLoggedOut">+</a>');
     $('.event-details .upb_add_remove_links').html('<a href="#" class="upb_bookmark_control" id="myNightLoggedOut">+Add to My Night</a>');
   };
   
      // hide orbit slider on load when user browses to page
	$('#featured').fadeIn(100); // hide div, may need to change id to match yours
	
   
  });
}(jQuery));
// @codekit-append "maptabs.js"
// @codekit-append "boxes.js"
// @codekit-append "mymaps.js"
// @codekit-append "vendor/placeholder.js"
