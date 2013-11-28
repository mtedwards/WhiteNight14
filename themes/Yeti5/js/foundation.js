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
  foundation/foundation.orbit.js
*/


// @codekit-prepend "foundation/foundation.js", "foundation/foundation.topbar.js", "foundation/foundation.interchange.js", "foundation/foundation.orbit.js","jquery.countdown.js", "enquire.js"

(function($) {
  $(document).ready(function(){
      $(document).foundation();
      
      // Countdown
      
      var newYear = new Date(); 
      newYear = new Date(new Date(2014, 2-1, 22, 19)); 
      $('#countdown').countdown({until: newYear, format: 'dHM'});
      
      // Replace Content on Event Read More
      
      $('.excerpt-text').on('click','#read-more', function(e){
        e.preventDefault();
        var newContent = $('.full-text').html();
        $('.excerpt-text').html(newContent);
      });
      
      
      //EnQuire
      
    enquire.register("screen and (min-width: 30em)", {

        deferSetup : true,
        setup : function() {
            $( '#eventDetails' ).load( "/chunk/event-single-details", function() {});
        },
        match : function() {
            $( '#eventDetails' ).show();
        },
        unmatch : function() {
            $( '#eventDetails' ).hide();
        }  
    
    });
    
    
      
      
  });
})(jQuery);

// @codekit-append "boxes.js"
// @codekit-append "mymaps.js"

