<?php 
    ob_start(); 
    $detailFilm = $film->fetch();
?>

<h2><?= $detailFilm["titre_film"]." ".$detailFilm["dureeHM"] ?></h2>
<p>
    <?= $detailFilm["resume_film"] ?>
</p>

<?php

$titre = "Détail d'un film";
$contenu = ob_get_clean();
require "views/template.php";