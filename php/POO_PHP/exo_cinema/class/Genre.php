<?php

class Genre{
    private $nomGenre;
    private $films;

    public function __construct(string $nomGenre = "") {
        $this->nomGenre = $nomGenre;
        $this->films = [];
    }

    /**
     * Get the value of nomGenre
     */ 
    public function getnomGenre(){
        return $this->nomGenre;
    }

    /**
     * Set the value of nomGenre
     *
     * @return  self
     */ 
    public function setnomGenre($nomGenre){
        $this->nomGenre = $nomGenre;
    }

    /**
     * Add Films in array
     *
     * @return  self
     */ 
    public function addFilm(Film $film){
        $this->films[] = $film;
    }
    
    /**
     * getInfos
     *
     * @return void
     */
    public function getFilms(){
        $listFilms = "<h4>Genre : $this</h4><ul>";
        foreach ($this->films as $film) {
            $listFilms .= "<li>".$film.", de ".$film->getReal()."</li>";
        }
        
        return $listFilms .= "</ul>";
    }
    
    /**
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->nomGenre;
    }
}