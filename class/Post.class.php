<?php
/**
* 
*/
class Post
{
	private $_id;
	private $_body;
	private $_datetime;
	private $_author_id;
	private $_order;

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

	public function setBody($body)
	{
		if(!is_string($body))
		{
			trigger_error("Body must be a string");
			return;
		}

		$this->_body = $body;
	}

	public function setAuthorId($author_id)
	{
		if(!is_int($author_id))
		{
			trigger_error("Author id must be an integer");
			return;
		}

		$this->_author_id = $author_id;
	}

	public function setDatetime($datetime)
	{
		//TODO : check datetime
		$this->_datetime = $datetime;
	}

	public function setOrder($order)
	{
		if(!is_int($order))
		{
			trigger_error("Order must be an integer");
			return;
		}

		$this->_order = $order;
	}

	public function id()
	{
		return $this->_id;
	}
	
	public function body()
	{
		return $this->_body;
	}

	public function datetime()
	{
		return $this->_datetime;
	}

	public function author_id()
	{
		return $this->_author_id;
	}

	public function order()
	{
		return $this->_order;
	}
}