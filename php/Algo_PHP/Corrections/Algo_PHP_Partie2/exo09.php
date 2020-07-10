<?php include 'template/header.html'; ?>

<h1>EXERCICE 9</h1>
<a href="./">Retour</a>
<p>Créer une fonction personnalisée permettant d’afficher des boutons radio avec un tableau de valeurs en paramètre ("Masculin","Féminin","Autre").</p>
<hr class="uk-divider-icon">

<?php

$elements = [
    "Masculin",
    "Féminin",
    "Autre"
];

echo afficherRadio($elements);

/**
 * afficherRadio
 *
 * @param  mixed $elements
 * @return void
 */
function afficherRadio(array $elements = ["N/A"]) {
    $resultat = "<form action='#'>";
    foreach ($elements as $radio) {
        //name='sexe' indispensable pour grouper et rendre les boutons radios indépendant !
        $resultat .= "<label><input class='uk-radio' type='radio' name='sexe'> $radio</label><br>";
    }
    $resultat .= "</form>";
    return $resultat;
}

include 'template/footer.html';