$( document ).ready( ()=>{
    var $menu = $('.menu-xs')
    
    // Set Template Initial Color Palette
    $('.template-section:nth-child(odd)').addClass('s-odd')
    $('.template-section:nth-child(even)').addClass('s-even')
    
    $('.color-mode--toggle').click(function(){
        let dataTheme = $('html').attr('data-theme')
        $('html').attr( 'data-theme',function(val){
            // Set data-theme value to switch color modes
            return val = dataTheme === 'light' ? 'dark' : 'light'
        })
    })


})