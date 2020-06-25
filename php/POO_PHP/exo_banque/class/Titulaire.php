<?php

class Titulaire{
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $ville;
    private $comptes;

    public function __construct($nom = "", $prenom = "", $dateNaissance = "", $ville = ""){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = new DateTime($dateNaissance);
        $this->ville = $ville;
        $this->comptes = [];
    }

    /* Getter and Setter */
    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }
    
    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    public function getAge(){
        return date_diff(new DateTime(), $this->getDateNaissance())->format("%y");
    }

    public function setDateNaissance($dateNaissance){
        $this->dateNaissance = $dateNaissance;
        return $this;
    }
    
    public function getVille(){
        return $this->ville;
    }

    public function setVille($ville){
        $this->ville = $ville;
        return $this;
    }

    public function getComptes(){
        return $this->comptes;
    }

    public function addCompte($compte){
        $this->comptes[] = $compte;
    }

    public function setComptes($comptes){
        $this->comptes = $comptes;
        return $this;
    }

    // toString
    public function __toString(){
        $comptesTitulaire = "";
        foreach ($this->comptes as $compte) {
            $comptesTitulaire .= $compte."<br>";
        }

        return "<tr>
            <td>".$this->nom."</td>
            <td>".$this->prenom."</td>
            <td>".$this->dateNaissance->format('d/m/Y')." (".$this->getAge()." ans)</td>
            <td>".$this->ville."</td>
            <td>".$comptesTitulaire."</td>
        </tr>";
    }
}