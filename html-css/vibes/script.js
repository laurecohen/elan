$( document ).ready(function() {
    var $menu
    var $item
    var currentItem
    var dir
    
    // Set Template Initial Color Palette
    $('.template-section:nth-child(odd)').addClass('s-odd')
    $('.template-section:nth-child(even)').addClass('s-even')

    $('.color-mode--toggle').click(function(){
        // Set data-theme value to switch color modes   
        $('html').attr('data-theme') === 'light' ? $('html').attr('data-theme', 'dark') : $('html').attr('data-theme', 'light')
    })

    $menu = $('.menu-xs')
    $('.main-menu--toggle').click(function(event){
        // Prevent 'Dismiss menu-xs' propagation
        event.stopPropagation()
        
        // Expand menu-xs
        $menu.addClass('menu-open')    

        // Dismiss menu-xs
        $('body').click(function(){
            $menu.removeClass('menu-open')
        })
    })

    // Function Resize 
    $(window).resize(function(){
        var $deviceWidth = $(window).width()
        
        // Check if browser screen width has changed AND if the menu has remained open …
        if( $deviceWidth >= 768 && $menu.hasClass('menu-open') ){
            // Dismiss menu
            $menu.removeClass('menu-open')
        }
    })

    $( '.dropdown-element' ).click( function(){
        // Display/hide accordion and toggle fontawesome class
        $(this).toggleClass('accordion-open')
        $(this).children('i').toggleClass('fa-plus fa-minus')
    })

    $item = $('.gallery-grid-item')
    $( $item ).click( function(){
        
        // Reset all $item elements and select current
        $item.removeClass('focus')
        currentItem = $(this)
        currentItem.addClass('focus')

        // Set modal Content then expand modal
        setModal()
        openModal()

        // Prevent closeModal() propagation
        $('.modal-container > img, .modal-caption, .modal-icon').click(function(event){
            event.stopPropagation()
        })

        // Use .modal-control to navigate through list
        $('.gallery-control').click( function(event){

            // Identify which ctrl is pressed
            dir = $(this).hasClass('dir-left') ? 'left' : 'right'
            navigate()
        })
        
        // Call closeModal() on trigger click && modal
        $('.close-modal, #modal').click(function(){
            closeModal()
        })
    })
    
    function setAttr(el, src, txt){
        // Set img Atributes
        return el.attr({ 'src': src, 'alt': txt })
    }
    
    function setModal(){
        // Refresh data
        source = currentItem.children('img').attr('src')
        info = currentItem.children('img').attr('alt')
        
        // Load image in modal
        setAttr( $('#modal img'), source, info )
        // Set 'alt' text as modal ficaption
        $('.modal-caption').text(info)
    }
    
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
    
    function navigate(){
        if (dir == 'right'){
            if(currentItem){
                currentItem.removeClass('focus')
                next = currentItem.next()
                
                if(next.length > 0){
                    currentItem = next.addClass('focus')
                }else{
                    currentItem = $item.eq(0).addClass('focus')
                }
                
            }else{
                currentItem = $item.eq(0).addClass('focus')
            }
        } else if (dir == 'left'){
            if(currentItem){
                currentItem.removeClass('focus')
                next = currentItem.prev()
                
                if(next.length > 0){
                    currentItem = next.addClass('focus')
                }else{
                    currentItem = $item.last().addClass('focus')
                }
                
            }else{
                currentItem = $item.last().addClass('focus')
            }
        }
        setModal()
    }

    // Function Keyup
    $(window).on('keyup', function(event){
        console.log(event.which)
        if( event.which == 39 ){
            // 39 = arrow-right
            dir = 'right'
            navigate()
        } else if( event.which == 37 ){
            // 37 = arrow-left
            dir = 'left'
            navigate()
        } else if ( event.which == 13 ){
            // 13 = ENTER
            setModal()
            openModal()
        } else if( event.which == 27 ){
            // 27 = ESC
            closeModal()
        } 
    })
})