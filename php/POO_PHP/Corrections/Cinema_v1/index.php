<?php

include 'class/Film.php';
include 'class/Genre.php';

// Genres
$sf = new Genre("Science-fiction");
$av = new Genre("Aventure");

// Films
$sw = new Film("Star Wars IV : un nouvel espoir", "19-10-1977", 121, "Dans une lointaine galaxie...", $sf);
$blade = new Film("Blade Runner", "15-09-1982", 117, "Blade !", $sf);
$pirates = new Film("Pirates des Caraïbes : La Malédiction du Black Pearl", "13-08-2003", 142, "Jack !", $av);

// Affichage
echo $sw;
echo $blade;
echo $pirates;

// var_dump($sw);
// var_dump($blade);
// var_dump($pirates);