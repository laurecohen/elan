<?php include 'template/header.html'; ?>

<h1>EXERCICE 13 - 14</h1>
<a href="./">Retour</a>
<p>Créer une classe Voiture possédant les propriétés suivantes : <code>marque, modèle, nbPortes et vitesseActuelle</code> ainsi que les méthodes <code>demarrer( ), accelerer( ) et stopper( )</code> en plus des accesseurs (get) et mutateurs (set) traditionnels. La vitesse initiale de chaque véhicule instancié est de 0. Une méthode personnalisée pourra afficher toutes les informations d’un véhicule. <br>
<code>v1 ➔ "Peugeot","408",5 <br>
&nbsp;v2 ➔ "Citroën","C4",3</code> <br>
Coder l’ensemble des méthodes, accesseurs et mutateurs de la classe tout en réalisant des jeux de tests pour vérifier la cohérence de la classe Voiture.</p>
<hr class="uk-divider-icon">

<?php

/**
 * Voiture
 */
class Voiture{

    // Attributs
    private $_marque;
    private $_modele;
    private $_nbPortes;
    private $_vitesseActuelle;
    private $_etat; // démarrée ou stoppée : booléen

    private static $nbVoitures = 0; // permettra de compter le nombre de voitures instanciées

    /**
     * __construct
     *
     * @param  mixed $marque
     * @param  mixed $modele
     * @param  mixed $nbPortes
     * @return void
     */
    public function __construct(string $marque = "", string $modele = "", int $nbPortes = 0){
        $this->_marque = $marque;
        $this->_modele = $modele;
        $this->_nbPortes = $nbPortes;
        $this->_vitesseActuelle = 0; 
        $this->_etat = false; // stoppé
        self::$nbVoitures++;
        echo "$this est crée<br>";
    }

    // Getters et méthodes supplémentaires
        
    /**
     * getMarque
     *
     * @return void
     */
    public function getMarque(){
        return $this->_marque;
    }
    
    /**
     * getModele
     *
     * @return void
     */
    public function getModele(){
        return $this->_modele;
    }
    
    /**
     * getNbPortes
     *
     * @return void
     */
    public function getNbPortes(){
        return $this->_nbPortes;
    }
    
    /**
     * getEtat
     *
     * @return void
     */
    public function getEtat(){
        return ($this->_etat) ? "démarré" : "stoppé";
    }
    
    /**
     * getNbVoitures
     *
     * @return void
     */
    public static function getNbVoitures(){
        $affNb = (self::$nbVoitures > 1) ? "voitures au garage" : "voiture au garage";
        return "--- ".self::$nbVoitures." $affNb<br>";
    }
    
    /**
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return "Le véhicule ".$this->_marque." ".$this->_modele;
    }
    
    /**
     * getInfos
     *
     * @return void
     */
    public function getInfos(){
        return "Nom et modèle : $this->_marque $this->_modele<br>
                Nombre de portes : $this->_nbPortes<br>
                $this est ".$this->getEtat()."<br>
                Sa vitesse actuelle est de : $this->_vitesseActuelle km/h<br>";
    }
    
    /**
     * demarrer
     *
     * @return void
     */
    public function demarrer(){
        if($this->_etat){ // si état = vrai
            echo "$this est déjà démarré !<br>";
        }else{
            $this->_etat = true;
            echo "$this démarre<br>";
        }
    }
    
    /**
     * stopper
     *
     * @return void
     */
    public function stopper(){
        if(!$this->_etat){ // si état = false
            echo "$this est déjà à l'arrêt !<br>";
        }else{
            $this->_etat = false;
            $this->_vitesseActuelle = 0;
            echo "$this s'arrête<br>";
        }
    }
    
    /**
     * accelerer
     *
     * @param  mixed $vitesse
     * @return void
     */
    public function accelerer(int $vitesse){
        if($this->_etat){ // si le véhicule est démarré
            $this->_vitesseActuelle += $vitesse;  //$this->_vitesseActuelle = $this->_vitesseActuelle + $vitesse
            echo "$this accélère de $vitesse km/h<br>";
            echo "La vitesse actuelle est de $this->_vitesseActuelle km/h<br>";
        }else{
            echo "<p style='color:red'>Pour accélérer, $this doit être démarré !</p>";
        }
    }
    
    /**
     * ralentir
     *
     * @param  mixed $vitesse
     * @return void
     */
    public function ralentir(int $vitesse){
        if($this->_etat){
            $this->_vitesseActuelle = max($this->_vitesseActuelle - $vitesse, 0);
            echo "$this ralentit de $vitesse km/h<br>";
            echo "La vitesse actuelle est de $this->_vitesseActuelle km/h<br>";
            //$this->_vitesseActuelle -= $vitesse;  //$this->_vitesseActuelle = $this->_vitesseActuelle - $vitesse
        }else{
            echo "<p style='color:red'>Pour ralentir, $this doit rouler !</p>";
        }
    }
}

/**
 * VoitureElec
 * VoitureElec hérite (étend = extends) de la classe Voiture
 */
class VoitureElec extends Voiture{ 

    // Attributs
    private $_autonomie;

    // Constructeur (parent:: permet d'hériter du constructeur de la classe mère "Voiture")
    /**
     * __construct
     *
     * @param  mixed $marque
     * @param  mixed $modele
     * @param  mixed $nbPortes
     * @param  mixed $autonomie
     * @return void
     */
    public function __construct(string $marque = "", string $modele = "", int $nbPortes = 0, int $autonomie = 0){
        parent::__construct($marque, $modele, $nbPortes); 
        $this->_autonomie = $autonomie;
    }

    // Getters    
    /**
     * getAutonomie
     *
     * @return void
     */
    public function getAutonomie(){
        return $this->_autonomie;
    }
    
    /**
     * getInfos
     *
     * @return void
     */
    public function getInfos(){
        return parent::getInfos(). " Autonomie : $this->_autonomie km<br>";
    }
}

// ***************** TESTS DES CLASSES *****************

echo Voiture::getNbVoitures();

$v1 = new Voiture("Peugeot", "408", 5);
$v2 = new Voiture("Citroën", "C4", 3);
$ve1 = new VoitureElec("BMW", "i3", 5, 200);

echo Voiture::getNbVoitures();

$v1->demarrer();
$v1->accelerer(50);
$v1->stopper();
echo $v1->getInfos();

$v2->accelerer(50); // ERREUR ! (véhicule non démarré)

$ve1->demarrer();
$ve1->accelerer(20);
echo $ve1->getInfos();

include 'template/footer.html';


