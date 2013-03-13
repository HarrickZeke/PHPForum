<?php
	function classLoader($class)
	{
		require_once './class/' . $class . '.class.php';
	}

	spl_autoload_register('classLoader');

	$post = new Topic(1, "Saucisse", "Le topic préféré des saucisses");
	echo $post->name() . ' - ' . $post->description();

	$post = new Topic(2, "Plop", "Vive les plops");
	echo $post->name() . ' - ' . $post->description();
?>