<?php 
    ob_start(); 
    $detailActeur = $acteur->fetch();
?>

<h2><?= $detailActeur["prenom_acteur"] ?> <?= $detailActeur["nom_acteur"] ?></h2>

<?php

$titre = "Détail d'un acteur";
$contenu = ob_get_clean();
require "views/template.php";