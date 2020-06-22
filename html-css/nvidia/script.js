$(function() {
    $('#hamburger').click(function() {
        $('#hamburger').toggleClass('close');
        $('.main-nav').animate({
            height: "toggle",
            opacity: "toggle"
        }, 400, "swing");
    });
});