<?php 
    ob_start();

    if(!empty($_POST)){
        // Le bouton Submit a été pressé
        echo 'form submitted';
        var_dump($_POST);
        
        $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
        $sortie = filter_input(INPUT_POST, 'sortie', FILTER_SANITIZE_STRING);
        $duree = filter_input(INPUT_POST, 'duree', FILTER_VALIDATE_REGEXP, [
            "options" => ["regexp" => "/\b[0-9]{3}\b/"]
        ]);
        $affiche = filter_input(INPUT_POST, 'affiche', FILTER_SANITIZE_ENCODED);
        $realisateur = filter_input(INPUT_POST, 'realisateur', FILTER_SANITIZE_STRING);
        $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_STRING);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_STRING);

        // Champs obligatoires
        if($titre && $sortie && $realisateur){
            $ctrlFilm = new FilmController();

            //realisateur = l'id / value
            $ctrlFilm->setFilm($titre, $sortie, $realisateur);
            // if les autres set les autres


        } else echo "Vous devez remplir tous les champs obligatoires";
        
    }
?>

<h1>Ajouter un film</h1>
<form method="post" action="index.php?action=ajouterFilm" class="uk-form-stacked uk-grid-row-small uk-grid-column-medium" uk-grid>
    <div class="uk-width-1-2@s uk-grid-small">
        <label class="uk-form-label" for="titre">Titre du film *</label>
        <div>
            <input type="text" name="titre" id="titre" class="uk-input">
        </div>
    </div>
    <div class="uk-width-1-4@s uk-grid-small">
        <label class="uk-form-label" for="sortie">Date de sortie</label>
        <div>
            <input type="text" name="sortie" id="sortie" class="uk-input" placeholder="yyyy-mm-dd">
        </div>
    </div>
    <div class="uk-width-1-4@s uk-grid-small">
        <label class="uk-form-label" for="duree">Durée du film (en minutes)</label>
        <div>
            <input type="text" name="duree" id="duree" class="uk-input">
        </div>
    </div>
    <div class="uk-width-1-2@s uk-grid-small">
        <label class="uk-form-label" for="affiche">Affiche (url)</label>
        <div>
            <input type="text" name="affiche" id="affiche" class="uk-input">
        </div>
    </div>
    <div class="uk-width-1-2@s uk-grid-small">
        <label class="uk-form-label" for="realisateur">Réalisateur *</label>
        <div>
            <select name="realisateur" class="uk-select">
                <option selected disabled>Choisissez une option</option>
                <?php while($real = $list_realisateurs->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?= $real['id_realisateur'] ?>"><?= $real['noms_real'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
    </div>
    <div class="uk-width-1-2@s uk-grid-small">
        <label class="uk-form-label" for="synopsis">Synopsis</label>
        <div>
            <textarea type="text" name="synopsis" id="synopsis" class="uk-textarea"></textarea>
        </div>
    </div>
    <div class="uk-width-1-4@s uk-grid-small">
        <label class="uk-form-label" for="note">Note</label>
        <div>
            <input type="text" name="note" id="note" class="uk-input">
        </div>
        <div class="uk-form-controls uk-form-controls-text uk-margin">
            <label><input class="uk-radio" type="radio" name="note_film" value="1"> 1 </label>
            <label><input class="uk-radio" type="radio" name="note_film" value="2"> 2 </label>
            <label><input class="uk-radio" type="radio" name="note_film" value="3"> 3 </label>
            <label><input class="uk-radio" type="radio" name="note_film" value="4"> 4 </label>
            <label><input class="uk-radio" type="radio" name="note_film" value="5"> 5 </label>
        </div>
    </div>

    <div class="uk-width-1-2@s">
        <input type="submit" name="submit" class="uk-margin uk-button uk-button-default uk-button-secondary" value="Submit">
    </div>
</form>

<?php

$list_realisateurs->closeCursor();

$titre = "Ajouter un film";
$contenu = ob_get_clean();
require "template.php";