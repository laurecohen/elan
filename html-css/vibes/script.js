$( document ).ready(function() {
    var menu = $('.menu-xs')
    
    // Set Template Initial Color Palette
    $('.template-section:nth-child(odd)').addClass('s-odd')
    $('.template-section:nth-child(even)').addClass('s-even')

    // Toggle Color Modes
    $('.color-mode--toggle').click(function(){
        // Set data-theme value to switch color modes   
        $('html').attr('data-theme') === 'light' ? $('html').attr('data-theme', 'dark') : $('html').attr('data-theme', 'light')
    })

    // Expand/Dismiss menu-xs
    $('.main-menu--toggle').click(function(event){
        // Prevent 'Dismiss menu-xs' propagation
        event.stopPropagation();
        
        // Expand menu-xs
        menu.addClass('menu-open')    
        // Dismiss menu-xs
        $('body').click(function(){
            menu.removeClass('menu-open')
        })
    })

    // Function Resize 
    $(window).resize(function(){
        var $deviceWidth = $(window).width()
        
        // Check if browser screen width has changed AND if the menu has remained open …
        if( $deviceWidth >= 768 && menu.hasClass('menu-open')){
            // Dismiss menu
            menu.removeClass('menu-open')
        }
    })

    // Expand #About accordion
    $( '.dropdown-element' ).click(function(){
        // Display/hide accordion and toggle fontawesome class
        $(this).toggleClass('accordion-open')
        $(this).children('i').toggleClass('fa-plus fa-minus')
    })

    // Open #Portfolio thumbnails full-width in #modal
    $('.gallery-grid-item').click(function(){
        $source = $(this).children('img').attr('src')
        $text = $(this).children('img').attr('alt')
        
        // Load image in modal
        $('#modal img').attr({
            'src': $source, 
            'alt': $text 
        })

        // Set 'alt' text as modal ficaption
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