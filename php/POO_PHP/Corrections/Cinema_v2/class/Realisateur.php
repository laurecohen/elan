<?php

class Realisateur {

    // attributs de la classe Realisateur
    private $nom;
    private $prenom;
    private $dateNaissance;

    // constructeur
    public function __construct($nom = "", $prenom = "", $dateNaissance = "") {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = new DateTime($dateNaissance);
    }

    // getters et setters
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getAge() {
        $now = new DateTime();
        $interval = $this->getDateNaissance()->diff($now);
        return $interval->format('%Y');
    }

    public function __toString() {
        return $this->prenom." ".$this->nom." (".$this->getAge()." ans)";
    }
}