<?php

require 'bdd/DAO.php';

class FilmController {

    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT f.id_film, titre_film, note_film, YEAR(annee_film) AS sortie, 
                    TIME_FORMAT(SEC_TO_TIME(duree_film*60),'%H:%i') AS dureeHM,
                    CONCAT(prenom_realisateur, ' ', nom_realisateur) AS noms_real,
                    GROUP_CONCAT(DISTINCT CONCAT(gf.id_genre) ORDER BY nom_genre SEPARATOR ', ') AS ids_genres,
                    GROUP_CONCAT(DISTINCT CONCAT(nom_genre) ORDER BY nom_genre SEPARATOR ', ') AS noms_genres
                FROM film f
                INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
                INNER JOIN genre_film gf ON f.id_film = gf.id_film
                INNER JOIN genre g ON gf.id_genre = g.id_genre
                GROUP BY f.id_film
                ORDER BY annee_film DESC";
        $films = $dao->executerRequete($sql);
        require 'views/listFilms.php';
    }

    public function findOneById($id) {

        $dao = new DAO();
        $sql = "SELECT titre_film, note_film, YEAR(annee_film) AS sortie, TIME_FORMAT(SEC_TO_TIME(duree_film*60),'%Hh %imin') AS dureeGM, synopsis, affiche_film,
                    CONCAT(prenom_realisateur, ' ', nom_realisateur) AS noms_real,
                    GROUP_CONCAT(DISTINCT CONCAT(c.id_acteur) ORDER BY nom_acteur SEPARATOR '#') AS ids_acteurs,
                    GROUP_CONCAT(DISTINCT CONCAT(prenom_acteur, ' ', nom_acteur) ORDER BY nom_acteur SEPARATOR '#') AS noms_acteurs,
                    GROUP_CONCAT(DISTINCT CONCAT(gf.id_genre) ORDER BY nom_genre SEPARATOR '#') AS ids_genres,
                    GROUP_CONCAT(DISTINCT CONCAT(nom_genre) ORDER BY nom_genre SEPARATOR '#') AS noms_genres,
                    GROUP_CONCAT(DISTINCT CONCAT(nom_role) ORDER BY nom_role SEPARATOR '#') AS noms_roles
                FROM film f  
                INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
                INNER JOIN casting c ON f.id_film = c.id_film
                INNER JOIN acteur a ON c.id_acteur = a.id_acteur
                INNER JOIN role ro ON c.id_role = ro.id_role
                INNER JOIN genre_film gf ON f.id_film = gf.id_film
                INNER JOIN genre g ON gf.id_genre = g.id_genre
                WHERE f.id_film = :id
                ORDER BY titre_film";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        $distribution = $this->getDistribution($id);
        require 'views/detailFilm.php';
    }

    public function getDistribution($id){
        
        $dao = new DAO();
        $sql = "SELECT f.id_film,
                    CONCAT(prenom_realisateur, ' ', nom_realisateur) AS noms_real,
                    a.id_acteur,
                    CONCAT(prenom_acteur, ' ', nom_acteur) AS noms_acteur,
                    CONCAT(nom_role) AS noms_roles
                FROM film f  
                INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
                INNER JOIN casting c ON f.id_film = c.id_film
                INNER JOIN acteur a ON c.id_acteur = a.id_acteur
                INNER JOIN role ro ON c.id_role = ro.id_role
                WHERE f.id_film = :id
                ORDER BY titre_film";
        return $dao->executerRequete($sql, [":id" =>$id]);
    }
}