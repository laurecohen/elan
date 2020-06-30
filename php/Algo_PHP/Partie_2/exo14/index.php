<?php

include "./class/Voiture.php";
include "./class/VoitureElec.php";

$v1 = new Voiture("Peugeot","408");
$ve1 = new VoitureElec("BMW", "I3", 100);

echo $v1->getInfos()."<br/>";
echo $ve1->getInfos()."<br/>";