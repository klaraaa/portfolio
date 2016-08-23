  jQuery(document).ready(function($) {
  console.log('main js inläst');
  
  //Desktop view
  if ($(window).width() >= 1024) {
    //Göm hamburgerikon
    $('#menu-icon').hide();
    //Visa meny
    $('#main-nav').show();
  }
  // Tablet view
  else if ($(window).width() >= 768) {
    //Göm hamburgerikon
    $('#menu-icon').hide();
    //Visa meny
    $('#main-nav').show();
  }
  //Mobile view
  else {
    //Göm meny
    $('#main-nav').hide();
    //Lyssna efter click på hamburgarikon
    $('#menu-icon').on('click', function() {
      //Toggla fram menyn
      $('#main-nav').slideToggle();
    });
  }
});

