<?php

/* Exercice 4
Affichage : La phrase « Engage le jeu que je le gagne » est palindrome */

$str = "Engage le jeu que je le gagne";
$str2 = str_replace(" ", "", $str); 
$str2 = strtolower($str2);

if ($str2 === strrev($str2)) {
    echo "La phrase « $str » est un palindrome";
} else {
    echo "La phrase « $str » n'est pas un palindrome";
}