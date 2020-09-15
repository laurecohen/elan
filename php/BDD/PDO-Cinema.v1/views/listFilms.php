<?php 
    ob_start(); 

    require 'fonctions/rating.php';
?>

<h1>Liste des films</h1>

<div class="uk-flex uk-flex-between uk-flex-middle">
    <p>Nombre de films : <?= $films->rowCount() ?></p>
    <a href="index.php?action=ajouterFilm" class="uk-button uk-button-default uk-button-primary">Nouveau film</a>
</div>

<table class="uk-table uk-table-middle uk-table-divider uk-table-hover uk-table-responsive">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Note</th>
            <th>Réalisateur</th>
            <th>Année</th>
            <th>Durée</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php while($film = $films->fetch()) : ?>
            <tr>
                <td class="uk-table-link"><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a></td>
                <td><?= displayRating($film['note_film']) ?></td>
                <td><?= $film['noms_real'] ?></td>
                <td><?= $film["sortie"] ? $film["sortie"] : '-' ?></td>
                <td><?= $film['dureeHM'] ? $film['dureeHM'] : '-' ?></td>
                <td><?= $film['noms_genres'] ?></td>
            </tr>
            <?php endwhile; ?>
    </tbody>
</table>

<?php

$films->closeCursor();

$titre = "Liste des films";
$contenu = ob_get_clean();
require "template.php";