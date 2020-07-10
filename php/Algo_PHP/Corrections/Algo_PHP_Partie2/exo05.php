<?php include 'template/header.html'; ?>

<h1>EXERCICE 5</h1>
<a href="./">Retour</a>
<p>Créer une fonction personnalisée permettant de créer un formulaire de champs de texte en précisant le nom des champs associés.</p>
<hr class="uk-divider-icon">

<?php

$nomsInput = ["Nom","Prénom","Ville"];
echo afficherInput($nomsInput);
// echo afficherInput();

/**
 * afficherInput
 *
 * @param  mixed $nomsInput
 * @return void
 */
function afficherInput(array $nomsInput = ["N/A"]){
    $resultat = "<form action='#'>";
    foreach($nomsInput as $input){
        $resultat .= "<label>$input</label><br/><input class='uk-input' type='text' name='".mb_strtolower($input)."'><br/>";
    }
    $resultat .= "</form>";
    return $resultat;
}

include 'template/footer.html';