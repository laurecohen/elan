<?php
// Autoload any class file in ./class/ 
spl_autoload_register(function ($class_name) {
    include "./class/". $class_name . '.php';
});

// Genres
$g1 = new Genre("Comédie");
$g2 = new Genre("Horreur");
$g3 = new Genre("Fantastique");
$g4 = new Genre("Western");
$g5 = new Genre("Drame");
$g6 = new Genre("Thriller");
$g7 = new Genre("Musical");

// Realisateurs
$r1 = new Realisateur("Lynch", "David", "now");
$r2 = new Realisateur("Sharman", "Jim", "now");
$r3 = new Realisateur("Scott", "Ridley", "now");

// Acteurs
$a1 = new Acteur("Nance", "Jack", "now");
$a2 = new Acteur("Stewart", "Charlotte", "now");
$a3 = new Acteur("Watts", "Naomi", "now");
$a4 = new Acteur("Harring", "Laura", "now");
$a5 = new Acteur("Hopkins", "Anthony", "now");
$a6 = new Acteur("Hurt", "John", "now");
$a7 = new Acteur("Sarandon", "Susan", "now");
$a8 = new Acteur("Curry", "Tim", "now");
$a9 = new Acteur("Davis", "Geena", "now");

// Films
$f1 = new Film("Eraserhead", "1977-09-28", 89, "", $g2, $r1);
$f2 = new Film("Mulholland Drive", "2001-10-12", 146, "", $g5, $r1);
$f3 = new Film("Elephant Man", "1980-10-03", 124, "", $g5, $r1);
$f4 = new Film("The Rocky Horror Picture Show", "1975-08-14", 100, "", $g7, $r2);
$f5 = new Film("Thelma et Louise", "1991-08-29", 129, "", $g5, $r3);

// Rôles
$role1 = new Role("Henry Spencer");
$role2 = new Role("Mary X");
$role3 = new Role("Betty Elms");
$role4 = new Role("Rita");
$role5 = new Role("Dr. Frederick Treves");
$role6 = new Role("John Merrick, Elephant Man");
$role7 = new Role("Janet Weiss");
$role8 = new Role("Docteur Frank-N-Furter");
$role9 = new Role("Louise Sawyer");
$role10 = new Role("Thelma Dickinson");

// Distribution
$d1 = new Distribution($f1, $a1, $role1);
$d2 = new Distribution($f1, $a2, $role2);
$d3 = new Distribution($f2, $a3, $role3);
$d4 = new Distribution($f2, $a4, $role4);
$d5 = new Distribution($f3, $a5, $role5);
$d6 = new Distribution($f3, $a6, $role6);
$d7 = new Distribution($f4, $a7, $role7);
$d8 = new Distribution($f4, $a8, $role8);
$d9 = new Distribution($f5, $a7, $role9);
$d10 = new Distribution($f5, $a9, $role10);

include "./template/header.html";
// Affiche toutes les informations d'un film : 
// titre, année de sortie, durée, genre, liste des acteurs (Prénom Nom), réalisateur (Prénom Nom)
echo $f1->getInfos();

// Affiche tous films d'un genre précis (Titre)
echo $g5->getFilms();

// Affiche tous les films d'un réalisateur
echo $r1->getInfos();

// Affiche tous les films d'un acteur (film + nom du rôle)
echo $a7->getFilms();

// Affiche la liste des rôles d'un acteur (nom du rôle et titre du film)
echo $a7->getRoles();

// Affiche la liste des acteurs ayant incarné un rôle précis (nom + prénom de l'acteur et film dans lequel le rôle a été incarné)
echo $role6->getActeurs();