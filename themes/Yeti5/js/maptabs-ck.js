(function(e){function t(t){var r=e(".marker"),s=e(".marker2"),o=e(".marker3"),u=e(".marker4"),a={zoom:14,center:new google.maps.LatLng(-37.81,144.96),mapTypeId:google.maps.MapTypeId.ROADMAP},f=new google.maps.Map(t[0],a);f.markers=[];r.hide();s.hide();o.hide();u.hide();window.markers1=r;window.markers2=s;window.markers3=o;window.markers4=u;window.map=f;mapCenter=a.center;i(f);n()}function n(){e("#addMarkers").is(":checked")&&markers1.each(function(){r(e(this),map)});e("#addMarkers2").is(":checked")&&markers2.each(function(){r(e(this),map)});e("#addMarkers3").is(":checked")&&markers3.each(function(){r(e(this),map)});e("#addMarkers4").is(":checked")&&markers4.each(function(){r(e(this),map)});e("#addMarkers").is(":checked")||e("#addMarkers2").is(":checked")||e("#addMarkers3").is(":checked")||e("#addMarkers4").is(":checked")?i(map):map.setCenter(mapCenter)}function r(e,t){var n=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),r;e.attr("data-icon")?r=e.attr("data-icon"):r="http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png";var i=new google.maps.Marker({position:n,map:t,icon:r});t.markers.push(i);if(e.html()){var s=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(i,"click",function(){s.open(t,i)})}}function i(t){var n=new google.maps.LatLngBounds;e.each(t.markers,function(e,t){var r=new google.maps.LatLng(t.position.lat(),t.position.lng());n.extend(r)});console.log(t.markers.length);if(t.markers.length<=2){t.setCenter(n.getCenter());t.setZoom(14)}else t.fitBounds(n)}e(".filters").on("click",".filterClick",function(){e(".my-map").replaceWith('<div class="my-map"></div>');e(".my-map").each(function(){t(e(this))})});e(".my-map").each(function(){t(e(this))})})(jQuery);