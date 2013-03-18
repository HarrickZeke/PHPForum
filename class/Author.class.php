<?php
	/**
	* 
	*/
	class Author
	{
		private $_id;
		private $_name;
		private $_email;
		private $_password;
		private $_gender;
		private $_dateOfBirth;

		function __construct(argument)
		{
			$this->hydrate($data);
		}

		public function hydrate(array $data)
		{
		  	foreach ($data as $key => $value)
		  	{
			    $method = 'set'.ucfirst($key);
		        
		        if (method_exists($this, $method))
			    {
			      	$this->$method($value);
		    	}
		  	}
		}

		public function setId($id)
		{
			$id = (int) $id;

			if(!is_int($id))
			{
				trigger_error("Id must be an integer");
				return;
			}

			$this->_id = $id;
		}

		public function setName($name)
		{
			if(!is_string($name))
			{
				trigger_error("Name must be a string");
				return;
			}

			$this->_name = $name;
		}

		public function setEmail($email)
		{
			if(!is_string($email))
			{
				trigger_error("Email must be a string");
				return;
			}

			$this->_email = $email;
		}

		public function setPassword($password)
		{
			if(!is_string($password))
			{
				trigger_error("Password must be a string");
				return;
			}

			$this->_password = $password;
		}
		
		public function setGender($gender)
		{
			if(!is_string($gender))
			{
				trigger_error("Gender must be a string");
				return;
			}

			$this->_sexe = $sexe;
		}

		public function setDateOfBirth($dateOfBirth)
		{
			if(!is_string($dateOfBirth))
			{
				trigger_error("Date of birth must be a string");
				return;
			}

			$this->_dateOfBirth = $dateOfBirth;
		}

		public function id()
		{
			return $this->_id;
		}

		public function name()
		{
			return $this->_name;
		}

		public function email()
		{
			return $this->_email;
		}

		public function password()
		{
			return $this->_password;
		}

		public function gender()
		{
			return $this->_gender;
		}

		public function dateOfBirth()
		{
			return $this->_dateOfBirth;
		}
?>