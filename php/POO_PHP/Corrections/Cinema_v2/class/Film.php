<?php 

class Film {

    // attributs de la classe Film
    private $titre;
    private $dateSortie;
    private $duree;
    private $synopsis;
    private $genre;
    private $realisateur;

    // constructeur
    public function __construct($titre = "", $dateSortie = "", $duree = 0, $synopsis = "", Genre $genre, Realisateur $realisateur) {
        $this->titre = $titre;
        $this->dateSortie = new DateTime($dateSortie);
        $this->duree = $duree;
        $this->synopsis = $synopsis;
        $this->genre = $genre;
        $this->realisateur = $realisateur;
    }

    // getters et setters
    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function getDateSortie() {
        return $this->dateSortie;
    }

    public function setDateSortie($dateSortie) {
        $this->dateSortie = $dateSortie;
        return $this;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function setDuree($duree) {
        $this->duree = $duree;
        return $this;
    }

    public function getDureeHeures() {
        return date("H:i", mktime(0, $this->getDuree())); 
    }

    public function getSynopsis() {
        return $this->synopsis;
    }

    public function setSynopsis($synopsis) {
        $this->synopsis = $synopsis;
        return $this;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
        return $this;
    }

    public function getRealisateur() {
        return $this->realisateur;
    }

    public function setRealisateur($realisateur) {
        $this->realisateur = $realisateur;
        return $this;
    }

    // toString
    public function __toString() {
        return "<tr>
                    <td>".$this->titre."</td>
                    <td>".$this->dateSortie->format("d-m-Y")."</td>
                    <td>".$this->getRealisateur()."</td>
                    <td>".$this->genre."</td>
                    <td>".$this->getDureeHeures()."</td>
                </tr>";
    }
}