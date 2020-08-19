<?php ob_start(); ?>

<h2>Ajouter un genre</h2>

<form action="index.php?action=addGenreOK" method="POST">
    <label for="nom_genre">Nom genre</label>
    <input class="uk-input" type="text" name="nom_genre" id="nom_genre">
    <input class="uk-button uk-button-primary uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un genre";
$contenu = ob_get_clean();
require "views/template.php";