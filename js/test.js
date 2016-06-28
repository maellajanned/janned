
(function($){
    $(document).ready(function(){
      $('nav.fixed').midnight();
//======Js concernant le scroll
// on cache tout

    $(".gche").hide();
    $(".dte").hide();

//la seule fonction sur le scroll
  $(window).scroll(function () {
    if ($(this).scrollTop() > 600 ) {
        $('.gche').fadeIn(550);
        $('.gche').show();
      } else {
        $('.gche').fadeOut(550);
        $('.gche').show();
      }

    if ($(this).scrollTop() > 700 ) {
          $('.dte').fadeIn(0);
        } else {
          $('.dte').fadeOut(550);
        }
    });

});})
