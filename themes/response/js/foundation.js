/*
  Other Elements:
  // "foundation/foundation.alerts.js"
  // "foundation/foundation.clearing.js"
  // "foundation/foundation.cookie.js"
  // "foundation/foundation.dropdown.js"
  // "foundation/foundation.forms.js"
  // "foundation/foundation.joyride.js"
  // "foundation/foundation.magellan.js"
  // "foundation/foundation.orbit.js"
  // "foundation/foundation.reveal.js"
  // "foundation/foundation.section.js"
  // "foundation/foundation.tooltips.js"
  // "foundation/foundation.placeholder.js"
  // "foundation/foundation.abide.js"
*/


// @codekit-prepend "foundation/foundation.js", "respond.js", "fitvids.js", "foundation/foundation.topbar.js", "foundation/foundation.interchange.js"

$(document).ready(function(){
    
    $(document).foundation();
    
    $('.entry-content').fitVids();
    
});