<?php

class VoitureElec extends Voiture{
    private $autonomie;

    public function __construct($marque, $modele, $autonomie){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->autonomie = $autonomie;
    }

    // Getter and Setter
    public function getAutonomie(){
        return $this->autonomie;
    }

    public function setAutonomie($autonomie){
        $this->autonomie = $autonomie;
    }

    // getInfos() #2
    public function getInfos(){
        return $this->marque.", ".$this->modele.", ".$this->autonomie;
    }
}
