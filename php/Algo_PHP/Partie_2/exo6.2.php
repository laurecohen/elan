<?php

/* Créer une fonction personnalisée permettant de remplir une liste déroulante à partir d'un tableau de valeurs.
$elements = array("Monsieur","Madame","Mademoiselle");
alimenterListeDeroulante($elements); */

$labelsInputs = array("Monsieur","Madame","Mademoiselle");
$doc = new DOMDocument();
   
$select = $doc->createElement("select");
$doc->appendChild($select);

function createOptions($array){
    foreach ($array as $value) {
        $option = $doc->createElement("option");
        $select->appendChild($option);
    }
}
echo $doc->saveXML();
echo createOptions($labelsInputs);