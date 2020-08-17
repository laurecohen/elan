<?php 
    ob_start(); 
    $detailRealisateur = $realisateur->fetch();
?>

<h2>Éditer un réalisateur</h2>

<form action="index.php?action=editRealisateurOK&id=<?= $detailRealisateur["id_realisateur"] ?>" method="POST">
    <label for="nom_realisateur">Nom réalisateur</label>
    <input 
        class="uk-input" 
        type="text" 
        name="nom_realisateur" 
        id="nom_realisateur" 
        value=<?= $detailRealisateur["nom_realisateur"] ?>
    >
    <label for="prenom_realisateur">Prénom réalisateur</label>
    <input 
        class="uk-input" 
        type="text" 
        name="prenom_realisateur" 
        id="prenom_realisateur"
        value=<?= $detailRealisateur["prenom_realisateur"] ?>
    >
    <input class="uk-button uk-margin-top" type="submit" value="Modifier">
</form>

<?php

$titre = "Éditer un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";