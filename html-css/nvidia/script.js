$(function() {
    // Toggle Function
    $('.toggle').click(function(){
        // Switch cta
        $('.cta').toggle();
        // Expand nav
        $('.main-nav').animate({
            height: "toggle",
            opacity: "toggle"
          }, "fast", "swing");
    });
});