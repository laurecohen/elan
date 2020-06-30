<?php

/* Classe voiture
Propriétés : marque, modèle, nbPortes et vitesseActuelle,
Méthodes : demarrer(), accelerer() et stopper(), + Getter & Setter. 
La vitesse initiale de chaque véhicule instancié est de 0. Une méthode personnalisée pourra afficher toutes les informations d’un véhicule. 
BONUS: ajouter une méthode ralentir(vitesse)dans la classe Voiture. */

include "./class/Voiture.php";

$v1 = new Voiture("Peugeot", "408", 5);
$v2 = new Voiture("Citroën" , "C4", 3);

echo $v1;
echo $v2;

echo $v1->demarrer();
echo $v1->accelerer(50);

echo $v2->demarrer();
echo $v2->stopper();
echo $v2->accelerer(50);
echo $v2->demarrer();
echo $v2->accelerer(50);

echo $v1->ralentir(60);