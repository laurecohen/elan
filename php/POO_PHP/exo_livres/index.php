<?php

include "./class/Livre.php";

// Instancier 2 livres 
$l1 = new Livre("Le Seigneur des Anneaux", "Tolkien", 250, 20, "18-02-1988");
$l2 = new Livre("Harry Potter", "J.K. Rowling", 158, 25, "13-05-2000");
$l3 = new Livre("Bilbo", "Tolkien");

$livres = array($l1, $l2, $l3);

foreach ($livres as $livre) {
    echo $livre->__toString();
}