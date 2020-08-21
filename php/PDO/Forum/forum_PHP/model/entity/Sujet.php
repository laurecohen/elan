<?php

class Sujet {
    private $id_sujet;
    private $titre_sujet;
    private $date_creation;
    private $est_verrouille;
    private $est_resolu;
    private $id_user;

    public function __construct(int $id_sujet, string $titre_sujet, string $date_creation, int $est_verrouille, int $est_resolu, int $id_user)
    {
        $this->id_sujet = $id_sujet;
        $this->setId_sujet($id_sujet);
        $this->titre_sujet = $titre_sujet;
        $this->date_creation = $date_creation;
        $this->setDate_creation($date_creation);
        $this->est_verrouille = $est_verrouille;
        $this->est_resolu = $est_resolu;
        $this->id_user = $id_user;
    }

    // Getters
    /**
     * Get the value of id_sujet
     */ 
    public function getId_sujet()
    {
        return $this->id_sujet;
    } 

    /**
     * Get the value of titre_sujet
     */ 
    public function getTitre_sujet()
    {
        return $this->titre_sujet;
    }

    /**
     * Get the value of date_creation
     */ 
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Get the value of est_verrouille
     */ 
    public function getEst_verrouille()
    {
        return $this->est_verrouille;
    }

    /**
     * Get the value of est_resolu
     */ 
    public function getEst_resolu()
    {
        return $this->est_resolu;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    // Setters
    /**
     * Set the value of id_sujet
     *
     * @return  self
     */ 
    public function setId_sujet($id_sujet)
    {
        $this->id_sujet = $id_sujet;

        return $this;
    }

    /**
     * Set the value of titre_sujet
     *
     * @return  self
     */ 
    public function setTitre_sujet($titre_sujet)
    {
        $this->titre_sujet = $titre_sujet;

        return $this;
    }

    /**
     * Set the value of date_creation
     *
     * @return  self
     */ 
    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Set the value of est_verrouille
     *
     * @return  self
     */ 
    public function setEst_verrouille($est_verrouille)
    {
        $this->est_verrouille = $est_verrouille;

        return $this;
    }

    /**
     * Set the value of est_resolu
     *
     * @return  self
     */ 
    public function setEst_resolu($est_resolu)
    {
        $this->est_resolu = $est_resolu;

        return $this;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}