<?php

class GenreController {
    
    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT id_genre, nom_genre
                    FROM genre
                    ORDER BY nom_genre";
        $genres = $dao->executerRequete($sql);
        require 'views/genre/listGenres.php';
    }

    /**
     * findOneById
     *
     * @param  mixed $id
     * @param  mixed $edit
     * @return void
     */
    public function findOneById($id, $edit = false) {

        $dao = new DAO();
        $sql = "SELECT id_genre, nom_genre 
                    FROM genre
                    WHERE id_genre = :id";
        $genre = $dao->executerRequete($sql, [":id" => $id]);

        if(!$edit){
            header("Location: index.php?action=listGenres");
        } else {
            return $genre;
        }
    }

    /**
     * getGenres
     *
     * @return void
     */
    public function getGenres(){
        $dao = new DAO();
        $sql = "SELECT id_genre, nom_genre 
                FROM genre 
                ORDER BY nom_genre";
        return $dao->executerRequete($sql);
    }
        
    /**
     * getGenresById
     *
     * @return void
     */
    public function getGenresIds($id){
        $dao = new DAO();
        $sql = "SELECT id_genre 
                    FROM genre_film
                    WHERE id_film = :id";
        return $dao->executerRequete($sql, [":id" => $id]);
    }
        
    /**
     * formAddGenre
     *
     * @return void
     */
    public function formAddGenre() {

        require "views/genre/addGenre.php";
    }
  
    /**
     * formEditGenre
     *
     * @param  mixed $id
     * @return void
     */
    public function formEditGenre($id) {

        $genre = $this->findOneById($id, true);
        require "views/genre/editGenre.php";
    }

    /**
     * addGenre
     *
     * @param  mixed $array
     * @return void
     */
    public function addGenre($array) {

        $nom_genre = filter_var ($array["nom_genre"], FILTER_SANITIZE_STRING);
        
        $dao = new DAO();
        $sql = "INSERT INTO genre(nom_genre) 
                    VALUES (:nom_genre)";
        $dao->executerRequete($sql, [
                ":nom_genre" => $nom_genre
            ]);

        header("Location: index.php?action=listGenres");
    }

    /**
     * editGenre
     *
     * @param  mixed $id
     * @param  mixed $array
     * @return void
     */
    public function editGenre($id, $array) {

        $nom_genre = filter_var ($array["nom_genre"], FILTER_SANITIZE_STRING);

        $dao = new DAO();
        $sql = "UPDATE genre 
                    SET nom_genre = :nom_genre
                    WHERE id_genre = :id";
        $dao->executerRequete($sql, [
            ":id" => $id,
            ":nom_genre" => $nom_genre,
        ]);

        header("Location: index.php?action=listGenres");
    }

    /**
     * deleteGenre
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteGenre($id) {

        $dao = new DAO();
        $sql = "DELETE FROM genre WHERE id_genre = :id";
        $dao->executerRequete($sql, [
                ":id" => $id
            ]);

        header("Location: index.php?action=listGenres");
    }
}