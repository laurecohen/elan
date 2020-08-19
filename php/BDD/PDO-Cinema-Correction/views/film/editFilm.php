<?php 
    ob_start(); 
    $detailFilm = $film->fetch(); 
?>

<h2>Éditer un film</h2>

<form action="index.php?action=editFilmOK&id=<?= $detailFilm["id_film"] ?>" method="POST">
    <label for="titre_film">Titre du film*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="titre_film" id="titre_film" value="<?= $detailFilm["titre_film"] ?>" required>

    <label for="realisateur">Nom du réalisateur*</label>
    <select class="uk-select uk-margin-bottom" name="realisateur" id="realisateur" required>
        <option disabled>Choisissez une option</option>
        <?php while($real = $list_realisateurs->fetch(PDO::FETCH_ASSOC)) : ?>
            <option value="<?= $real['id_realisateur'] ?>" <?= $detailFilm['id_realisateur'] === $real['id_realisateur'] ? 'selected' : '' ?>><?= $real['noms_real']  ?></option>
        <?php endwhile; ?>
    </select>

    <label for="annee_film" required>Année de sortie*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="annee_film" id="annee_film" value="<?= $detailFilm["annee_film"] ?>" required>

    <label for="duree_film">Durée du film (en minutes)*</label>
    <input class="uk-input uk-margin-bottom" type="text" name="duree_film" id="duree_film" value="<?= $detailFilm["duree_film"] ?>" required>

    <label for="synopsis">Synopsis</label>
    <textarea class="uk-textarea uk-margin-bottom" type="text" name="synopsis" id="synopsis"><?= $detailFilm["synopsis"] ?></textarea>

    <?php 
        $array_ids = [];
        while( $id = $list_ids->fetch(PDO::FETCH_ASSOC)){
            array_push($array_ids, $id["id_genre"]);
        }
    ?>
    <label for="genres_film">Genres</label>
    <select class="uk-select uk-margin-bottom" name="genres_film[]" id="genres_film" multiple>
        <option disabled>Choisissez une option</option>
        <?php while($genre = $list_genres->fetch(PDO::FETCH_ASSOC)) : ?>
            <option value="<?= $genre['id_genre'] ?>" <?= (in_array($genre['id_genre'], $array_ids)) ? "selected='selected'" : '' ?>><?= $genre['nom_genre'] ?></option>
        <?php endwhile; ?>
    </select>

    <label for="affiche_film">Affiche du film (url)</label>
    <input class="uk-input uk-margin-bottom" type="text" name="affiche_film" id="affiche_film" value="<?= $detailFilm["affiche_film"] ?>">

    <label for="note_film">Note (sur 5)</label>
    <input class="uk-input uk-margin-bottom" type="text" name="note_film" id="note_film" value="<?= $detailFilm["note_film"] ?>">

    <input class="uk-button uk-button-primary uk-margin-top" type="submit" value="Modifier">
</form>

<?php

$titre = "Éditer un film";
$contenu = ob_get_clean();
require "views/template.php";