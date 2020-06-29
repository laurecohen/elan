<?php

// Affichage : "Le film [titre] sorti le [date au format jj/mm/aaaa] dure [HH:MM] et appartient au genre : [genre]"

include "./class/Film.php";
include "./class/Genre.php";
include "./class/Real.php";

$r1 = new Real("Smith", "John", "21-01-1949");
$r2 = new Real("Doe", "Jane", "07-11-1980");

$f1 = new Film("Harry Potter", "20-01-2010", 321, "", "Horreur", $r1);
$f2 = new Film("Bilbo le Hobbit", "01-01-2000", 120, "", "Comédie", $r2);

echo $f1;