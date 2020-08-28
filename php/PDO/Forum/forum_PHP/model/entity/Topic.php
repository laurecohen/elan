<?php
    namespace Model\Entity;
    use App\AbstractEntity;

    class Topic extends AbstractEntity{
        private $id;
        private $title;
        private $creationdate;
        private $closed;
        private $resolved;
        private $user;
        private $nbPosts;
        private $nbReponses;
        private $initialPost;

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
         * Get the value of title
         */ 
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * Get the value of creationdate
         */ 
        public function getCreationdate()
        {
            //setLocale(LC_ALL, 'fr_FR.utf-8');
            return strftime("%d/%m/%Y à %H:%M:%S", strtotime($this->creationdate));
        }

        /**
         * Get the value of closed
         */ 
        public function getClosed()
        {
            return $this->closed;
        }

        /**
         * Get the value of resolved
         */ 
        public function getResolved()
        {
            return $this->resolved;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
            return $this->user;
        }
      
        /**
         * Get the value of nbPosts
         */ 
        public function getNbPosts()
        {
                return $this->nbPosts;
        }

        /**
         * Get the value of nbReponses
         */ 
        public function getNbReponses()
        {
            return $this->nbReponses;
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
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
            $this->title = $title;

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
         * Set the value of closed
         *
         * @return  self
         */ 
        public function setClosed($closed)
        {
            $this->closed = $closed;

            return $this;
        }

        /**
         * Set the value of resolved
         *
         * @return  self
         */ 
        public function setResolved($resolved)
        {
            $this->resolved = $resolved;

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
            return $this->getTitle()."";
        }

        /**
         * Set the value of nbPosts
         *
         * @return  self
         */ 
        public function setNbPosts($nbPosts)
        {
            $this->nbPosts = $nbPosts;

            return $this;
        }

        /**
         * Set the value of nbReponses
         *
         * @return  self
         */ 
        public function setNbReponses($nbReponses)
        {
                $this->nbReponses = $nbReponses;

                return $this;
        }

        /**
         * Get the value of initialPost
         */ 
        public function getInitialPost()
        {
                return $this->initialPost;
        }

        /**
         * Set the value of initialPost
         *
         * @return  self
         */ 
        public function setInitialPost($initialPost)
        {
                $this->initialPost = $initialPost;

                return $this;
        }
    }