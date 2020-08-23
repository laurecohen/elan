<?php

class User
{
	private $id_user;
	private $username;
	private $email;
	private $password;
	private $role;
	private $datecreation;
	
	function __construct(int $id_user, string $username, string $email, string $password, string $role, string $datecreation)
	{
		$this->id_user = $id_user;
		$this->getId_user($id_user);
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
		$this->datecreation = $datecreation;
		$this->getDatecreation($datecreation);
	}

	// Getters
	/**
	 * Get the value of id_user
	 */ 
	public function getId_user()
	{
		return $this->id_user;
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
	 * Get the value of datecreation
	 */ 
	public function getDatecreation()
	{
		return $this->datecreation;
	}

	// Setters
	/**
	 * Set the value of id_user
	 *
	 * @return  self
	 */ 
	public function setId_user($id_user)
	{
		$this->id_user = $id_user;

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
	 * Set the value of datecreation
	 *
	 * @return  self
	 */ 
	public function setDatecreation($datecreation)
	{
		$this->datecreation = $datecreation;

		return $this;
	}

	// toString
	public function __toString()
	{
		return $this->getUsername();
	}
}