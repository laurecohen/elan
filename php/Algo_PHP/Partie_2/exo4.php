<?php

/* Afficher le tableau :
$capitales = array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome"); 
Le nom du pays s’affichera en majuscule et que le tableau est trié par ordre alphabétique du nom de pays
Ajouter un lien */

$capitales = array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome");

function afficherTableHTML($array){
    asort($array);
    
    foreach ($array as $key => $value) {
        $url = "'https://fr.wikipedia.org/wiki/".$value."'";
        $tableContent .= "<tr><td>".strtoupper($key)."</td><td>".$value."</td><td><a href=$url target='blank'>Lien</a></td></tr>";
    }

    return "<table border='1' style='border-collapse:collapse; text-align:left'>
        <thead>
            <th>Pays</th>
            <th>Capitale</th>
            <th>Lien wiki</th>
        </thead>
        <tbody>".$tableContent."</tbody>
    </table>";
}

echo afficherTableHTML($capitales);