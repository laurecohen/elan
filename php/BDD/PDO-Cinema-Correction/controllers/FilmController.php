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
        $sql = "SELECT f.id_film, titre_film, annee_film, GROUP_CONCAT(nom_genre ORDER BY nom_genre SEPARATOR ', ') AS genres, 
                CONCAT(prenom_realisateur,' ',nom_realisateur) AS rea
                    FROM film f
                    LEFT JOIN genre_film gf ON f.id_film = gf.id_film 
                    LEFT JOIN genre g ON g.id_genre = gf.id_genre
                    LEFT JOIN realisateur r ON f.id_realisateur = r.id_realisateur
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
    public function findOneById($id, $edit = false) {

        $dao = new DAO();
        $sql = "SELECT id_film, titre_film, annee_film, note_film, affiche_film, duree_film, 
                TIME_FORMAT(SEC_TO_TIME(duree_film*60),'%H:%i') AS dureeHM, 
                synopsis, f.id_realisateur, CONCAT(prenom_realisateur,' ',nom_realisateur) AS rea
                    FROM film f
                    INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
                    WHERE id_film = :id
                    ORDER BY titre_film";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        
        if(!$edit){
            require 'views/film/detailFilm.php';
        } else {
            return $film;
        }
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
     * formEditFilm
     *
     * @param  mixed $id
     * @return void
     */
    public function formEditFilm($id) {
        $film = $this->findOneById($id, true);
        $ctrlRealisateur = new RealisateurController();
        $ctrlGenre = new GenreController();
        $list_realisateurs = $ctrlRealisateur->getRealisateurs();
        $list_genres = $ctrlGenre->getGenres();
        $list_ids = $ctrlGenre->getGenresIds($id);
        
        require "views/film/editFilm.php";
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
        $affiche_film = filter_var ($array["affiche_film"], FILTER_SANITIZE_URL);
        $synopsis = filter_var ($array["synopsis"], FILTER_SANITIZE_STRING);
        $note_film = filter_var ($array["note_film"], FILTER_SANITIZE_NUMBER_INT);
        
        $dao = new DAO();
        $sql = "INSERT INTO film(titre_film, annee_film, duree_film, affiche_film, synopsis, note_film, id_realisateur) 
                    VALUES (:titre_film, :annee_film, :duree_film, :affiche_film, :synopsis, :note_film, :id_realisateur);";
        $dao->executerRequete($sql, [
                    ":titre_film" => $titre_film,
                    ":annee_film" => $annee_film,
                    ":duree_film" => $duree_film,
                    ":affiche_film" => $affiche_film,
                    ":synopsis" => $synopsis,
                    ":id_realisateur" => $id_real,
                    ":note_film" => $note_film,
                    ]);
            
        $lastId = $dao->getBDD()->lastInsertId();
        $sql2 = "INSERT INTO genre_film(id_genre, id_film) VALUES(:id_genre, :id_film);";

        foreach ($array["genres_film"] as $genre){
            $dao->executerRequete($sql2, [
                ':id_genre' => $genre,
                ':id_film' => $lastId
            ]);
        }

        header("Location: index.php?action=listFilms");
    }

    /**
     * editFilm
     *
     * @param  mixed $id
     * @param  mixed $array
     * @return void
     */
    public function editFilm($id, $array) {
        $titre_film = filter_var ($array["titre_film"], FILTER_SANITIZE_STRING);
        $annee_film = filter_var ($array["annee_film"], FILTER_SANITIZE_NUMBER_INT);
        $duree_film = filter_var ($array["duree_film"], FILTER_SANITIZE_NUMBER_INT);
        $id_real = filter_var ($array["realisateur"], FILTER_SANITIZE_NUMBER_INT);
        $affiche_film = filter_var ($array["affiche_film"], FILTER_SANITIZE_URL);
        $synopsis = filter_var ($array["synopsis"], FILTER_SANITIZE_STRING);
        $note_film = filter_var ($array["note_film"], FILTER_SANITIZE_NUMBER_INT);

        
        $dao = new DAO();
        $sql = "UPDATE film 
                    SET titre_film = :titre_film,
                        annee_film = :annee_film,
                        duree_film = :duree_film,
                        id_realisateur = :id_realisateur,
                        affiche_film = :affiche_film,
                        note_film = :note_film,
                        synopsis = :synopsis
                    WHERE id_film = :id";
        $dao->executerRequete($sql, [
            ":id" => $id,
            ":titre_film" => $titre_film,
            ":annee_film" => $annee_film,
            ":duree_film" => $duree_film,
            ":id_realisateur" => $id_real,
            "affiche_film" => $affiche_film,
            "note_film" => $note_film,
            ":synopsis" => $synopsis,
        ]);

        $sql2 = "DELETE FROM genre_film WHERE id_film = :id";
        $dao->executerRequete($sql2, [
            ":id" => $id
        ]);

        if ($array['genres_film']){            
            $sql3 = "INSERT INTO genre_film(id_genre, id_film) VALUES(:id_genre, :id_film);";
            foreach ($array["genres_film"] as $genre){
                $dao->executerRequete($sql3, [
                    ':id_genre' => $genre,
                    ':id_film' => $id
                ]);
            }
        }

        header("Location: index.php?action=listFilms");
    }
    
    /**
     * deleteFilm
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteFilm($id) {

        $dao = new DAO();
        $sql = "DELETE FROM genre_film WHERE id_film = :id";
        $dao->executerRequete($sql, [
                ":id" => $id
            ]);
        $sql2 = "DELETE FROM film WHERE id_film = :id";
        $dao->executerRequete($sql2, [
                ":id" => $id
            ]);

        header("Location: index.php?action=listFilms");
    }
}