<?php 

include 'class/Personne.php';

// instanciations d'objets de la classe Personne
$p1 = new Personne("MURMANN", "Mickael", "STRASBOURG");
$p2 = new Personne("GIBELLO", "Virgile", "STRASBOURG");

echo $p1->getNom()." ".$p1->getPrenom()." ".$p1->getVille(). "<br>";
echo $p2->getNom()." ".$p2->getPrenom();

// ne fonctionne pas car $nom est private dans la classe
echo $p1->nom; 

$p1->setVille("PARIS");
$p1->setPrenom("Georges");
echo $p1->getNom()." ".$p1->getPrenom()." ".$p1->getVille(). "<br>";

echo $p1;
echo $p2;