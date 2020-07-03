$( document ).ready(function() {
    $(window).resize(function(){
        var $deviceWidth = $(window).width();
        if( $deviceWidth >= 576){
            $('.menu-xs').css('display', 'none');
        }
    });

    $('.main-menu--toggle').click(function(){
        $(this).children().toggle();
        $('.menu-xs').toggle();
    });
});