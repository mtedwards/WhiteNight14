
   (function($) {
     
    /*
    *  render_map
    */
     
    function render_map( $el ) {
      
    	// var
    	var $markers = $('.marker');
      var $markers2 = $('.marker2');
      var $markers3 = $('.marker3');
      var $markers4 = $('.marker4');
      
    	// vars
    	var args = {
    		zoom		: 14,
    		center		:  new google.maps.LatLng(-37.81, 144.96),
    		mapTypeId	:  google.maps.MapTypeId.ROADMAP
    	};
     
    	// create map	        	
    	var map = new google.maps.Map( $el[0], args);
      
    	// add a markers reference
    	map.markers = [];
      
      $markers.hide();
      $markers2.hide();
      $markers3.hide();
      $markers4.hide();
      
      window.markers1 = $markers;
      window.markers2 = $markers2;
      window.markers3 = $markers3;
      window.markers4 = $markers4;
      window.map = map;
      mapCenter = args.center;

    	// center map
    	center_map( map );
    	
    	make_Markers();
     
    }
  
      function make_Markers() {
        if ($('#addMarkers').is(':checked')) {
              markers1.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers2').is(':checked')) {
            markers2.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers3').is(':checked')) {
              markers3.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers4').is(':checked')) {
            markers4.each(function(){
        	    add_marker( $(this), map );
            });
          }
          
          if ($('#addMarkers').is(':checked')||$('#addMarkers2').is(':checked')||$('#addMarkers3').is(':checked')||$('#addMarkers4').is(':checked')) {
            center_map( map );
          } else {
            map.setCenter(mapCenter);
          }
      }

      
      $('.filters').on( "click", ".filterClick", function() {
          
          $('.my-map').replaceWith('<div class=\"my-map\"></div>');
          
          $('.my-map').each(function(){
            render_map($(this));
          });
          
         // make_Markers();
      });
       
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
    
  

  	$('.my-map').each(function(){
  		render_map($(this));
  	});
  
  
	
}(jQuery));
