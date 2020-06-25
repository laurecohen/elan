<?php

include 'class/Film.php';
include 'class/Genre.php';
include 'class/Realisateur.php';

// Genres
$sf = new Genre("Science-fiction");
$av = new Genre("Aventure");

// Réalisateurs
$lucas = new Realisateur("LUCAS", "Georges", "14-05-1944");
$scott = new Realisateur("SCOTT", "Ridley", "30-11-1937");
$verbinski = new Realisateur("VERBINSKI", "Gore", "16-03-1964");

// Films
$sw = new Film("Star Wars IV : un nouvel espoir", "19-10-1977", 121, "Dans une lointaine galaxie...", $sf, $lucas);
$blade = new Film("Blade Runner", "15-09-1982", 117, "Blade !", $sf, $scott);
$pirates = new Film("Pirates des Caraïbes : La Malédiction du Black Pearl", "13-08-2003", 142, "Jack !", $av, $verbinski);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>
        <title>Document</title>
    </head>
    <body>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>TITRE</th>
                    <th>DATE DE SORTIE</th>
                    <th>REALISATEUR</th>
                    <th>GENRE</th>
                    <th>DUREE</th>
                </tr>
            </thead>
            <tbody>
                <?= $sw ?>
                <?= $blade ?>
                <?= $pirates ?>
            </tbody>
        </table>
    </body>
</html>


<?php 
// var_dump($sw);
// var_dump($blade);
// var_dump($pirates);
?>