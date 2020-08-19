<?php 
    ob_start(); 
    $detailRealisateur = $realisateur->fetch();
?>

<h2>Éditer un réalisateur</h2>

<form action="index.php?action=editRealisateurOK&id=<?= $detailRealisateur["id_realisateur"] ?>" method="POST">
    <label for="nom_realisateur">Nom réalisateur</label>
    <input class="uk-input" type="text" name="nom_realisateur" id="nom_realisateur" value=<?= $detailRealisateur["nom_realisateur"] ?> required>

    <label for="prenom_realisateur">Prénom réalisateur</label>
    <input class="uk-input" type="text" name="prenom_realisateur" id="prenom_realisateur" value=<?= $detailRealisateur["prenom_realisateur"] ?> required>

    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
        <label><input class="uk-radio" type="radio" name="sexe_realisateur" value="masculin" <?= $detailRealisateur['sexe_realisateur'] == "masculin" ? 'checked="checked"' : "" ?>> Masculin</label>
        <label><input class="uk-radio" type="radio" name="sexe_realisateur" value="féminin" <?= $detailRealisateur['sexe_realisateur'] == "féminin" ? "checked" : "" ?>> Féminin</label>
        <label><input class="uk-radio" type="radio" name="sexe_realisateur" value="autre" <?= $detailRealisateur['sexe_realisateur'] == "autre" ? 'checked="checked"' : "" ?>> Autre</label>
    </div>

    <?=  $detailRealisateur['date_realisateur']  ?>
    <input class="uk-input" type="date" name="date_realisateur" id="date_realisateur" value="<?= $detailRealisateur['date_realisateur'] ?>">

    <input class="uk-button uk-margin-top" type="submit" value="Modifier">
</form>

<?php

$titre = "Éditer un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";