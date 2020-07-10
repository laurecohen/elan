<?php

/* En utilisant l’ensemble des fonctions personnalisées crées précédemment, créer un formulaire complet qui contient les informations suivantes: 
    champs de texte avec nom, prénom, adresse e-mail, ville, sexe et une liste de choix parmi lesquels on pourra sélectionner un intitulé de formation: 
    «Développeur Logiciel»,«Designer web», «Intégrateur» ou «Chef de projet».
Le formulaire devra également comporter un bouton permettant de le soumettre à un traitement de validation (submit). */

$labelsInputs = array("lastname" => "Nom", "vorname" => "Prénom", "email" => "Email", "city" => "Ville");
$labelsRadio = array("Feminin", "Masculin", "Autre");
$labelsSelect = array("Développeur Logiciel","Designer web","Intégrateur", "Chef de projet");

function displayInputs($inputArray){
    $formInputs = "";
    foreach ($inputArray as $id => $value) {
        $formInputs .= "<label for='".$id."'>".$value."</label>
            <input type='text' id='".$id."' style='display:block' required>";
    }
    return $formInputs;
}

function displayRadio($radioArray){
    $radioBtn = "";
    foreach ($radioArray as $value) {
        $id = strtolower($value);
        $radioBtn .= "<input type='radio' id='".$id."' name='gender'><label for='".$id."'>".$value."</label>";
    }
    return "Sexe: ".$radioBtn."<br>";
}

function displaySelect($selectArray){
    $options = "";
    foreach ($selectArray as $value) {
        $options .= "<option>".$value."</option>";
    }   
    return "Formation: <select>".$options."</select><br>";   
}

function displayForm($input, $radio, $select){
    $formElemnts = "";
    $formElemnts .= displayInputs($input).displayRadio($radio).displaySelect($select);
    
    return "<form method = 'post' action = ''>".
                $formElemnts."<br>
                <button type='submit'>Submit</button>
            </form>";
}

echo displayForm($labelsInputs, $labelsRadio, $labelsSelect);