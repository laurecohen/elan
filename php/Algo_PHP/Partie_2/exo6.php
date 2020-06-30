<?php

/* Créer une fonction personnalisée permettant de remplir une liste déroulante à partir d'un tableau de valeurs.
$elements = array("Monsieur","Madame","Mademoiselle");
alimenterListeDeroulante($elements); */

function displaySelect($array){
    $options = "";
    foreach ($array as $value) {
        $options .= "<option>".$value."</option>";
    }
    
    return "<select>".$options."</select>";   
}

$labelsInputs = array("Monsieur","Madame","Mademoiselle");
echo displaySelect($labelsInputs);