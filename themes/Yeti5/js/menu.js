(function($) {
  $('body').on('click','a.dropdown',function(e){
    e.preventDefault();
    if($(this).hasClass('open')) {
      $(this).removeClass('open');
    } else {
      $('.dropdown').removeClass('open');
       $(this).addClass('open');
    }
    $('#header-menu .sub-menu').slideUp(100);
    if(!$(this).next('.sub-menu').is(':visible')) {
      $(this).next('.sub-menu').slideDown(100);
    }
    
  });
  
  
   $('body').on('click','.openMyNight',function(e){
     e.preventDefault();
     openMyNight();
  });
  
  $('body').on('click','#myNightLoggedOut',function(e){
     e.preventDefault();
     openMyNight();
  });
  
  
  $('body').on('click','#switchtoMNlogin',function(e){
    e.preventDefault();
    $('#loginMN').toggle();  
    $('#createMN').toggle();
  });
  
  function openMyNight(){
    if($('#menu-full-my-night').hasClass('open')) {
       $('.dropdown').removeClass('open');
       $('#header-menu .sub-menu').slideUp(100);
     } else {
       $('.dropdown').removeClass('open');
       $('#header-menu .sub-menu').slideUp(100);
       $('#menu-full-my-night').addClass('open');
       $('#menu-full-my-night').next('.sub-menu').slideDown(100);
     }
  }
  
  
  
  
}(jQuery));