<?php
/**
* 
*/
class CategoriesManager
{
	private $_database;

	public function __construct($database)
	{
		$this->setDatabase($database);
	}

	public function setDatabase(PDO $database)
	{
		$this->_database = $database;
	}

	public function create(Category $category)
	{
		$query = $this->_database->prepare('INSERT INTO category 
									  		SET name = :name, 
									  	  		orderId = :orderId');

		$query->bindValue(':name', $category->name(), PDO::PARAM_STR);
		$query->bindValue(':orderId', $category->orderId(), PDO::PARAM_INT);
		$query->execute();
	}

	public function read($id)
	{
		$id = (int) $id;
		$query = $this->_database->query('SELECT *
										  FROM category
										  WHERE id = '.$id);
		
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return new Category($data);
	}

	public function readAll()
	{
		$categories = array();
		$query = $this ->_database->query('SELECT *
									 	   FROM category
									 	   ORDER BY orderId');	
		
		while ($data = $query->fetch(PDO::FETCH_ASSOC)) 
		{
			$categories[] = new Category($categories);
		}	
		return $categories;
	}

	public function update(Category $category)
	{
		$query = $this->_database->prepare('UPDATE category
											SET name = :name, 
												orderId = :orderId
											WHERE :id = id');

		$query->bindValue(':name', $category->name(), PDO::PARAM_STR);
		$query->bindValue(':orderId', $category->orderId(), PDO::PARAM_INT);
		$query->bindValue(':id', $category->id(), PDO::PARAM_INT);                               
		$query->execute();
	}

	public function delete(Category $category)
	{
		$this->_database->exec('DELETE FROM category
						  		WHERE id = '.$category->id().'
						  		LIMIT 1');
	}
}