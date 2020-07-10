<?php
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

// Reals
$r1 = new Realisateur("Lynch", "David", "now");
$r2 = new Realisateur("Jodorowsky", "Alejandro", "now");
$r3 = new Realisateur("Sharman", "Jim", "now");
$r4 = new Realisateur("Kubrick", "Stanley", "now");

// Acteurs
$a1 = new Acteur("McDowell", "Malcolm", "now");
$a2 = new Acteur("Magee", "Patrick", "now");
$a3 = new Acteur("Bates", "Michael", "now");

$a4 = new Acteur("Watts", "Naomi", "now");
$a5 = new Acteur("Harring", "Laura Elena", "now");
$a6 = new Acteur("Miller", "Ann", "now");
$a7 = new Acteur("Hopkins", "Anthony", "now");
$a8 = new Acteur("Hurt", "John", "now");
$a9 = new Acteur("Bancroft", "Anne", "now");
$a10 = new Acteur("Pullman", "Bill", "now");
$a11 = new Acteur("Arquette", "Patricia", "now");
$a12 = new Acteur("Getty", "Balthazar", "now");
$a13 = new Acteur("Nance", "Jack", "now");
$a14 = new Acteur("Stewart", "Charlotte", "now");
$a15 = new Acteur("Joseph", "Allen", "now");


// Films
$f1 = new Film("Eraserhead", "1977-09-28", 89, "Synopsis", $g2, $r1);
$f2 = new Film("El Topo", "1970-12-18", 125, "Synopsis", $g4, $r2);
$f3 = new Film("The Rocky Horror Picture Show", "1975-08-14", 100, "Synopsis", $g2, $r3);
$f4 = new Film("Mulholland Drive", "2001-10-12", 219, "Synopsis", $g5, $r1);
$f5 = new Film("Elephant Man", "1980-10-03", 124, "Synopsis", $g5, $r1);
$f6 = new Film("Lost Highway", "1997-01-15", 134, "Synopsis", $g5, $r1);
$f7 = new Film("Orange mécanique", "1971-12-19", 136, "Synopsis", $g5, $r4);

// Distribution
$d1 = new Distribution($f1, $a14, "Mary X");
$d2 = new Distribution($f1, $a13, "Henry Spencer");
$d3 = new Distribution($f1, $a15, "Bill X");
// $d4 = new Distribution($f4, $a4, "Betty Elms");
// $d5 = new Distribution($f4, $a5, "Rita");
// $d6 = new Distribution($f4, $a6, "Catherine 'Coco' Lenoix");
// $d7 = new Distribution($f5, $a7, "Docteur Frederick Treves");
// $d8 = new Distribution($f5, $a8, "John Merrick, The Elephant Man");
// $d9 = new Distribution($f5, $a9, "Mme Kendal");
// $d10 = new Distribution($f6, $a10, "Fred Madison");
// $d11 = new Distribution($f6, $a11, "Renee Madison");
// $d12 = new Distribution($f6, $a12, "Pete Dayton");
// $d13 = new Distribution($f7, $a1, "Alex");
// $d13 = new Distribution($f7, $a2, "M. Alexander");
// $d13 = new Distribution($f7, $a3, "Chef des gardiens");

include "./template/header.html";
echo $f1->getInfos();
echo $g5->getInfos();
echo $r1->getInfos();
echo $a1->getInfos();
echo $d1->getCast();
echo $d1->getFilmo();
