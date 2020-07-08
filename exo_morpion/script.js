// Partie 0 manche 0 => player 1 = "x" (par défault)
let player = "x"
var nbCell = 9
var nbClick = 0
var finDuJeu = false

$(".cell").click(function(){
    if( $(this).text() ===  "" && !finDuJeu ){
        $(this).text(player)
        player = player === "o" ? "x" : "o"
        nbCell--
    }
    
    $(".cell").each(function(){
        $rows = $(this).closest("tr").find(".cell").text()    
        console.log($rows)

        if ($rows === "xxx"){
            msg = "x a gagné !"
            finDuJeu = true
        } else if($rows === "ooo"){
            msg = "o a gagné !"
            finDuJeu = true
        }
    })  
    
    console.log(msg)
    if (finDuJeu){
        $(this).off("click")
    }

    // Si toutes les cases (nbCell) sont remplies --> afficher "jeu terminé"
    if (nbCell === 0){
        console.log("Le jeu est terminé")
        // Afficher dans un span .msg
    }
})

$('#reset-table').click(function(){
    // Vider toutes les cases et réinitialiser la variable nbCell
    $('.cell').text('')
    nbCell = 9
    console.clear()
})