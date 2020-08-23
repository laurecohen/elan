<?php

class Message {
    private $id_message;
    private $texte;
    private $datecreation;
    private $id_sujet;
    private $id_user;
	
	public function __construct(int $id_message, string $texte, string $datecreation, int $id_sujet, int $id_user)
	{
		$this->id_message = $id_message;
		$this->setId_message($id_message);
		$this->texte = $texte;
		$this->datecreation = $datecreation;
		$this->setDatecreation($datecreation);
		$this->id_sujet = $id_sujet;
		$this->id_user = $id_user;
	}

	// Getters
    /**
     * Get the value of id_message
     */ 
    public function getId_message()
    {
        return $this->id_message;
    }

    /**
     * Get the value of texte
     */ 
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Get the value of datecreation
     */ 
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Get the value of id_sujet
     */ 
    public function getId_sujet()
    {
        return $this->id_sujet;
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
     * Set the value of id_message
     *
     * @return  self
     */ 
    public function setId_message($id_message)
    {
        $this->id_message = $id_message;

        return $this;
    }

    /**
     * Set the value of texte
     *
     * @return  self
     */ 
    public function setTexte($texte)
    {
        $this->texte = $texte;

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
		return $this->getTexte();
	}
}
