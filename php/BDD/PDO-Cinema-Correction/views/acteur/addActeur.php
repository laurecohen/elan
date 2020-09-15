<?php ob_start(); ?>

<h2>Ajouter un Acteur</h2>

<form action="index.php?action=addActeurOK" method="POST">
    <label for="nom_acteur">Nom acteur</label>
    <input class="uk-input" type="text" name="nom_acteur" id="nom_acteur" required>
    
    <label for="prenom_acteur">Prénom acteur</label>
    <input class="uk-input" type="text" name="prenom_acteur" id="prenom_acteur" required>
    
    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
        <label><input class="uk-radio" type="radio" name="masculin"> Masculin</label>
        <label><input class="uk-radio" type="radio" name="féminin"> Féminin</label>
        <label><input class="uk-radio" type="radio" name="autre"> Autre</label>
    </div>

    <input class="uk-input" type="date" name="date_acteur" id="date_acteur">

    <input class="uk-button uk-button-primary uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un acteur";
$contenu = ob_get_clean();
require "views/template.php";