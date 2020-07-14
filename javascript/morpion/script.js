
$(document).ready( ()=>{
    let player = "x"
    let nbCell = 9
    let nbClick = 0
    let endOfGame = false
    let $info = $('#info')
    
    function handleEvent(trigger){
        if( trigger.text() ===  "" ){
            nbCell--

            if (nbCell === 0){
                endOfGame = true
            }
            
            nbClick++
            trigger.text(player)
            
            if ( nbClick >= 5 ){
                // Commencer les tests quand le premier jouer a joué 3 coups
                if ( endOfGame  || validateResult(player) ){      
                    if (validateResult(player)){
                        $(".player-"+player).addClass("win")
                        $(".player-"+player).children(".player-info").text("Victoire de " + player.toUpperCase() + " !")
                        $info.text("Fin du jeu !")
                    } else {
                        $info.text("Match nul !")
                    }
                    // Détacher l'évenement click dès que la partie est terminée
                    $('.cell').off('click')
                }
            }
            player = player === "o" ? "x" : "o"
        }
    }

    function validateResult(current){
        let diag1 = ""
        let diag2 = ""

        for(let x = 1; x <= 3; x++){
            let line = ""
            let column = ""
            
            for(let y = 1; y <= 3; y++){
                line += $("#"+x+"-"+y).text()
                column += $("#"+y+"-"+x).text()
                
                if (x == y){
                    diag1 += $("#"+x+"-"+y).text();       
                }
                if (x + y == 4){
                    diag2 += $("#"+x+"-"+y).text();    
                } 
            }

            if(line === current.repeat(3)){
                return true
            }
            if(column === current.repeat(3)){
                return true
            }   
        }
        if(diag1 === current.repeat(3)){
            return true
        }  
        if(diag2 === current.repeat(3)){
            return true
        } 
        // False si les conditions précédentes n'ont pas renvoyé 'true'
        return false
    }

    // Définir une fonction pour gérer l'évènement click sur une cellule
    $.fn.clickHandler = function(){
        this.on('click', function(){
            handleEvent($(this))
        })
    }
    
    // Activer le click sur les cellules
    $('.cell').clickHandler()
    
    $("#reset-table").click(function(){
        // Vider toutes les cases, réinitialiser les variables nbCell et endOfGame 
        $(".cell, #info, .player-info").text("")
        nbCell = 9
        endOfGame = false
        $(".player").removeClass("win")
        // Réactiver le click sur les cellules
        $('.cell').clickHandler()
    })

})

