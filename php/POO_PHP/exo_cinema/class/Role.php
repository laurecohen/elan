<?php

class Role{
    private $nomRole;

    public function __construct($nomRole) {
        $this->nomRole = $nomRole;
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
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->nomRole;
    }
}