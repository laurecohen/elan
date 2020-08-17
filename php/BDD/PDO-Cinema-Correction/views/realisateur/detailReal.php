<?php ob_start(); ?>

<h2><?= "aaa" ?></h2>

<?php

$titre = "Détail d'un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";