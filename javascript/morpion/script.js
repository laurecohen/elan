
let player = "x"
let nbCell = 9
let finDuJeu = false

$(".cell").click(function(){
    if( $(this).text() ===  "" ){
        player = player === "o" ? "x" : "o"
        $(this).text(player)
        nbCell--

        if (nbCell === 0){
            finDuJeu = true
        }
    }

    if(finDuJeu){
        console.log('Fin du jeu')
    }

    for(let x = 1; x <= 3; x++){
        let ligne = ""
        let colonne = ""
        let diag1 = ""
        let diag2 = ""
        
        for(let y = 1; y <= 3; y++){
            ligne += $("#"+x+"-"+y).text()
            colonne += $("#"+y+"-"+x).text()
            
            if(ligne === player.repeat(3)){
                finDuJeu = true
                return true
            }
            if(colonne === player.repeat(3)){
                finDuJeu = true
                return true
            }
            if (x == y){
                diag1 += $("#"+y+"-"+x).text()
                if(diag1 === player.repeat(3)){
                    finDuJeu = true
                    return true
                }    
            }
            if (x + y == 4){
                diag2 += $("#"+y+"-"+x).text()
                if(diag2 === player.repeat(3)){
                    finDuJeu = true
                    return true
                } else {
                    return false
                }
            }
        }
    }
})

$("#reset-table").click(function(){
    // Vider toutes les cases et réinitialiser la variable nbCell
    $(".cell").text("")
    finDuJeu = false
    nbCell = 9
    console.clear()
})