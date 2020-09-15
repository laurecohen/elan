<?php

spl_autoload_register(function ($class_name) {
    require_once 'controllers/'.$class_name . '.php';
});

$ctrlFilm = new FilmController(); 
$ctrlRealisateur = new RealisateurController();
$ctrlGenre = new GenreController();
$ctrlActeur = new ActeurController();

if(isset($_GET['action'])){

    switch($_GET['action']){
        case "listFilms" : $ctrlFilm->findAll(); break;
        case "detailFilm" : $ctrlFilm->findOneById($_GET['id']); break;
        case "addFilm": $ctrlFilm->formAddFilm(); break;
        case "addFilmOK": $ctrlFilm->addFilm($_POST); break;
        case "editFilm": $ctrlFilm->formEditFilm($_GET['id']); break;
        case "editFilmOK": $ctrlFilm->editFilm($_GET['id'], $_POST); break;
        case "deleteFilm": $ctrlFilm->deleteFilm($_GET['id']); break;
        case "listReal" : $ctrlRealisateur->findAll(); break;
        case "detailReal" : $ctrlRealisateur->findOneById($_GET['id']); break;
        case "addRealisateur": $ctrlRealisateur->formAddRealisateur(); break;
        case "addRealisateurOK": $ctrlRealisateur->addRealisateur($_POST); break;
        case "editRealisateur": $ctrlRealisateur->formEditRealisateur($_GET['id']); break;
        case "editRealisateurOK": $ctrlRealisateur->editRealisateur($_GET['id'], $_POST); break;
        case "deleteRealisateur": $ctrlRealisateur->deleteRealisateur($_GET['id']); break;
        case "listGenres" : $ctrlGenre->findAll(); break;
        case "addGenre": $ctrlGenre->formAddGenre(); break;
        case "addGenreOK": $ctrlGenre->addGenre($_POST); break;
        case "editGenre": $ctrlGenre->formEditGenre($_GET['id']); break;
        case "editGenreOK": $ctrlGenre->editGenre($_GET['id'], $_POST); break;
        case "deleteGenre": $ctrlGenre->deleteGenre($_GET['id']); break;
        case "listActeurs": $ctrlActeur->findAll(); break;
        case "detailActeur" : $ctrlActeur->findOneById($_GET['id']); break;
        case "addActeur": $ctrlActeur->formAddActeur(); break;
        case "addActeurOK": $ctrlActeur->addActeur($_POST); break;
        case "editActeur": $ctrlActeur->formEditActeur($_GET['id']); break;
        case "editActeurOK": $ctrlActeur->editActeur($_GET['id'], $_POST); break;
        case "deleteActeur": $ctrlActeur->deleteActeur($_GET['id']); break;
    }
}else {
    $ctrlFilm->findAll();
}