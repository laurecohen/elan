<?php include 'template/header.html'; ?>

<h1>EXERCICE 6</h1>
<a href="./">Retour</a>
<p>Créer une fonction personnalisée permettant de remplir une liste déroulante à partir d'un tableau de valeurs.</p>
<hr class="uk-divider-icon">

<?php

$elements = ["Monsieur","Madame","Mademoiselle"];
echo alimenterListeDeroulante($elements);

/**
 * alimenterListeDeroulante
 *
 * @param  mixed $elements
 * @return void
 */
function alimenterListeDeroulante(array $elements = ["N/A"]){
    $resultat = "<form action='#'>
        <select class='uk-select' name='civilite'>";
        foreach($elements as $option){
            $resultat .= "<option value='$option'>$option</option>";
        }
    $resultat .= "</select></form>";
    return $resultat;
}

include 'template/footer.html';