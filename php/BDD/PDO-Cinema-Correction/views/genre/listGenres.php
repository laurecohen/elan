<?php ob_start(); ?>

<h2>Liste des genres</h2>

<a class="uk-button uk-button-primary" href="index.php?action=addGenre">Ajouter un genre</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM GENRE</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($genre = $genres->fetch()){ ?>
                <tr>
                    <td><?= $genre["nom_genre"] ?></td>
                    <td>
                        <a href="index.php?action=editGenre&id=<?= $genre["id_genre"] ?>">Editer</a>
                        <a href="index.php?action=deleteGenre&id=<?= $genre["id_genre"] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des genres";
$contenu = ob_get_clean();
require "views/template.php";