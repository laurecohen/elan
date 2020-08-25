<?php

	namespace Model\Entity;
	use App\AbstractEntity;

	class User extends AbstractEntity {
		private $id;
		private $username;
		private $email;
		private $password;
		private $role;
		private $creationdate;
		
		function __construct($data)
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
		 * Get the value of username
		 */ 
		public function getUsername()
		{
			return $this->username;
		}


		/**
		 * Get the value of email
		 */ 
		public function getEmail()
		{
			return $this->email;
		}

		/**
		 * Get the value of password
		 */ 
		public function getPassword()
		{
			return $this->password;
		}

		/**
		 * Get the value of role
		 */ 
		public function getRole()
		{
			return $this->role;
		}

		/**
		 * Get the value of creationdate
		 */ 
		public function getCreationdate()
		{
			return $this->creationdate;
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
		 * Set the value of username
		 *
		 * @return  self
		 */ 
		public function setUsername($username)
		{
			$this->username = $username;

			return $this;
		}

		/**
		 * Set the value of email
		 *
		 * @return  self
		 */ 
		public function setEmail($email)
		{
			$this->email = $email;

			return $this;
		}

		/**
		 * Set the value of password
		 *
		 * @return  self
		 */ 
		public function setPassword($password)
		{
			$this->password = $password;

			return $this;
		}

		/**
		 * Set the value of role
		 *
		 * @return  self
		 */ 
		public function setRole($role)
		{
			$this->role = $role;

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

		// toString
		public function __toString()
		{
			return $this->getUsername();
		}
	}