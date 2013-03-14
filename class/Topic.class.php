﻿<?php
/**
* 
*/
class Topic
{
	private $_id;
	private $_name;
	private $_description;
	private $_author_id;
	private $_order;

	public function __construct($id, $name, $description, $author_id, $order)
	{
		$this->setId($id);
		$this->setName($name);
		$this->setDescription($description);
		$this->setAuthorId($author_id);		
		$this->setOrder($order);
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

	public function setAuthorId($author_id)
	{
		if(!is_int($author_id))
		{
			trigger_error("Author id must be an integer");
			return;
		}

		$this->_author_id = $author_id;
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

	public function name()
	{
		return $this->_name;
	}

	public function description()
	{
		return $this->_description;
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

?>