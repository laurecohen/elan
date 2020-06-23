<?php

/* Exercice 7
Affichage :
L’enfant qui a 10 ans appartient à la catégorie « Minime » */

$age = 6;
$categorie = "";

if ($age >= 6) {
    if ($age < 8){
        $categorie = "Poussin";
    } else if ($age < 10) {
        $categorie = "Pupille";
    } else if ($age < 12) {
        $categorie = "Minime";
    } else {
        $categorie = "Cadet";
    }
    echo "L’enfant qui a $age ans appartient à la catégorie « $categorie »";
} else {
    echo "La catégorie des enfants de moins de 6 ans n'est pas gérée.";
}