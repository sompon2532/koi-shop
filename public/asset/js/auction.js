$('document').ready(function() {

    /* Watchlist ------------------------------------------------------ */

    $('.btn-watchlist').click(function() {
      $('#loading').show();
      $('#img-loading').show();
      var ele = $(this);
      var checkClass = $(this).hasClass('d--koi_watchlish');
      $.ajax({
        url: 'watchlist',
        type: 'GET',
        data: {
          koi_id: koi_id,
          event_id: event_id,
          user_id: user_id
        },
        success: function(result) {
          ele.removeClass();
          if( checkClass ) {
            ele.find('img').attr('src', 'http://www.koikichi-auction.com/public/asset/images/ico_favorite_star_0.png');
            ele.addClass('btn-watchlist').addClass('d--koi_nowatchlish');
          }
          else {
            ele.find('img').attr('src', 'http://www.koikichi-auction.com/public/asset/images/ico_favorite_star_1.png');
            ele.addClass('btn-watchlist').addClass('d--koi_watchlish');
          }
          $('#loading').hide();
          $('#img-loading').hide();
        },
        error: function(error) {
          return;
        }
      });
    });

    /* Watchlist ------------------------------------------------------ */
});
