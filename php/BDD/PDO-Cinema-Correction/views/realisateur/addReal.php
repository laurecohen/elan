<?php ob_start(); ?>

<h2>Ajouter un réalisateur</h2>

<form action="index.php?action=addRealisateurOK" method="POST">
    <label for="nom_realisateur">Nom réalisateur</label>
    <input class="uk-input" type="text" name="nom_realisateur" id="nom_realisateur">
    <label for="prenom_realisateur">Prénom réalisateur</label>
    <input class="uk-input" type="text" name="prenom_realisateur" id="prenom_realisateur">
    <input class="uk-button uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";