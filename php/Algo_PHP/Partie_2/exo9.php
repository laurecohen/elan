<?php

/* Créer une fonction personnalisée permettant d’afficher des boutons radio avec un tableau de valeurs en paramètre("Monsieur","Madame","Mademoiselle").
Exemple:afficherRadio($nomsRadio); */

$elements = array("Monsieur","Madame","Mademoiselle");

function afficherRadio($array){
    foreach ($array as $value) {
        $id = strtolower($value);

        // Afficher tous les éléments radio
        $radioBtn .= "<li><input type='radio' id='".$id."' name='gender'><label for='".$id."'>".$value."</label></li>";
    }
    return "<ul style='list-style:none'>
                ".$radioBtn."
            </ul>";
}

echo afficherRadio($elements);