<?php

class Distribution{
    private $film;
    private $acteur;
    private $role;

    public function __construct(Film $film = null, Acteur $acteur = null, string $role = ""){
        $this->film = $film;
        $this->acteur = $acteur;
        $this->role = $role;
    }

    /**
     * Get the value of film
     */ 
    public function getFilm(){
        return $this->film;
    }

    /**
     * Set the value of film
     *
     * @return  self
     */ 
    public function setFilm($film){
        $this->film = $film;
    }

    /**
     * Get the value of acteur
     */ 
    public function getActeur(){
        return $this->acteur;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */ 
    public function setActeur($acteur){
        $this->acteur = $acteur;
    }

    /**
     * Get the value of role
     */ 
    public function getRole(){
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role){
        $this->role = $role;
    }

    /**
     * getCast
     *
     * @return void
     */
    public function getCast(){
        return "<h4>Distribution : $this</h4>
            <ul>".
                "<li>".$this->acteur.", ".$this->role."</li>".
            "</ul>";
    }

    /**
     * getFilmo
     *
     * @return void
     */
    public function getFilmo(){
        return "<h4>Filmographie : $this->acteur</h4>
            <ul>".
                "<li>".$this.", ".$this->role."</li>".
            "</ul>";
    }
    
    /**
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->film."";
    }
}