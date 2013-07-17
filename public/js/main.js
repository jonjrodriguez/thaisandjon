(function($) {
  $('#nav').on('click', 'a', function(e) {
    e.preventDefault();

    var target = $(this).attr('href').substring(1);

    var targetOffset = $("#" + target).offset().top;
        $('html, body').animate({scrollTop: targetOffset}, 400);
  });

  $(".slider").flexslider({
    animation: "slide",
    controlNav: false,
    prevText: "Prev"
  });
})(jQuery);