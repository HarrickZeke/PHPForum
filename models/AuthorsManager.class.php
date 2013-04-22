<?php
	/**
	* 
	*/
	class AuthorsManager
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

		public function create(Author $author)
		{
			$query = $this->_database->prepare('INSERT INTO author 
										  		SET name = :name, 
										  	  		email = :email, 
										  	  		password = :password, 
										  	  		gender = :gender
										  	  		dateOfBirth = :dateOfBirth');

			$query->bindValue(':name', $author->name(), PDO::PARAM_STR);
			$query->bindValue(':email', $author->email(), PDO::PARAM_STR);
			$query->bindValue(':password', $author->password(), PDO::PARAM_STR);
			$query->bindValue(':gender', $author->gender(), PDO::PARAM_STR);
			$query->bindValue(':dateOfBirth', $author->dateOfBirth());
			$query->execute();
		}

		public function read($id)
		{
			$id = (int) $id;
			$query = $this->_database->query('SELECT *
											  FROM author
											  WHERE id = '.$id);
			
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return new Author($data);
		}

		public function readAll()
		{
			$authors = array();
			$query = $this ->_database->query('SELECT *
										 	   FROM author
										 	   ORDER BY name');	
			
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) 
			{
				$authors[] = new Author($data);
			}	
			return $authors;
		}

		public function update(Author $author)
		{
			$query = $this->_database->prepare('UPDATE topic
												SET name = :name, 
										  	  		email = :email, 
										  	  		password = :password, 
										  	  		gender = :gender
										  	  		dateOfBirth = :dateOfBirth
												WHERE :id = id');

			$query->bindValue(':name', $author->name(), PDO::PARAM_STR);
			$query->bindValue(':email', $author->email(), PDO::PARAM_STR);
			$query->bindValue(':password', $author->password(), PDO::PARAM_STR);
			$query->bindValue(':gender', $author->gender(), PDO::PARAM_STR);
			$query->bindValue(':dateOfBirth', $author->dateOfBirth());                              
			$query->execute();
		}

		public function delete(Author $author)
		{
			$this->_database->exec('DELETE FROM author
							  		WHERE id = '.$author->id().'
							  		LIMIT 1');
		}		
	}

?>