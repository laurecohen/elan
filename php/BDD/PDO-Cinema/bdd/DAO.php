<?php

class DAO {

    private $bdd;

    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
    }

    function getBDD() :PDO{
        try{
            return $this->bdd;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    public function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->bdd->query($sql);
        }
        else {
            $resultat = $this->bdd->prepare($sql);
            $resultat->execute($params);
        }
        return $resultat;
    }
}