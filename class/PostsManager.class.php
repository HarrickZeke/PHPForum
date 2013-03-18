<?php
/**
*
*/
class PostsManager
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

	public function create(Post $post)
	{
		$query = $this->_database->prepare('INSERT INTO post 
									  		SET body = :body, 
									  	  		datetime = :datetime,
									  	  		topicId = :topicId, 
									  	  		authorId = :authorId, 
									  	  		orderId = :orderId');

		$query->bindValue(':body', $post->body(), PDO::PARAM_STR);
		$query->bindValue(':datetime', $post->datetime());
		$query->bindValue(':topicId', $post->topicId(), PDO::PARAM_INT);
		$query->bindValue(':authorId', $post->authorId(), PDO::PARAM_INT);
		$query->bindValue(':orderId', $post->orderId(), PDO::PARAM_INT);
		$query->execute();
	}

	public function read($id)
	{
		$id = (int) $id;
		$query = $this->_database->query('SELECT *
										  FROM post
										  WHERE id = '.$id);
		
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return new Post($data);
	}

	public function readAll($topic_id)
	{
		$topic_id = (int) $topic_id;
		$posts = array();
		$query = $this ->_database->query('SELECT *
									 	   FROM post
									 	   WHERE topicId = '.$topic_id.'
									 	   ORDER BY orderId');	
		
		while ($data = $query->fetch(PDO::FETCH_ASSOC)) 
		{
			$posts[] = new Post($data);
		}	
		return $posts;
	}

	public function update(Post $post)
	{
		$query = $this->_database->prepare('UPDATE post
											SET body = :body, 
												datetime = :datetime, 
											  	authorId = :authorId, 
											  	orderId = :orderId
											WHERE :id = id');

		$query->bindValue(':body', $post->body(), PDO::PARAM_STR);
		$query->bindValue(':datetime', $post->datetime());
		$query->bindValue(':authorId', $post->authorId(), PDO::PARAM_INT);
		$query->bindValue(':order', $post->orderId(), PDO::PARAM_INT);
		$query->bindValue(':id', $post->id(), PDO::PARAM_INT);                               
		$query->execute();
	}

	public function delete(Post $post)
	{
		$this->_database->exec('DELETE FROM post
						  		WHERE id = '.$post->id().'
						  		LIMIT 1');
	}

	public function postsCount($id)
	{
		$id = (int) $id;
		$query = $this->_database->query('SELECT COUNT(*)
										  FROM post
										  WHERE topicId = '.$id);

		$data = $query->fetchColumn();
		return $data;
	}
}