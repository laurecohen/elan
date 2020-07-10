<?php

/* Ecrire une fonction personnalisée qui affiche une date en français (en toutes lettres) à partir d’une chaîne de caractère représentant une date. 
Exemple: formaterDateFr("2018-02-23"); 
Affichage : vendredi 23 février 2018 */

function formatDateFr($str){  
    setlocale(LC_ALL, "fr_FR.utf-8");
    return strftime("%A %d %B %Y", strtotime($str));
}

echo formatDateFr("2019-02-26");