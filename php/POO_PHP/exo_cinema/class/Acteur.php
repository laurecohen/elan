<?php

class Acteur extends Personne{
   private $films;
   private $role;

   public function __construct(string $nom = "", string $prenom = "", string $dateNaissance = "now"){
      parent::__construct($nom, $prenom, $dateNaissance);
      $this->films = [];
   }

   /**
    * Get the value of films
    */ 
   public function getFilms(){
      return $this->films;
   }

   /**
    * Set the value of films
    *
    * @return  self
    */ 
   public function setFilms($films){
      $this->films = $films;
   }

   /**
    * Get the value of film
    */ 
   public function getFilm(){
      return $this->film;
   }

   /**
    * Set the value of film
    *
    * @return  self
    */ 
   public function setFilm($film){
      $this->film = $film;
   }

   /**
    * Get the value of role
    */ 
   public function getRole(){
      return $this->role;
   }

   /**
    * Set the value of role
    *
    * @return  self
    */ 
   public function setRole($role){
      $this->role = $role;
   }

   /**
    * getInfos
    *
    * @return void
    */
   public function getInfos(){
      $listActeurs = "<h4>Acteur : $this</h4><ul>";
      return $listActeurs;
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