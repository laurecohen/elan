<?php 
    ob_start(); 
    require 'fonctions/rating.php';
    $detailFilm = $film->fetch();
?>

<h1><?= $detailFilm["titre_film"] ?></h1>

<div class="uk-card uk-card-default uk-grid-collapse uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container uk-width-1-3@s uk-width-1-4@l">
        <img class="uk-align-left" data-src="<?= $detailFilm['affiche_film'] ?>" alt="" width="300" height="425" uk-cover uk-img>
        <canvas width="600" height="400"></canvas>
    </div>
    <div class="uk-width-2-3@s uk-width-3-4@l">
        <div class="uk-card-body">
            <ul class="uk-list uk-list-collapse">
                <li><span class="uk-text-bold">Note : </span><?= displayRating($detailFilm['note_film']) ?></li>
                <li><span class="uk-text-bold">Année : </span><?= $detailFilm['sortie'] ?></li>
                <li><span class="uk-text-bold">Durée : </span><?= $detailFilm['dureeGM'] ?></li>
                <li><span class="uk-text-bold">Réalisateur : </span><?= $detailFilm['noms_real'] ?></li>
                
                <li><span class="uk-text-bold">Casting : </span>
                    <?php 
                        $film->closeCursor();
                        $casting = $distribution->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($casting as $cast){
                    ?>
                        <span><?= $cast['noms_acteur'] ?><?= next($casting) ? ', ' : ''; ?></span>
                    <?php 
                        } 
                    ?>
                </li>
            </ul>
            <p class="uk-text-justify"><?= $detailFilm["synopsis"] ?></p>
        </div>
    </div>
</div>

<div>
    <h3>Distibution</h3>
    <ul class="uk-list uk-list-collapse uk-text-small uk-child-width-1-4@s uk-child-width-1-5@m" uk-grid>
        <?php foreach ($casting as $cast) : ?>
        
        <li><a href="">
            <div class="uk-card uk-card-default uk-card-small">
                <div class="uk-card-media-left uk-cover-container">
                    <img data-src="" width="200" height="250" alt="" uk-cover uk-img>
                    <canvas width="200" height="250"></canvas>
                </div>
                <div class="uk-card-body">
                    <span class="uk-text-bold"><?= $cast['noms_acteur'] ?></span><br>
                    <span class="uk-text-muted">Rôle : <?= $cast['nom_role'] ?></span>    
                </div>
            </div></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php

$distribution->closeCursor();

$titre = "Détail d'un film";
$contenu = ob_get_clean();
require "template.php";