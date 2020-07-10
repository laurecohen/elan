<?php

class Voiture{
    private $marque;
    private $modele;

    public function __construct($data){
        $this->marque = $data[0];
        $this->modele = $data[1];
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

    public function __construct($data, $autonomie){
        parent::__construct($data);
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
        return parent::getInfos().". Autonomie : ".$this->getAutonomie();
    }
}

$v1 = new Voiture(array("Peugeot","408"));
$ve1 = new VoitureElec(array("BMW","I3"),100);

echo $v1->getInfos()."<br/>";
echo $ve1->getInfos()."<br/>";