<?php
/**
* 
*/
class Topic
{
	private $_id;
	private $_name;
	private $_description;

	public function __construct()
	{
				
	}

	public function setId($id)
	{
		if(!is_int($id))
		{
			trigger_error("L'id doit être un entier !")
			return;
		}

		$this->_id = $id;
	}

	public function setName($name)
	{
		
	}
}

?>