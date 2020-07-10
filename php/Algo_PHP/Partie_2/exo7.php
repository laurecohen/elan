<?php

/* Créer une fonction personnalisée permettant de générer des cases à cocher. On pourra préciser dans le tableau associatif si la case est cochée ou non.
Exemple : genererCheckbox($elements);
//où $elements est un tableau associatif clé => valeur avec 3 entrées. */

$elements = array("Choix 1" => false, "Choix 2" => true, "Choix 3" => false);

function generateCheckbox($array){
    $checkoboxes = "";
    foreach ($array as $id => $checked) {
        $state = "";
        
        // Si $checked == true, afficher "checked"
        if($checked){
            $state = "checked";
        }

        // Afficher tous les éléments checkbox
        $checkoboxes .= "<li><input type='checkbox'".$state.">".$id."</li>";
    }
    return "<ul style='list-style:none'>
                ".$checkoboxes."
            </ul>";
}

echo generateCheckbox($elements);