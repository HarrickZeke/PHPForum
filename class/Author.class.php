<?php
	/**
	* 
	*/
	class Author
	{
		private $_id;
		private $_name;
		private $_mail;
		private $_password;
		private $_sexe;
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

		public function setMail($mail)
		{
			if(!is_string($mail))
			{
				trigger_error("Mail must be a string");
				return;
			}

			$this->_mail = $mail;
		}
		
?>