<?php

/* $nomsInput = array("Nom","Prénom","Ville");afficherInput($nomsInput); */

$labelsInputs = array("lastname" => "Nom", "vorname" => "Prénom", "town" => "Ville");

function displayForm($array){
    $formInputs = "";
    
    foreach ($array as $id => $value) {
        $formInputs .= "<label for='".$id."'>".$value."</label>
            <input type='text' id='".$id."' style='display:block'>";
    }

    return "<form>".$formInputs."</form>";
}

echo displayForm($labelsInputs);