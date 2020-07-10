<?php

class Personne{
    private $nom;
    private $prenom;
    private $dateNaissance;

    public function __construct(string $nom = "", string $prenom = "", string $dateNaissance = "now"){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = new DateTime($dateNaissance);
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(){
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom){
        $this->nom = $nom;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom(){
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    /**
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance){
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->prenom." ".$this->nom;
    }
}