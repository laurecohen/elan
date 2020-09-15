<?php 
    ob_start(); 
    $detailActeur = $acteur->fetch();
?>

<h2>Éditer un acteur</h2>

<form action="index.php?action=editActeurOK&id=<?= $detailActeur["id_acteur"] ?>" method="POST">
    <label for="nom_acteur">Nom réalisateur</label>
    <input class="uk-input" type="text" name="nom_acteur" id="nom_acteur" value=<?= $detailActeur["nom_acteur"] ?> required>

    <label for="prenom_acteur">Prénom réalisateur</label>
    <input class="uk-input" type="text" name="prenom_acteur" id="prenom_acteur" value=<?= $detailActeur["prenom_acteur"] ?> required>

    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
        <label><input class="uk-radio" type="radio" name="sexe_acteur" value="masculin" <?= $detailActeur['sexe_acteur'] == "masculin" ? 'checked="checked"' : "" ?>> Masculin</label>
        <label><input class="uk-radio" type="radio" name="sexe_acteur" value="féminin" <?= $detailActeur['sexe_acteur'] == "féminin" ? "checked" : "" ?>> Féminin</label>
        <label><input class="uk-radio" type="radio" name="sexe_acteur" value="autre" <?= $detailActeur['sexe_acteur'] == "autre" ? 'checked="checked"' : "" ?>> Autre</label>
    </div>

    <?=  $detailActeur['date_acteur']  ?>
    <input class="uk-input" type="date" name="date_acteur" id="date_acteur" value="<?= $detailActeur['date_acteur'] ?>">

    <input class="uk-button uk-button-primary uk-margin-top" type="submit" value="Modifier">
</form>

<?php

$titre = "Éditer un acteur";
$contenu = ob_get_clean();
require "views/template.php";