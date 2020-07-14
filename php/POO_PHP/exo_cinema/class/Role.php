<?php

class Role{
    private $nomRole;
    private $acteurs;

    public function __construct(string $nomRole) {
        $this->nomRole = $nomRole;
        $this->acteurs = [];
    }

    /**
     * Get the value of nomRole
     */ 
    public function getNomRole(){
        return $this->nomRole;
    }

    /**
     * Set the value of nomRole
     *
     * @return  self
     */ 
    public function setNomRole($nomRole){
        $this->nomRole = $nomRole;
    }

    /**
     * Add Distribution to array Acteurs
     *
     * @return  self
     */ 
    public function addDistribution(Distribution $distribution){
        $this->acteurs[] = $distribution;
    }
  
    /**
     * getActeurs
     *
     * @return void
     */
    public function getActeurs(){
        $listActeurs = "<h4>Rôle : $this</h4><ul>";
  
        foreach ($this->acteurs as $distribution) {
           $listActeurs .= "<li>Casting : ".$distribution->getActeur().", dans le film : ".$distribution->getFilm()."</li>";
        }
           
        return $listActeurs .= "</ul>";
    }
  
    /**
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->nomRole;
    }
}