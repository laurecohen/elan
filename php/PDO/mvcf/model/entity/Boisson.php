<?php
    namespace Model\Entity;
    
    /**
     * Entité Boisson
     */
    class Boisson {

        private $id;
        private $nom;
        private $price;

        public function __construct($data){
            $this->id = $data['id'];
            $this->nom = $data['name'];
            $this->price = $data['price'];
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }
    }