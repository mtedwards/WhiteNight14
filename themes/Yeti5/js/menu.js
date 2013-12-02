(function($) {
  $('.full-menu').on('click','a.dropdown',function(e){
    e.preventDefault();
    if($(this).hasClass('open')) {
      $(this).removeClass('open');
    } else {
      $('.dropdown').removeClass('open');
       $(this).addClass('open');
    }
    $('.full-menu .sub-menu').slideUp(100);
    if(!$(this).next('.sub-menu').is(':visible')) {
      $(this).next('.sub-menu').slideDown(100);
    }
    
  });
  
  
   $('body').on('click','#openMyNight',function(e){
     e.preventDefault();
     if($('#menu-full-my-night').hasClass('open')) {
       $('.dropdown').removeClass('open');
       $('.full-menu .sub-menu').slideUp(100);
     } else {
       $('.dropdown').removeClass('open');
       $('.full-menu .sub-menu').slideUp(100);
       $('#menu-full-my-night').addClass('open');
       $('#menu-full-my-night').next('.sub-menu').slideDown(100);
     }
  });
  
  $('body').on('click','#switchtoMNlogin',function(e){
    e.preventDefault();
    $('#loginMN').toggle();  
    $('#createMN').toggle();
  });
  
  
})(jQuery);