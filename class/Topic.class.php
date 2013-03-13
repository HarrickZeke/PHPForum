<?php
/**
* 
*/
class Topic
{
	private $_id;
	private $_name;
	private $_description;

	public function __construct($id, $name, $description)
	{
		$this->setId($id);
		$this->setName($name);
		$this->setDescription($description);			
	}

	public function setId($id)
	{
		if(!is_int($id))
		{
			trigger_error("Id must be an int");
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
}

?>