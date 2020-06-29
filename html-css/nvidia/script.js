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

    $('.thumbnail').click(function(){
        $(this).toggleClass('expanded');
        $("body").toggleClass('noscroll');
    });
});