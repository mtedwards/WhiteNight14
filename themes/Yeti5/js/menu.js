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
})(jQuery);