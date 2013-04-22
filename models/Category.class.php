<?php
	/**
	* 
	*/
	class Category
	{
		private $_id;
		private $_name;
		private $_orderId;

		public function __construct(array $data)
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

		public function setOrderId($orderId)
		{
			$orderId = (int) $orderId;
			
			if(!is_int($orderId))
			{
				trigger_error("Order id must be an integer");
				return;
			}

			$this->_orderId = $orderId;
		}

		public function id()
		{
			return $this->_id;
		}

		public function name()
		{
			return $this->_name;
		}

		public function orderId()
		{
			return $this->_orderId;
		}
	}
?>