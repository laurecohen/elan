<?php

$capitales = array("France"=>"Paris", "Allemagne"=>"Berlin", "USA"=>"Washington", "Italie"=>"Rome");
 
function afficherTableHTML($capitales){
    asort($capitales); // affiche le tableau dans l'ordre alphabétique des values(capitals ici)
    foreach ($capitales as $pays => $capitale){
        // Tu mets la variable capitale dans $pays
        $pays = $capitale;
    }
    return "variable pays: ".$pays."</br>";
}
 
echo afficherTableHTML($capitales);
var_dump($capitales);