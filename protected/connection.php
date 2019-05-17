<?php 

	//Mostrar Errores
	ini_set('display_errors',1); error_reporting(E_ALL);

	$username = 'demogt_crud';
	$password = 'admin009';

	try {
		$dbmanager = new PDO('mysql:host=localhost;dbname=demogt_tienda;charset=utf8',$username,$password);
	}
	  
	// show error
	catch(PDOException $exception){
	    echo "Connection error: " . $exception->getMessage();
	    die();
	}

?>