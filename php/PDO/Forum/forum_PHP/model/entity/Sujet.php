<?php


class Sujet {
    private $id_sujet;
    private $titre;
    private $datecreation;
    private $verrouille;
    private $resolu;
    private $id_user;

    public function __construct(int $id_sujet, string $titre, string $datecreation, int $verrouille, int $resolu, int $id_user)
    {
        $this->id_sujet = $id_sujet;
        $this->setId_sujet($id_sujet);
        $this->titre = $titre;
        $this->datecreation = $datecreation;
        $this->setDatecreation($datecreation);
        $this->verrouille = $verrouille;
        $this->resolu = $resolu;
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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Get the value of datecreation
     */ 
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Get the value of verrouille
     */ 
    public function getverrouille()
    {
        return $this->verrouille;
    }

    /**
     * Get the value of resolu
     */ 
    public function getresolu()
    {
        return $this->resolu;
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
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Set the value of datecreation
     *
     * @return  self
     */ 
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Set the value of verrouille
     *
     * @return  self
     */ 
    public function setVerrouille($verrouille)
    {
        $this->verrouille = $verrouille;

        return $this;
    }

    /**
     * Set the value of resolu
     *
     * @return  self
     */ 
    public function setResolu($resolu)
    {
        $this->resolu = $resolu;

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

    // toString 
    public function __toString()
    {
        return $this->getTitre();
    }
}