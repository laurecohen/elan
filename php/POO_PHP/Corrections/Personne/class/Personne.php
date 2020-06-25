<?php

class Personne {
    
    // attributs de classe (variables d'instance)
    public $nom;
    private $prenom;
    private $ville;

    // constructeur
    public function __construct($nom, $prenom, $ville) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
    }

    // méthodes : getters (accesseurs) et setters (mutateurs)
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function __toString() {
        return $this->nom." ".$this->prenom." habite ".$this->ville;
    }
}