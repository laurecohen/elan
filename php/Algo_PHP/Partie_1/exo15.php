<?php

/* Exercice 15
Affichage :
Michel DUPONT a … ans
Alice DUCHEMIN a … ans */

Class Personne{
    private $_nom;
    private $_prenom;
    private $_date;
    private $_age;

    public function __construct($nom, $_prenom, $_birthdate){
        $this->_nom = $nom;
        $this->_prenom = $_prenom;
        $this->_birthdate = $_birthdate; 
    }

    public function getLastname(){
        return $this->_nom;
    }

    public function getVorname(){
        return $this->_prenom;
    }

    public function getBirthdate(){
        return $this->_birthdate;
    }

    public function getAge(){
        $age = $this->getBirthdate();
        $this->_age = date_diff(new DateTime(), new DateTime($age))->format("%y");
        return $this->_age;
    }

    public function __toString(){}
}

$p1 = new Personne("DUPONT", "Michel", "1980-02-19");
$p2 = new Personne("DUCHEMIN", "Alice", "1985-01-17");

$array = array($p1, $p2);
foreach ($array as $key) {
    echo $key->getVorname()." ".$key->getLastname()." a ".$key->getAge()." ans<br>";
}