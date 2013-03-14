<?php
	require_once('./include/header.php');
	require_once('./core/autoload.php');

	$topic = new Topic(1, "Saucisse", "Le topic préféré des saucisses", 1, 1);
	echo $topic->name() . ' - ' . $topic->description() . '<br />';

	$topic = new Topic(2, "Plop", "Vive les plops", 1, 2);
	echo $topic->name() . ' - ' . $topic->description() . '<br />';

	$post = new Post(1, "Bla bla bla lololol", date("Y-m-d H:i:s", time()), 1, 2);
	echo $post->datetime()  . ' - ' . $post->body() . '<br />';

	require_once('./include/footer.php');
?>