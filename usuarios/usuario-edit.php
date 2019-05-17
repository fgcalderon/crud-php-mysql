<?php 
	ini_set('display_errors',1); error_reporting(E_ALL);


	require_once('../protected/connection.php');

	$mensaje = "";
	$usuario = "";

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
		$id = $_GET['id'];

		$statement = $dbmanager->prepare("SELECT * FROM usuarios WHERE  id = :id");
		$statement->execute([':id' => $id ]);	
		$usuario = $statement->fetch(PDO::FETCH_ASSOC);
			
	} elseif (isset($_POST) AND isset($_POST['update'])) {

		$data = [
		    'nombre_completo' => $_POST['nombre_completo'],
		    'correo' => $_POST['correo'],
		    'contrasena' => $_POST['contrasena'],
		    'telefono' => $_POST['telefono'],
		    'id' => $_POST['id']
		];

		$statement = $dbmanager->prepare("UPDATE usuarios SET nombre_completo = :nombre_completo, correo = :correo, contrasena = :contrasena, telefono = :telefono WHERE  id = :id");
		$statement->execute($data);


		if( $statement->rowCount() >= 1 ) {
			$mensaje =  "<div class='alert alert-success'>El usuario ha sido actualizado</div>";	
		} else {
			$mensaje =  "<div class='alert alert-danger'>Error ". $dbmanager->errorCode().", El usuario no pudo ser actualizado. </div>";

		}

		
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
			<h2 class="text-center">Editar Usuario (Update)</h2>

			

			<?php if($usuario != '') { ?>
				<form action="usuario-edit.php" method="POST">
					<table class="table">
						<tr>
							<td>
								<input type="text" name="nombre_completo" value="<?php echo  $usuario["nombre_completo"] ?>" class="form-control" required>
							</td>
							<td>
								<input type="text" name="correo" value="<?php echo  $usuario["correo"] ?>" class="form-control" required>
							</td>
							<td>
								<input type="text" name="contrasena" value="<?php echo  $usuario["contrasena"] ?>" class="form-control" required>
							</td>
							<td>
								<input type="text" name="telefono" value="<?php echo  $usuario["telefono"] ?>" placeholder="Teléfono" class="form-control">
							</td>
							<td>
								<input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
								<input type="submit" name="update" value="Actualizar" class="btn btn-success">
							</td>
						</tr>
					</table>

				</form>
			<?php } //Fin del Form ?>
			
			
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