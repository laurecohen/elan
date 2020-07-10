<?php

class Film{
    private $titre;
    private $anneSortie;
    private $duree;
    private $synopsis;
    private $genre;
    private $real;

    public function __construct(string $titre = "", string $anneSortie = "now", int $duree = 0, string $synopsis = "", Genre $genre = null, Realisateur $real = null){
        $this->titre = $titre;
        $this->anneSortie = new DateTime($anneSortie);
        $this->duree = $duree;
        $this->synopsis = $synopsis;
        $this->genre = $genre;
        $genre->addFilm($this);
        $this->real = $real;
        $real->addFilm($this);
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre(){
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre){
        $this->titre = $titre;
    }

    /**
     * Get the value of anneSortie
     */ 
    public function getAnneSortie(){
        return $this->anneSortie->format("Y");
    }

    /**
     * Set the value of anneSortie
     *
     * @return  self
     */ 
    public function setAnneSortie($anneSortie){
        $this->anneSortie = $anneSortie;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree(){
        return $this->duree;
    }

    /**
     * Format Duree in H:i
     */ 
    public function getfDuree() {
        return date("H:i", mktime(0, $this->getDuree())); 
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree){
        $this->duree = $duree;
    }

    /**
     * Get the value of synopsis
     */ 
    public function getSynopsis(){
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     *
     * @return  self
     */ 
    public function setSynopsis($synopsis){
        $this->synopsis = $synopsis;
    }

    /**
     * Get the value of real
     */ 
    public function getReal(){
        return $this->real;
    }

    /**
     * Set the value of real
     *
     * @return  self
     */ 
    public function setReal($real){
        $this->real = $real;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre(){
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre){
        $this->genre = $genre;
    }
    

    /**
     * getInfos
     *
     * @return void
     */
    public function getInfos(){
        // array cast + foreach
        
        return "<h4>Film : $this</h4><ul>".
            "<li>Titre: ".$this->titre."</li>".
            "<li>Année de sortie: ".$this->getAnneSortie()."</li>".
            "<li>Durée: ".$this->getfDuree()."</li>".
            "<li>Synopsis: <a href='#'>".$this->synopsis."</a></li>".
            "<li>Genre: ".$this->genre."</li>".
            "<li>Cast: ".$this->synopsis."</li>".
            "<li>Réalisateur: ".$this->real."</li></ul>";
    }

    /**
     * __toString
     *
     * @return void
     */
    //echo $f1 = new Film("Titre", "now", 0, "Synopsis");
    public function __toString(){
        return $this->titre;
    }
}