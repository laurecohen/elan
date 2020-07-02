<?php

class Voiture{
    private $marque;
    private $modele;

    public function __construct($marque,$modele){
        $this->marque = $marque;
        $this->modele = $modele;
    }

    // Getter and Setter
    public function getMarque(){
        return $this->marque;
    }

    public function setMarque($marque){
        $this->marque = $marque;
    }
 
    public function getModele(){
        return $this->modele;
    }

    public function setModele($modele){
        $this->modele = $modele;
    }

    // getInfos()
    public function getInfos(){
        return $this->getMarque().", ".$this->getModele();
    }
}

class VoitureElec extends Voiture{
    private $autonomie;

    public function __construct($marque,$modele,$autonomie){
        parent::__construct($marque,$modele);
        $this->autonomie = $autonomie;
    }

    public function getAutonomie(){
        return $this->autonomie;
    }

    public function setAutonomie($autonomie){
        $this->autonomie = $autonomie;
    }

    // getInfos()2
    public function getInfos(){
        return $this->getMarque().", ".$this->getModele().", ".$this->getAutonomie();
    }
}

$v1 = new Voiture("Peugeot","408");
$ve1 = new VoitureElec("BMW","I3",100);

echo $v1->getInfos()."<br/>";
echo $ve1->getInfos()."<br/>";