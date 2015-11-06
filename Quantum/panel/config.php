<?php

	session_start();



	require('banco.php');



	$config = array(

		'host'  => 'localhost',

		'banco' => 'quantum',

		'usuario'  => 'root',

		'senha' => ''

	);


	conectar();
