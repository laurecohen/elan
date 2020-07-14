<?php

class Acteur extends Personne{
   private $casting;

   public function __construct(string $nom = "", string $prenom = "", string $dateNaissance = "now"){
      parent::__construct($nom, $prenom, $dateNaissance);
      $this->casting = [];
   }

   /**
     * Add Distribution to array Casting
     *
     * @return  self
     */ 
    public function addDistribution(Distribution $distribution){
      $this->casting[] = $distribution;
   }

   /**
    * getFilms
    *
    * @return void
    */
   public function getFilms(){
      $listFilms = "<h4>Acteur/Actrice : $this</h4><ul>";

      foreach ($this->casting as $distribution) {
         $listFilms .= "<li>Film : ".$distribution->getFilm().", dans le rôle de : ".$distribution->getRole()."</li>";
      }
         
      return $listFilms .= "</ul>";
   }

   /**
    * getRoles
    *
    * @return void
    */
   public function getRoles(){
      $listRoles = "<h4>Acteur/Actrice : $this</h4><ul>";

      foreach ($this->casting as $distribution) {
         $listRoles .= "<li>Rôle : ".$distribution->getRole().", dans le film : ".$distribution->getFilm()."</li>";
      }
         
      return $listRoles .= "</ul>";
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