<?php 
    ob_start(); 

    $genre = $genre->fetch(PDO::FETCH_ASSOC);
?>

<h2>Éditer un genre</h2>

<form action="index.php?action=editGenreOK&id=<?= $genre["id_genre"] ?>" method="POST">
    <label for="nom_genre">Nom genre</label>
    <input class="uk-input" type="text" name="nom_genre" id="nom_genre" value="<?= $genre["nom_genre"] ?>">
    <input class="uk-button uk-margin-top" type="submit" value="Modifier">
</form>

<?php

$titre = "Éditer un genre";
$contenu = ob_get_clean();
require "views/template.php";