<?php

class Distribution{
    private $film;
    private $acteur;
    private $role;

    public function __construct(Film $film = null, Acteur $acteur = null, Role $role = null){
        $this->film = $film;
        $this->acteur = $acteur;
        $this->role = $role;
        $acteur->addDistribution($this);
        $film->addDistribution($this);
        $role->addDistribution($this);
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
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->film.", ".$this->acteur.", ".$this->role;
    }
}