<?php ob_start(); ?>

<h2>Liste des réalisateurs</h2>

<a class="uk-button uk-button-primary" href="index.php?action=addRealisateur">Ajouter un réalisateur</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM PRENOM</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($realisateur = $realisateurs->fetch()){ ?>
                <tr>
                    <td>
                        <a href="index.php?action=detailReal&id=<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["nom_realisateur"] ?> <?= $realisateur["prenom_realisateur"] ?></a>
                    </td>
                    <td>
                        <a href="index.php?action=editRealisateur&id=<?= $realisateur["id_realisateur"] ?>">Editer</a>
                        <a href="index.php?action=deleteRealisateur&id=<?= $realisateur["id_realisateur"] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "views/template.php";