<?php

/* Ecrire une fonction personnalisée qui affiche une date en français (en toutes lettres) à partir d’une chaîne de caractère représentant une date. 
Exemple: formaterDateFr("2018-02-23"); 
Affichage : vendredi 23 février 2018 */

function formatDateFr($str){    
    // Stocker la traduction dans un tableau clé(en) => value(fr)
    $days = array("Monday" => "Lundi", "Tuesday" => "Mardi", "Wednesday" => "Mercredi", "Thursday" => "Jeudi", "Friday" => "Vendredi", "Saturday" => "Samedi", "Sunday" => "Dimanche");
    $months = array("January" => "Janvier", "February" => "Février", "March" => "Mars", "April" => "Avril", "May" => "Mai", 
    "June" => "Juin", "July" => "Juillet", "August" => "Août", "September" => "Septembre", "November" => "Novembre", "December" => "Décembre");

    $dateStr = date("l j F Y", strtotime($str)); 
    
    // Remplacer les jours(l) et les mois(F)
    foreach ($days as $day_en => $day_fr) {
        foreach ($months as $month_en => $month_fr) {
            $dateStr = str_replace($day_en, $day_fr, str_replace($month_en, $month_fr, $dateStr));
        }
    }
    return $dateStr;
}

echo formatDateFr("now");