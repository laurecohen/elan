<?php 
    ob_start(); 
    require 'fonctions/rating.php';
    $detailFilm = $film->fetch();
?>

<h2><?= $detailFilm["titre_film"] ?></h2>
<div class="uk-card uk-card-default uk-grid-collapse uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container uk-width-1-3@s uk-width-1-4@l">
        <img class="uk-align-left" data-src="<?= $detailFilm['affiche_film'] ?>" alt="" uk-cover uk-img>
        <canvas width="600" height="400"></canvas>
    </div>
    <div class="uk-width-2-3@s uk-width-3-4@l">
        <div class="uk-card-body">
            <ul class="uk-list uk-list-collapse">
                <li><span class="uk-text-bold">Note : </span><?= displayRating($detailFilm['note_film']) ?></li>
                <li><span class="uk-text-bold">Sortie : </span><?= $detailFilm['annee_film'] ?></li>
                <li><span class="uk-text-bold">Durée : </span><?= $detailFilm['dureeHM'] ?></li>
                <li><span class="uk-text-bold">Réalisateur : </span><?= $detailFilm['rea'] ?></li>
                
                <li><span class="uk-text-bold">Casting : </span>
                </li>
            </ul>
            <p class="uk-text-justify"><?= $detailFilm["synopsis"] ?></p>
        </div>
    </div>
</div>

<div class="uk-card uk-card-default uk-margin">
    <h3>Distibution</h3>
    <ul class="uk-list uk-list-collapse">
    </ul>
</div>

<?php

$titre = "Détail d'un film";
$contenu = ob_get_clean();
require "views/template.php";