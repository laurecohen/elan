<?php

    namespace Model\Entity;
    use App\AbstractEntity;

    class Message extends AbstractEntity {
        private $id;
        private $texte;
        private $creationdate;
        private $topic;
        private $user;
        
        public function __construct($data)
        {
            parent::hydrate($data, $this);
        }

        // Getters
        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Get the value of texte
         */ 
        public function getTexte()
        {
            return $this->texte;
        }

        /**
         * Get the value of creationdate
         */ 
        public function getCreationdate()
        {
            return $this->creationdate;
        }

        /**
         * Get the value of topic
         */ 
        public function getTopic()
        {
            return $this->topic;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
            return $this->user;
        }

        // Setters
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Set the value of texte
         *
         * @return  self
         */ 
        public function setTexte($texte)
        {
            $this->texte = $texte;

            return $this;
        }

        /**
         * Set the value of creationdate
         *
         * @return  self
         */ 
        public function setCreationdate($creationdate)
        {
            $this->creationdate = $creationdate;

            return $this;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setTopic($topic)
        {
            $this->topic = $topic;

            return $this;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
            $this->user = $user;

            return $this;
        }
        
        // toString
        public function __toString()
        {
            return $this->getTexte();
        }
    }
