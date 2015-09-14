<?php
	session_start();

	require('scripts/banco.php');

	$config = array( 
		'host'  => 'servidor', 
		'banco' => 'banco', 
		'usuario'  => 'usuario', 
		'senha' => 'senha'
	);

	conectar();
