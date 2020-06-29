<?php

include "./class/Compte.php";
include "./class/Titulaire.php";

// Titulaires
$smith = new Titulaire("Smith", "John", "20-07-1954", "NANCY");
$doe = new Titulaire("Doe", "Jane", "21-01-1990", "MASSY");

// Comptes
$c1 = new Compte("Courant", 1854, "EUR", $smith);
$c2 = new Compte("Livret A", 4000, "EUR", $smith);
$c3 = new Compte("Courant", 12462, "EUR", $doe);

// Opérations
$c1->creditCompte(50);
$c3->debitCompte(300);
$c1->virement($c2, 3000);

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
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>DATE DE NAISSANCE (ÂGE)</th>
                    <th>VILLE</th>
                    <th>SOLDE (COMPTE)</th>
                </tr>
            </thead>
            <tbody>
                <?= $smith ?>
                <?= $doe ?>
            </tbody>
        </table>
    </body>
</html>

<?php
// var_dump($smith);
?>