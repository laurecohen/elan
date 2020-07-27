<?php
try
{
    // Connection à MySql
    // $bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // Connection à MySql/MAMP
    $bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    // Afficher message en cas d'erreur
    die('Erreur : ' . $e->getMessage());
}