<?php

class Realisateur extends Personne{
   private $films;
  
   public function __construct(string $nom = "", string $prenom = "", string $dateNaissance = "now"){
       parent::__construct($nom, $prenom, $dateNaissance);
       $this->films = [];
   }

   /**
     * Add Films to array Films
     *
     * @return  self
     */ 
    public function addFilm(Film $film){
      $this->films[] = $film;
   }

   /**
     * getInfos
     *
     * @return void
     */
   public function getInfos(){
      $listFilms = "<h4>Réalisateur : $this</h4><ul>";
      foreach ($this->films as $film) {
          $listFilms .= "<li>".$film."</li>";
      }
      
      return $listFilms .= "</ul>";
   }

   /**
    * __toString
    *
    * @return void
    */
   public function __toString(){
      return parent::__toString();
   }
}