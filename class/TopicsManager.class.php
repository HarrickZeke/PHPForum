<?php
/**
* 
*/
class TopicsManager
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

	public function create(Topic $topic)
	{
		$query = $this->_database->prepare('INSERT INTO topic 
									  		SET name = :name, 
									  	  		description = :description, 
									  	  		authorId = :authorId, 
									  	  		orderId = :orderId');

		$query->bindValue(':name', $topic->name(), PDO::PARAM_STR);
		$query->bindValue(':description', $topic->description(), PDO::PARAM_STR);
		$query->bindValue(':authorId', $topic->authorId(), PDO::PARAM_INT);
		$query->bindValue(':orderId', $topic->orderId(), PDO::PARAM_INT);
		$query->execute();
	}

	public function read($id)
	{
		$id = (int) $id;
		$query = $this->_database->query('SELECT *
										  FROM topic
										  WHERE id = '.$id);
		
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return new Topic($data);
	}

	public function readAll()
	{
		$topics = array();
		$query = $this ->_database->query('SELECT *
									 	   FROM topic
									 	   ORDER BY orderId');	
		
		while ($data = $query->fetch(PDO::FETCH_ASSOC)) 
		{
			$topics[] = new Topic($data);
		}	
		return $topics;
	}

	public function update(Topic $topic)
	{
		$query = $this->_database->prepare('UPDATE topic
											SET name = :name, 
												description = :description, 
											  	authorId = :authorId, 
											  	orderId = :orderId
											WHERE :id = id');

		$query->bindValue(':name', $topic->name(), PDO::PARAM_STR);
		$query->bindValue(':description', $topic->description(), PDO::PARAM_STR);
		$query->bindValue(':authorId', $topic->authorId(), PDO::PARAM_INT);
		$query->bindValue(':orderId', $topic->orderId(), PDO::PARAM_INT);
		$query->bindValue(':id', $topic->id(), PDO::PARAM_INT);                               
		$query->execute();
	}

	public function delete(Topic $topic)
	{
		$this->_database->exec('DELETE FROM topic
						  		WHERE id = '.$topic->id().'
						  		LIMIT 1');
	}
}