$( document ).ready(function() {
    var menu = $('.menu-xs');
    var trigger = $('.main-menu--toggle');
    
    // Set Template Initial Color Palette
    $('.template-section:nth-child(odd)').addClass('s-odd');
    $('.template-section:nth-child(even)').addClass('s-even');

    trigger.click(function(){
        // Display/hide the menu and switch trigger-icon
        menu.slideToggle().toggleClass('expanded');
        $(this).children().toggle();
    });  

    $( '.list-icon' ).click(function(){
        // Display/hide accordion and toggle fontawesome class
        $(this).toggleClass('accordion-open').children();
        $(this).hasClass('fa-plus') ? $(this).children().removeClass('fa-plus').addClass('fa-minus') : $(this).children().removeClass('fa-minus').addClass('fa-plus');
        return false;
    });

    // Color-mode
    $('.color-mode--toggle').click(function(){
        // Set color-mode value to switch modes
        ( $('html').attr('color-mode') === 'light' ) ? ( $('html').attr('color-mode', 'dark') ) : ( $('html').attr('color-mode', 'light') );
    });
    
    // Function resize 
    $(window).resize(function(){
        var $deviceWidth = $(window).width();
        
        // Check if browser screen width has changed
        if( $deviceWidth >= 576){
    
            // Check if menu has remained open during the screen orientation/width change
            if( $('menu-xs').hasClass('expanded')){
                // … then hide it again and switch the trigger-icon again
                $('menu-xs').removeClass('expanded');
                $('.main-menu--toggle').children().toggle();
            }
        }
    });
});