<?php 

	//Mostrar errores
	ini_set('display_errors',1); error_reporting(E_ALL);

	//Incluir el archivo de conexion a la base de datos
	require_once('../protected/connection.php');
	
	$mensaje = "";
	$usuario = "";
	

	//Verificar la llamada POST
	if (isset($_POST) AND isset($_POST['create'])) {

		//print_r($_POST);

		$data_usuario = [
			'nombre_completo' => $_POST['nombre_completo'],
			'correo' => $_POST['correo'],
			'contrasena' => $_POST['contrasena'],
			'telefono' => $_POST['telefono'],
		];


		//print_r($data_usuario);

		$statement = $dbmanager->prepare("INSERT INTO usuarios (nombre_completo, correo, contrasena,telefono) VALUES (:nombre_completo, :correo, :contrasena, :telefono)");
		$statement->execute($data_usuario);

		$mensaje =  "<div class='alert alert-success'>El usuario ha sido creado con éxito</div>";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
	



<div class="container margin-top-l">
	<div class="row">
		<div class="col-12">
			<h2 class="text-center">Crear Usuario (Create)</h2>
			
				<p>Nombre: <?php echo $_POST["nombre_completo"]; ?></p>
				<p>Correo electrónico: <?php echo $_POST["correo"]; ?></p>
				<p>Teléfono: <?php echo $_POST["telefono"]; ?></p>
				<p>Contraseña: <?php echo $_POST["contrasena"]; ?></p>

			

			<?php
				//Muestra mensaje de confirmación al eliminar un usuario 
				echo $mensaje; 
			?>
			

			<p><a href="usuarios.php" class="btn btn-secondary">Regresar</a></p>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>