<?php

class Film{
    private $titre;
    private $dateSortie;
    private $duree;
    private $synopsis;
    private $genre;
    private $real;

    public function __construct(
        $titre = "", 
        $dateSortie = "", 
        $duree = "", 
        $synopsis = "", 
        $genre = "",
        $real = "")
    {
        $this->titre = $titre;
        $this->dateSortie = new DateTime($dateSortie);
        $this->duree = $duree;
        $this->synopsis = $synopsis;
        $this->genre = new Genre($genre);
        $this->real = $real;
    }

    // Getter
    public function getTitre()
    {
        return $this->titre;
    }
  
    public function getDateSortie()
    {
        return $this->dateSortie;
    }
    
    public function getDuree()
    {
        return $this->duree;
    }
    
    public function getDureeH(){
        return date('H:i', mktime(0, $this->getDuree()));
    }

    public function getSynopsis()
    {
        return $this->synopsis;
    }   

    public function getGenre()
    {
        return $this->genre;
    }

    public function getReal(){
        return $this->real;
    }

    // Setter
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
        return $this;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
        return $this;
    }

    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
        return $this;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    public function setReal($real)
    {
        $this->real = $real;
        return $this;
    }

    // __toString()
    public function __toString()
    {
        return "Le film ".$this->getTitre().
            " sorti le ".$this->getDateSortie()->format('d/m/Y').
            " dure ".$this->getDureeH().
            " et appartient au genre : ".$this->getGenre().
            "<br> ".$this->getReal();
    }

}