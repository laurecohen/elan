<?php

/* Afficher le tableau :
$capitales = array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome"); 
Le nom du pays s’affichera en majuscule et que le tableau est trié par ordre alphabétique du nom de pays */

$capitales = array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome");

function afficherTableHTML($array){
    var_dump($array);
    
    $tableContent = "";
    foreach ($array as $key => $value) {
       $tableContent .= "<tr><td>".$key."</td><td>".$value."</td></tr>";
    }

    return "<table border='1'>
        <thead>
            <th>Pays</th>
            <th>Capitale</th>
        </thead>
        <tbody>".$tableContent.
        "</tbody>
    </table>";
}

echo afficherTableHTML($capitales);