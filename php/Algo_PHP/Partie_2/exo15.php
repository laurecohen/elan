<?php

/* Test email : elan@elan-formation.fr, contact@elan
Affichage : L’adresse {$url} est une adresse e-mail valide / invalide */

function validateEmail($str){
    return (filter_var($str, FILTER_VALIDATE_EMAIL)) ?  
    nl2br("L’adresse $str est une adresse e-mail valide.\n") : 
    nl2br("L’adresse $str est une adresse e-mail invalide.\n");
}

// Affichage avec fonction
$email = "elan@elan-formation.fr";
echo validateEmail($email);

// Sans fonction
$courriel = "contact@elan";
echo (filter_var($courriel, FILTER_VALIDATE_EMAIL)) ? 
    nl2br("L’adresse $courriel est une adresse e-mail valide.\n") : 
    nl2br("L’adresse $courriel est une adresse e-mail invalide.\n");