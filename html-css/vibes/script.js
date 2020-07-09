$( document ).ready(function() {
    var menu = $('.menu-xs')
    var trigger = $('.main-menu--toggle')
    
    // Set Template Initial Color Palette
    $('.template-section:nth-child(odd)').addClass('s-odd')
    $('.template-section:nth-child(even)').addClass('s-even')

    // Toggle Color Modes
    $('.color-mode--toggle').click(function(){
        // Set data-theme value to switch color modes   
        $('html').attr('data-theme') === 'light' ? $('html').attr('data-theme', 'dark') : $('html').attr('data-theme', 'light')
    })

    // Expand menu-xs
    trigger.click(function(){
        // Display/hide the menu and switch trigger-icon
        menu.slideToggle().toggleClass('expanded')
        $(this).children().toggle()
    })

    // Function Resize 
    $(window).resize(function(){
        var $deviceWidth = $(window).width()
        
        // Check if browser screen width has changed
        if( $deviceWidth >= 576){
    
            // Check if menu has remained open during the screen orientation/width change
            if( $('menu-xs').hasClass('expanded')){
                // … then hide it again and switch the trigger-icon again
                $('menu-xs').removeClass('expanded')
                $('.main-menu--toggle').children().toggle()
            }
        }
    })

    // Expand #About accordion
    $( '.dropdown-element' ).click(function(){
        // Display/hide accordion and toggle fontawesome class
        $(this).toggleClass('accordion-open')
        $(this).children('i').toggleClass('fa-plus fa-minus')
    })

    // Galllery
    $('.gallery-grid-item').click(function(){
        $source = $(this).children('img').attr('src')
        $text = $(this).children('img').attr('alt')
        
        // Load image in modal
        $('#modal img').attr({
            'src': $source, 
            'alt': $text 
        })
        // Set alt text as modal ficaption
        $('.modal-caption').text($text)

        // Call openModal function
        openModal()

        // Prevent closeModal() propagation
        $('.modal-container > img, .modal-caption, .modal-icon').click(function(event){
            event.stopPropagation();
        })

        // Call closeModal() on trigger click && modal
        $('.close-modal, #modal').click(function(){
            closeModal()
        })

        // Call closeModal() as ECHAP is pressed once
        $(window).on('keyup', function(event){
            if(event.keyCode === 27){
                closeModal()
            }
        })

    })

    function openModal(){
        // Animate #modal display and prevent scrolling as #modal is visible
        $('#modal').addClass('modal-open')
        $('body').addClass('noscroll')
    }
    function closeModal(){
        // Dismiss Modal and reset scroll
        $('#modal').removeClass('modal-open')
        $('body').removeClass('noscroll')
    }
});