<?php

include 'class/Livre.php';

$lotr = new Livre("Seigneur des anneaux", "JRR Tolkien", 250, 20, "15-01-1980");
$hp = new Livre("Harry Potter", "JK Rowling", 158, 25, "25-08-2000");
$livre = new Livre("Mon titre");

echo $lotr;
echo $hp;
echo $livre;