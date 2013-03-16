<?php
/**
* 
*/
class Topic
{
	private $_id;
	private $_name; 
	private $_description;
	private $_authorId;
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

	public function setDescription($description)
	{
		if(!is_string($description))
		{
			trigger_error("Description must be a string");
			return;
		}

		$this->_description = $description;
	}

	public function setAuthorId($authorId)
	{
		if(!is_int($authorId))
		{
			trigger_error("Author id must be an integer");
			return;
		}

		$this->_authorId = $authorId;
	}

	public function setOrderId($orderId)
	{
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

	public function description()
	{
		return $this->_description;
	}

	public function authorId()
	{
		return $this->_authorId;
	}

	public function orderId()
	{
		return $this->_orderId;
	}
}

?>