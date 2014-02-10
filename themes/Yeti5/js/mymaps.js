
  (function($) {
     
    /*
    *  render_map
    */
     
    function render_map( $el, myMarker ) {
      
    	// var
    	var $markers = $(myMarker);
      
    	// vars
    	var args = {
    		zoom		: 14,
    		center		: new google.maps.LatLng(0, 0),
    		mapTypeId	: google.maps.MapTypeId.ROADMAP
    	};
     
    	// create map	        	
    	var map = new google.maps.Map( $el[0], args);
		window.map = map;
    	// add a markers reference
    	map.markers = [];
      
      $markers.hide();
     
    	// add markers
    	$markers.each(function(){
     
        	add_marker( $(this), map );
     
    	});
     
    	// center map
    	center_map( map );
     
    }
     
    /*
    *  add_marker
    */
     
    function add_marker( $marker, map ) {
     
    	// var
    	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    	
    	var inconImage;
    	
    	if($marker.attr('data-icon')) {
      		inconImage = $marker.attr('data-icon');
    	} else {
      		inconImage = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png';
    	}
     
    	// create marker
    	var marker = new google.maps.Marker({
    		position	: latlng,
    		map			  : map,
    		icon     : inconImage
    	});
     
    	// add to array
    	map.markers.push( marker );
     
    	// if marker contains HTML, add it to an infoWindow
    	if( $marker.html() )
    	{
    		// create info window
    		var infowindow = new google.maps.InfoWindow({
    			content		: $marker.html()
    		});
     
    		// show info window when marker is clicked
    		google.maps.event.addListener(marker, 'click', function() {
     
    			infowindow.open( map, marker );
     
    		});
    	}
     
    }
     
    /*
    *  center_map
    */
     
    function center_map( map ) {    
    	// vars
    	var bounds = new google.maps.LatLngBounds();
    	// loop through all markers and create bounds
    	$.each( map.markers, function( i, marker ){
    		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
  
    		bounds.extend( latlng );
     
    	});
     
      console.log(map.markers.length);
    	// only 1 marker?
    	if( map.markers.length <= 2 )
    	{
    		// set center of map
    	    map.setCenter( bounds.getCenter() );
    	    map.setZoom( 14 );
    	}
    	else
    	{
    		// fit to bounds
    		map.fitBounds( bounds );
    	}
     
    }
    
  
  if($('.acf-map').length) {  
  	$('.acf-map').each(function(){
  		render_map($(this),'.marker');
  	});
  }
  
  
  
  $( ".my-night-featured" ).on("click", "#print", function( event ) {
	  event.preventDefault();
      map.setZoom(14); 
	  window.print()
	});
  
	
})(jQuery);