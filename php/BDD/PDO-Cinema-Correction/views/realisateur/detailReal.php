<?php 
    ob_start(); 
    $detailReal = $realisateur->fetch();
?>

<h2><?= $detailReal["prenom_realisateur"] ?> <?= $detailReal["nom_realisateur"] ?></h2>

<?php

$titre = "Détail d'un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";