<?php 
	//Mostrar Errores
	ini_set('display_errors',1); error_reporting(E_ALL);

	$username = 'GRAL';
	$password = 'GRAL12345';

	foreach(PDO::getAvailableDrivers() as $driver)
   	 echo $driver, '<br>';	

	try {
		$tns = "
		   	 	(DESCRIPTION=
		   	 		(ADDRESS=
			            (COMMUNITY = tcp.world)
			            (PROTOCOL=tcp)
			            (HOST=194.177.72.222)
			            (PORT=1521))
			            (CONNECT_DATA = (SID =testdb2016))
			 )
		";

		$pdo_string = 'oci:dbname='.$tns;

		$dbh = new PDO($pdo_string, $username, $password);
	}
	  
	// show error
	catch(PDOException $exception){
	    echo "Connection error: " . $exception->getMessage();
	    die();
	}


?>