<?php

class ActeurController {
    
    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT id_acteur, prenom_acteur, nom_acteur
                    FROM acteur
                    ORDER BY nom_acteur";
        $acteurs = $dao->executerRequete($sql);
        require 'views/acteur/listActeurs.php';
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
        $sql = "SELECT id_acteur, prenom_acteur, nom_acteur, sexe_acteur, date_acteur
                    FROM acteur
                    WHERE id_acteur = :id";
        $acteur = $dao->executerRequete($sql, [":id" => $id]);
        $filmographie = $this->getFilmographie($id);

        if(!$edit){
            require 'views/acteur/detailActeur.php';
        } else {
            return $acteur;
        }
    }

        /**
     * getFilmographie
     *
     * @param  mixed $id
     * @return void
     */
    public function getFilmographie($id) {

        $dao = new DAO();
        $sql = "SELECT titre_film, annee_film
                    FROM film f, acteur a
                    WHERE f.id_acteur = a.id_acteur
                    AND a.id_acteur = :id";
        $filmographie = $dao->executerRequete($sql, [":id" => $id]);
        return $filmographie;
    }
    
    /**
     * formAddActeur
     *
     * @return void
     */
    public function formAddActeur() {

        require "views/acteur/addActeur.php";
    }

    /**
     * formEditRealisateur
     *
     * @param  mixed $id
     * @return void
     */
    public function formEditActeur($id) {

        $acteur = $this->findOneById($id, true);
        require "views/acteur/editActeur.php";
    }

    /**
     * addActeur
     *
     * @param  mixed $array
     * @return void
     */
    public function addActeur($array) {

        $nom_acteur = filter_var ($array["nom_acteur"], FILTER_SANITIZE_STRING);
        $prenom_acteur = filter_var ($array["prenom_acteur"], FILTER_SANITIZE_STRING);
        $date_acteur = filter_input (INPUT_POST, 'date_acteur');
        $sexe_acteur = filter_input (INPUT_POST, 'sexe_acteur');
        
        $dao = new DAO();
        $sql = "INSERT INTO acteur(nom_acteur, prenom_acteur, date_acteur, sexe_acteur) 
                    VALUES (:nom_acteur, :prenom_acteur, :date_acteur, :sexe_acteur)";
        $dao->executerRequete($sql, [
                ":nom_acteur" => $nom_acteur,
                ":prenom_acteur" => $prenom_acteur,
                ":date_acteur" => $date_acteur,
                ":sexe_acteur" => $sexe_acteur,
            ]);

        header("Location: index.php?action=listActeurs");
    }

        /**
     * editActeur
     *
     * @param  mixed $id
     * @param  mixed $array
     * @return void
     */
    public function editActeur($id, $array) {

        $nom_acteur = filter_var ($array["nom_acteur"], FILTER_SANITIZE_STRING);
        $prenom_acteur = filter_var ($array["prenom_acteur"], FILTER_SANITIZE_STRING);
        $date_acteur = filter_input (INPUT_POST, 'date_acteur');
        $sexe_acteur = filter_input (INPUT_POST, 'sexe_acteur');

        $dao = new DAO();
        $sql = "UPDATE acteur 
                    SET nom_acteur = :nom_acteur,
                    prenom_acteur = :prenom_acteur,
                    date_acteur = :date_acteur,
                    sexe_acteur = :sexe_acteur
                    WHERE id_acteur = :id";
        $dao->executerRequete($sql, [
            ":id" => $id,
            ":nom_acteur" => $nom_acteur,
            ":prenom_acteur" => $prenom_acteur,
            ":date_acteur" => $date_acteur,
            ":sexe_acteur" => $sexe_acteur,
        ]);

        header("Location: index.php?action=listActeurs");
    }
    
    /**
     * deleteActeur
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteActeur($id) {

        $dao = new DAO();
        $sql = "DELETE FROM acteur WHERE id_acteur = :id";
        $dao->executerRequete($sql, [
                ":id" => $id
            ]);

        header("Location: index.php?action=listActeurs");
    }
}