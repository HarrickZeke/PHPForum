<?php
	require_once('./include/header.php');
	require_once('./core/autoload.php');

	$topic = new Topic(array('id' => 1, 'name' => "Saucisse", 'description' => "Le topic préféré des saucisses", 'author_id' => 1, 'order' => 1));
	echo $topic->name() . ' - ' . $topic->description() . '<br />';

	$topic = new Topic(array('id' => 2, 'name' => "Plop", 'description' => "Vive les plops", 'author_id' => 1, 'order' => 2));
	echo $topic->name() . ' - ' . $topic->description() . '<br />';

	$post = new Post(array('id' => 1, 'body' => "Bla bla bla lololol", 'datetime' => date("Y-m-d H:i:s", time()), 'author_id' => 1, 'order' => 2));
	echo $post->datetime()  . ' - ' . $post->body() . '<br />';

	require_once('./include/footer.php');
?>