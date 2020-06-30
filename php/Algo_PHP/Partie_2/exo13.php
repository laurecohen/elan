<?php

class Voiture {
    private $marque;
    private $modele;
    private $nbPortes;
    private $vitesseActuelle;
    private $statut;

    public function __construct($marque = "", $modele = "", $nbPortes = 0, $vitesseActuelle = 0){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->nbPortes = $nbPortes;
        $this->vitesseActuelle = $vitesseActuelle;
        $this->statut = $statut;
    }

    // Getter & Setter
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

    public function getNbPortes(){
        return $this->nbPortes;
    }

    public function setNbPortes($nbPortes){
        $this->nbPortes = $nbPortes;
    }

    public function getVitesseActuelle(){
        return $this->vitesseActuelle;
    }

    public function setVitesseActuelle($vitesseActuelle){
        $this->vitesseActuelle = $vitesseActuelle;
    }

    // Démarrer, stopper, accélérer, ralentir
    public function demarrer(){
        $this->etat = true;
        return "Le véhicule ".$this->getMarque()." ".$this->getModele()." démarre<br>";
    }
    public function stopper(){
        $this->etat = false;
        return "Le véhicule ".$this->getMarque()." ".$this->getModele()." est stoppé<br>";
    }

    public function accelerer($vitesse){
        $info = "Le véhicule ".$this->getMarque()." ".$this->getModele()." veut accélerer de ".$vitesse."<br>";
        
        if (!$this->etat){
            $info .= "Pour accélerer, il faut démarrer le véhicule ".$this->getMarque()." ".$this->getModele()." !<br>";
        } else {
            $this->vitesseActuelle += $vitesse;
            $info .= "La vitesse est du véhicule ".$this->getMarque()." ".$this->getModele()." est de ".$this->vitesseActuelle." km / h<br>";
        }
        return $info;
    }

    public function ralentir($vitesse){
        $info = "Le véhicule ".$this->getMarque()." ".$this->getModele()." veut ralentir de ".$vitesse."<br>";
        
        if (!$this->etat){
            $info .= "Pour ralentir, il faut démarrer le véhicule ".$this->getMarque()." ".$this->getModele()." !<br>";
        } else {   
            $this->vitesseActuelle -= $vitesse;
            
            // Arrêter le véhicule si la vitesse passée en paramètre est supérieure ou égale à la vitesse actuelle
            if($vitesse >= $this->vitesseActuelle){
                $this->vitesseActuelle = 0;
                $this->etat = false; 
            }
            $info .= "La vitesse est du véhicule ".$this->getMarque()." ".$this->getModele()." est de ".$this->vitesseActuelle." km / h<br>";
        }
        return $info;
    }

    // toString();
    public function __toString(){
        $statut = "";
        $statut = (($this->statut) || ($this->vitesseActuelle == 0) ? "démarré" : "à l'arrêt");

        return "<p>Nom et modèle du véhicule : ".$this->getMarque()." ".$this->getModele()."<br>
            Nombre de portes : ".$this->getNbPortes()."<br>
            Le véhicule ".$this->getMarque()." est ".$statut."<br>
            Sa vitesse actuelle est de ".$this->getVitesseActuelle()." km / h</p>";
    }
}

/* Classe voiture
Propriétés : marque, modèle, nbPortes et vitesseActuelle,
Méthodes : demarrer(), accelerer() et stopper(), + Getter & Setter. 
La vitesse initiale de chaque véhicule instancié est de 0. Une méthode personnalisée pourra afficher toutes les informations d’un véhicule. 
BONUS: ajouter une méthode ralentir(vitesse)dans la classe Voiture. */

$v1 = new Voiture("Peugeot", "408", 5);
$v2 = new Voiture("Citroën" , "C4", 3);

echo $v1;
echo $v2;

echo $v1->demarrer();
echo $v1->accelerer(50);

echo $v2->demarrer();
echo $v2->stopper();
echo $v2->accelerer(50);
echo $v2->demarrer();
echo $v2->accelerer(50);

echo $v1->ralentir(60);