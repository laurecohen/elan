<?php

/* Exercice 12
Affichage :
Salut Mickaël
Hola Virgile
Hello Marie-Claire 

Variante : ;("Marie-Claire", "Michaël", "Virgile") */


function writeMsg(){
    $prenoms = ["Mickaël" => "FRA", "Virgile" => "ESP", "Marie-Claire" => "ENG"];  
    $langues = ["FRA" => "Salut", "ENG" => "Hello", "ESP" => "Hola"];     
    ksort($prenoms); // Sort arrays by key / Variante

    foreach ($prenoms as $prenom => $key) {                 
        foreach ($langues as $cle => $msg) {
            if ($key === $cle){
                echo "$msg $prenom<br>";
            }
        }
    }
}

writeMsg();