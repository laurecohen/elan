<?php

class Genre {

    // attributs de la classe Genre
    private $nomGenre;

    // constructeur
    public function __construct($nomGenre) {
        $this->nomGenre = $nomGenre;
    }

    // getters et setters
    public function getNomGenre() {
        return $this->nomGenre;
    }

    public function setNomGenre($nomGenre) {
        $this->nomGenre = $nomGenre;
        return $this;
    }

    // toString
    public function __toString() {
        return $this->nomGenre;
    }
}