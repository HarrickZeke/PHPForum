<?php
	function classLoader($class)
	{
		require_once './class/' . $class . '.class.php';
	}

	spl_autoload_register('classLoader');
?>