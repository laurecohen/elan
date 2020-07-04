$( document ).ready(function() {
    // Set Initial Color Palette
    $('.template-section:nth-child(odd)').addClass('s-odd');
    $('.template-section:nth-child(even)').addClass('s-even');
    
    var $menu = '.menu-xs';
    $('.main-menu--toggle').click(function(){
        // Display/hide the menu and switch trigger-icon
        $($menu).toggleClass('expanded');
        $(this).children().toggle();
    });

    $( '.list-icon' ).click(function(){
        // Display/hide accordion and toggle fontawesome class
        $(this).toggleClass('accordion-open').children().hasClass('fa-plus') ? 
            $(this).children().removeClass('fa-plus').addClass('fa-minus') :
            $(this).children().removeClass('fa-minus').addClass('fa-plus');
    });

    $('.color-mode--toggle').click(function(){
        // Switch colors…
        $('body').toggleClass('b-dark');
        $('.logo').toggleClass('l-dark');
        $('.s-even').toggleClass('s-dark');
    });
    
    // Function resize 
    $(window).resize(function(){
        var $deviceWidth = $(window).width();
        
        // Check if browser screen width has changed
        if( $deviceWidth >= 576){

            // Check if menu has remained open during the screen orientation/width change
            if( $($menu).hasClass('expanded')) {
                // … then hide it again and switch the trigger-icon again
                $($menu).removeClass('expanded');
                $('.main-menu--toggle').children().toggle();
            }
        }
    });

    $(window).scroll(function(){
        
        if( $(window).scrollTop() ){
            $('.site-header').addClass('p-sticky');        
        } else {
            $('.site-header').removeClass('p-sticky');
        }
    });
});