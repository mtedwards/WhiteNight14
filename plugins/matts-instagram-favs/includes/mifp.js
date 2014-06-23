jQuery(document).ready(function( $ ) {
  $( ".loadMore" ).on( "click", "#loadMore", getNextInsta );
    
    /*****************************/
    /******    FUNCTIONS   *******/
    /*****************************/
    
    
    // Get the instragram link
    function getNextInsta(event) {
      event.preventDefault();
      var new_url = $(this).data('more');
      retrieveInstagram(new_url);   
    };
    
    
    // Get the instragram json
    function retrieveInstagram(new_url) {
       $.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: new_url,
        success: function(data) {
          console.log(data);
          // get the next URL
          var next_link = data.pagination.next_url;
          updateMoreLink(next_link);
         
          // load the photos in
          var photos = data.data;
          addInstaPic(photos);  
          }
        });
    };
    
    
    // place the instagram photos
    function addInstaPic(photos) {
      for(var i = 0;i < photos.length-1;i++)
      {
        var photo = photos[i];
        $( '.instaWrap' ).append( '<figure><a href="' + photo.link + '" target="_blank"><img src="' + photo.images.low_resolution.url + '" alt="Instagram by '+ photo.user.username +'"></a><figcaption><a href="' + photo.link + '" target="_blank">@'+ photo.user.username +'</a></figcaption></a></figure>' );
      }
    };
    
    
    // update the instagram get next link
    function updateMoreLink(next_link){
      if(next_link) {
        $('#loadMore').data( 'more', next_link);
      } else {
        $('.loadMore').html('<h5>You have reached the end of the photos.</h5>');
      }
    };   
});