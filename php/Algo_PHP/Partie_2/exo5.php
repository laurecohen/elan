<?php

/* $nomsInput = array("Nom","Prénom","Ville");afficherInput($nomsInput); */

$labelsInputs = array("Lastname" => "Nom", "Vorname" => "Prénom", "Town" => "Ville");

function displayForm($array){
    $formInputs = "";
    
    foreach ($array as $id => $value) {
        $formInputs .= "<label for='".strtolower($id)."'>".$value."</label>
            <input type='text' id='".strtolower($id)."' style='display:block'>";
    }

    return "<form>".$formInputs."</form>";
}

echo displayForm($labelsInputs);