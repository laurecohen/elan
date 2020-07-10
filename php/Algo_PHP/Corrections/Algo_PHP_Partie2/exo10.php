<?php include 'template/header.html'; ?>

<h1>EXERCICE 10</h1>
<a href="./">Retour</a>
<p>En utilisant l’ensemble des fonctions personnalisées crées précédemment, créer un formulaire complet qui contient les informations suivantes : champs de texte avec nom, prénom, adresse e-mail, ville, sexe et une liste de choix parmi lesquels on pourra sélectionner un intitulé de formation : « Développeur Logiciel », « Designer web », « Intégrateur » ou « Chef de projet ».<br>
Le formulaire devra également comporter un bouton permettant de le soumettre à un traitement de validation (submit).</p>
<hr class="uk-divider-icon">

<?php

$coordonnees = ["Nom", "Prenom", "Email"];
$civilites = ["Masculin", "Féminin", "Autre"];
$formations = ["Développeur Logiciel", "Designer web", "Intégrateur", "Chef de projet"];

echo renderForm($coordonnees, $civilites, $formations);

// formulaire entier
/**
 * renderForm
 *
 * @param  mixed $coordonnees
 * @param  mixed $civilites
 * @param  mixed $formations
 * @return void
 */
function renderForm(array $coordonnees = ["N/A"], array $civilites = ["N/A"], array $formations = ["N/A"]){
    $resultat = "<form action='#'>";
    $resultat .= renderInput($coordonnees);
    $resultat .= renderRadio($civilites);
    $resultat .= renderChoices($formations);
    $resultat .= "<input class='uk-button uk-margin-top' type='submit' value='Envoyer'>";
    $resultat .= "</form>";
    return $resultat;
}

// affichage des input
/**
 * renderInput
 *
 * @param  mixed $array
 * @return void
 */
function renderInput(array $array = ["N/A"]){
    $resultat = "";
    foreach($array as $input){
        $resultat .= "<label>$input</label><br><input class='uk-input' type='text' name='".mb_strtolower($input)."'><br>";
    }
    return $resultat;
}

// affichage des radios
/**
 * renderRadio
 *
 * @param  mixed $array
 * @return void
 */
function renderRadio(array $array = ["N/A"]){
    $resultat = "<label>Sexe</label><br>";
    foreach($array as $radio){
        $resultat .= "<label><input class='uk-radio' type='radio' name='civilite'> $radio</label><br>";
    }
    return $resultat;
}

// affichage des checkbox
/**
 * renderChoices
 *
 * @param  mixed $array
 * @return void
 */
function renderChoices(array $array = ["N/A"]){
    $resultat = "<label>Formation</label><br><select class='uk-select'>";
    foreach($array as $option){
        $resultat .= "<option>$option</option>";
    }
    $resultat .= "</select><br>";
    return $resultat;
}

include 'template/footer.html';