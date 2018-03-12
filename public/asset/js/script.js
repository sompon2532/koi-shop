$(document).ready(function() {
    $('.sub-action').click(function() {
      if( $(this).parent().next().css('display') == 'block' ) {
        $(this).parent().next().slideUp(300);
        $(this).html('<i class="fa fa-minus" aria-hidden="true"></i>');
      }
      else {
        $(this).parent().next().slideDown(300);
        $(this).html('<i class="fa fa-plus" aria-hidden="true"></i>');
      }
    });

    $('.menu-collapse').click(function() {
      $('nav').slideToggle(500, function() {
        $(this).css('display', '');
        $(this).toggleClass('menu-expanded');
      });
    });
});
