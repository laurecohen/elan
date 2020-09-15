<?php ob_start(); ?>

<h2>Liste des films</h2>

<a class="uk-button uk-button-primary" href="index.php?action=addFilm">Ajouter un film</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>REALISATEUR</th>
            <th>ANNEE</th>
            <th>GENRES</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>

<?php

    while($film = $films->fetch()) { ?>
        <tr>
            <td>
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a>
            </td>
            <td><?= $film["rea"] ?></td>
            <td><?= $film["annee_film"] ?></td>
            <td><?= $film["genres"] ?></td>
            <td>
                <a href="index.php?action=editFilm&id=<?= $film["id_film"] ?>">Editer</a>
                <a href="index.php?action=deleteFilm&id=<?= $film["id_film"] ?>">Supprimer</a>
            </td>
        </tr>

<?php }

$films->closeCursor();

?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$contenu = ob_get_clean();
require "views/template.php";