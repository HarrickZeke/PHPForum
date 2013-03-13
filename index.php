<?php
	require_once('./core/autoload.php');

	$post = new Topic(1, "Saucisse", "Le topic préféré des saucisses");
	echo $post->name() . ' - ' . $post->description();

	$post = new Topic(2, "Plop", "Vive les plops");
	echo $post->name() . ' - ' . $post->description();
?>