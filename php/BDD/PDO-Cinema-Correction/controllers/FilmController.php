<?php

require 'bdd/DAO.php';
require_once "controllers/RealisateurController.php";
require_once "controllers/GenreController.php";

class FilmController {
    
    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT f.id_film, titre_film, annee_film, GROUP_CONCAT(nom_genre SEPARATOR ', ') AS genres, 
            CONCAT(prenom_realisateur,' ',nom_realisateur) AS rea
                    FROM film f, genre g, genre_film gf, realisateur r
                    WHERE f.id_film = gf.id_film 
                    AND g.id_genre = gf.id_genre
                    AND f.id_realisateur = r.id_realisateur
                    GROUP BY f.id_film
                    ORDER BY annee_film DESC";
        $films = $dao->executerRequete($sql);
        require 'views/film/listFilms.php';
    }
    
    /**
     * findOneById
     *
     * @param  mixed $id
     * @return void
     */
    public function findOneById($id) {

        $dao = new DAO();
        $sql = "SELECT titre_film, annee_film, TIME_FORMAT(SEC_TO_TIME(duree_film*60),'%H:%i') AS dureeHM,
                    resume_film
                    FROM film  WHERE id_film = :id 
                    ORDER BY titre_film";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        require 'views/film/detailFilm.php';
    }

    /**
     * formAddFilm
     *
     * @return void
     */
    public function formAddFilm() {
        $ctrlRealisateur = new RealisateurController();
        $ctrlGenre = new GenreController();
        $list_realisateurs = $ctrlRealisateur->getRealisateurs();
        $list_genres = $ctrlGenre->getGenres();
        require "views/film/addFilm.php";
    }
    
    /**
     * addFilm
     *
     * @param  mixed $array
     * @return void
     */
    public function addFilm($array) {
        $titre_film = filter_var ($array["titre_film"], FILTER_SANITIZE_STRING);
        $annee_film = filter_var ($array["annee_film"], FILTER_SANITIZE_NUMBER_INT);
        $duree_film = filter_var ($array["duree_film"], FILTER_SANITIZE_NUMBER_INT);
        $id_real = filter_var ($array["realisateur"], FILTER_SANITIZE_NUMBER_INT);
        
        $dao = new DAO();
        $sql = "INSERT INTO film(titre_film, annee_film, duree_film, id_realisateur) 
                    VALUES (:titre_film, :annee_film, :duree_film, :id_realisateur);";
        $dao->executerRequete($sql, [
                ":titre_film" => $titre_film,
                ":annee_film" => $annee_film,
                ":duree_film" => $duree_film,
                ":id_realisateur" => $id_real,
            ]);

        header("Location: index.php?action=listFilms");
    }
}