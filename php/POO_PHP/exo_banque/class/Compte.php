<?php

class Compte{
    private $libelle;
    private $solde;
    private $devise;
    private $titulaire;

    public function __construct($libelle, $solde, $devise, $titulaire){
        $this->libelle = $libelle;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $titulaire->addCompte($this);
    }

    /* Getter and Setter*/ 
    public function getLibelle(){
        return $this->libelle;
    }

    public function setLibelle($libelle){
        $this->libelle = $libelle;
        return $this;
    }

    public function getSolde(){
        return $this->solde;
    }
 
    public function setSolde($solde){
        $this->solde = $solde;
        return $this;
    }

    public function getDevise(){
        return $this->devise;
    }

    public function setDevise($devise){
        $this->devise = $devise;
        return $this;
    }

    public function getTitulaire(){
        return $this->titulaire;
    }

    public function setTitulaire($titulaire){
        $this->titulaire = $titulaire;
        return $this;
    }

    public function creditCompte($montant){
        $this->solde += $montant;
        return $this->solde;
    }

    public function debitCompte($montant){
        $this->solde -= $montant;
    }

    public function virement($cible, $montant){
        $this->debitCompte($montant);
        $cible->creditCompte($montant);
    }

    // toString
    public function __toString(){
        return $this->solde." ".$this->devise.
            " <small>(".$this->libelle.")</small>";
    }

}