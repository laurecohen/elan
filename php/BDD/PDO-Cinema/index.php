<?php

require_once "controllers/FilmController.php";

$ctrlFilm = new FilmController(); 

if(isset($_GET['action'])){

    switch($_GET['action']){
        case "listFilms" : $ctrlFilm->findAll(); break;
        case "detailFilm" : $ctrlFilm->findOneById($_GET['id']); break;
    }
}else {
    $ctrlFilm->findAll();
}