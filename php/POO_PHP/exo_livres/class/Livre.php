<?php

class Livre{
    private $titre;
    private $auteur;
    private $nbPages;
    private $prix;
    private $dateSortie;

    public function __construct($titre = "(N/A)", $auteur = "(N/A)", $nbPages = "(N/A)", $prix = "(N/A)", $dateSortie = "")
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
        $this->prix = $prix;
        $this->dateSortie = new DateTime($dateSortie);
    }

    // Getter
    public function getTitre()
    {
            return $this->titre;
    }

    public function getAuteur()
    {
            return $this->auteur;
    }

    public function getNbPages()
    {
        return $this->nbPages;
    }

    public function getPrix()
    {
            return $this->prix;
    }
    
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    // Setter
    public function setTitre($titre)
    {
            $this->titre = $titre;
            return $this;
    }

    public function setAuteur($auteur)
    {
            $this->auteur = $auteur;
            return $this;
    }

    public function setNbPages($nbPages)
    {
            $this->nbPages = $nbPages;
            return $this;
    }

    public function setPrix($prix)
    {
            $this->prix = $prix;
            return $this;
    }

    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
        return $this;
    }

    // __toString()
    public function __toString()
    {
            return "Le livre « ".$this->getTitre()." »".
                " écrit par ".$this->getAuteur().
                " possède ".$this->getNbPages()." pages,".
                " coûte ".$this->getPrix()."€".
                " et est sorti le ".$this->getDateSortie()->format('d/m/Y')."<br>";
    }

}