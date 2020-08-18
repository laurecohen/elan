<?php ob_start(); ?>

<h2>Ajouter un film</h2>

<form action="index.php?action=addFilmOK" method="POST">
    <label for="titre_film">Titre du film*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="titre_film" id="titre_film" required>

    <label for="realisateur">Nom du réalisateur*</label>
    <select class="uk-select uk-margin-bottom" name="realisateur" id="realisateur" required>
        <option selected disabled>Choisissez une option</option>
        <?php while($real = $list_realisateurs->fetch(PDO::FETCH_ASSOC)) : ?>
            <option value="<?= $real['id_realisateur'] ?>"><?= $real['noms_real'] ?></option>
        <?php endwhile; ?>
    </select>

    <label for="annee_film" required>Année de sortie*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="annee_film" id="annee_film">

    <label for="duree_film">Durée (en minutes)*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="duree_film" id="duree_film" required>

    <label for="genres_film">Genres</label>
    <select class="uk-select uk-margin-bottom" name="genres_film[]" id="genres_film" multiple>
        <option selected disabled>Choisissez une option</option>
        <?php while($genre = $list_genres->fetch(PDO::FETCH_ASSOC)) : ?>
            <option value="<?= $genre['id_genre'] ?>"><?= $genre['nom_genre'] ?></option>
        <?php endwhile; ?>
    </select>

    <input class="uk-button uk-button-primary uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un film";
$contenu = ob_get_clean();
require "views/template.php";