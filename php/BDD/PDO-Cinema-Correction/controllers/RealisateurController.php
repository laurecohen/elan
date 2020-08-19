<?php

// require 'bdd/DAO.php';

class RealisateurController {
    
    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT id_realisateur, prenom_realisateur, nom_realisateur
                    FROM realisateur
                    ORDER BY nom_realisateur";
        $realisateurs = $dao->executerRequete($sql);
        require 'views/realisateur/listReal.php';
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
        $sql = "SELECT id_realisateur, prenom_realisateur, nom_realisateur, sexe_realisateur, date_realisateur
                    FROM realisateur
                    WHERE id_realisateur = :id";
        $realisateur = $dao->executerRequete($sql, [":id" => $id]);
        $filmographie = $this->getFilmographie($id);

        if(!$edit){
            require 'views/realisateur/detailReal.php';
        } else {
            return $realisateur;
        }
    }

    /**
     * getRealisateurs
     *
     * @return void
     */
    public function getRealisateurs(){
        $dao = new DAO();
        $sql = "SELECT id_realisateur, CONCAT(prenom_realisateur, ' ', nom_realisateur) AS noms_real 
                FROM realisateur 
                ORDER BY nom_realisateur";
        return $dao->executerRequete($sql);
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
                    FROM film f, realisateur r
                    WHERE f.id_realisateur = r.id_realisateur
                    AND r.id_realisateur = :id";
        $filmographie = $dao->executerRequete($sql, [":id" => $id]);
        return $filmographie;
    }
    
    /**
     * formAddRealisateur
     *
     * @return void
     */
    public function formAddRealisateur() {

        require "views/realisateur/addReal.php";
    }
    
    /**
     * formEditRealisateur
     *
     * @param  mixed $id
     * @return void
     */
    public function formEditRealisateur($id) {

        $realisateur = $this->findOneById($id, true);
        require "views/realisateur/editReal.php";
    }
    
    /**
     * addRealisateur
     *
     * @param  mixed $array
     * @return void
     */
    public function addRealisateur($array) {

        $nom_realisateur = filter_var ($array["nom_realisateur"], FILTER_SANITIZE_STRING);
        $prenom_realisateur = filter_var ($array["prenom_realisateur"], FILTER_SANITIZE_STRING);
        $date_realisateur = filter_input (INPUT_POST, 'date_realisateur');
        $sexe_realisateur = filter_input (INPUT_POST, 'sexe_realisateur');
        
        $dao = new DAO();
        $sql = "INSERT INTO realisateur(nom_realisateur, prenom_realisateur, date_realisateur, sexe_realisateur) 
                    VALUES (:nom_realisateur, :prenom_realisateur, :date_realisateur, :sexe_realisateur)";
        $dao->executerRequete($sql, [
                ":nom_realisateur" => $nom_realisateur,
                ":prenom_realisateur" => $prenom_realisateur,
                ":date_realisateur" => $date_realisateur,
                ":sexe_realisateur" => $sexe_realisateur
            ]);

        header("Location: index.php?action=listReal");
    }
    
    /**
     * editRealisateur
     *
     * @param  mixed $id
     * @param  mixed $array
     * @return void
     */
    public function editRealisateur($id, $array) {

        $nom_realisateur = filter_var ($array["nom_realisateur"], FILTER_SANITIZE_STRING);
        $prenom_realisateur = filter_var ($array["prenom_realisateur"], FILTER_SANITIZE_STRING);
        $date_realisateur = filter_input (INPUT_POST, 'date_realisateur');
        $sexe_realisateur = filter_input (INPUT_POST, 'sexe_realisateur');

        $dao = new DAO();
        $sql = "UPDATE realisateur 
                    SET nom_realisateur = :nom_realisateur,
                    prenom_realisateur = :prenom_realisateur,
                    date_realisateur = :date_realisateur,
                    sexe_realisateur = :sexe_realisateur
                    WHERE id_realisateur = :id";
        $dao->executerRequete($sql, [
            ":id" => $id,
            ":nom_realisateur" => $nom_realisateur,
            ":prenom_realisateur" => $prenom_realisateur,
            ":date_realisateur" => $date_realisateur,
            ":sexe_realisateur" => $sexe_realisateur
        ]);

        header("Location: index.php?action=listReal");
    }
    
    /**
     * deleteRealisateur
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteRealisateur($id) {

        $dao = new DAO();
        $sql = "DELETE FROM realisateur WHERE id_realisateur = :id";
        $dao->executerRequete($sql, [
                ":id" => $id
            ]);

        header("Location: index.php?action=listReal");
    }
}