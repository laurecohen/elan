<?php ob_start(); ?>

<h2>Ajouter un réalisateur</h2>

<form action="index.php?action=addRealisateurOK" method="POST">
<label for="nom_realisateur">Nom acteur</label>
    <input class="uk-input" type="text" name="nom_realisateur" id="nom_realisateur" required>
    
    <label for="prenom_realisateur">Prénom acteur</label>
    <input class="uk-input" type="text" name="prenom_realisateur" id="prenom_realisateur" required>
    
    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
        <label><input class="uk-radio" type="radio" name="masculin"> Masculin</label>
        <label><input class="uk-radio" type="radio" name="féminin"> Féminin</label>
        <label><input class="uk-radio" type="radio" name="autre"> Autre</label>
    </div>

    <input class="uk-input" type="date" name="date_realisateur" id="date_realisateur">

    <input class="uk-button uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";