<?php 
	require_once('../protected/connection.php');


	$statement = $dbmanager->prepare("SELECT * FROM usuarios");
	$statement->execute();

	//$usuarios = $statement->fetchAll();
	$usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	//print_r($usuarios);
	

?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administración de Usuarios</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	



<div class="container margin-top-l">
	<div class="row">
		<div class="col-12">
			<h1>Usuarios </h1>
			<hr>

				<h2>Nuevo Usuario (Create)</h2>
			
			<form action="usuario-create.php" method="POST">
				<table class="table">
					<tr>
						<td>
							<input type="text" name="nombre_completo" placeholder="Nombre Completo*" class="form-control" required>
						</td>
						<td>
							<input type="email" name="correo" placeholder="Correo Electrónico*" class="form-control" required>
						</td>
						<td>
							<input type="password" name="contrasena" placeholder="Contraseña*" class="form-control" required>
						</td>
						<td>
							<input type="text" name="telefono" placeholder="Teléfono" class="form-control" >
						</td>
						<td>
							<input type="submit" name="create" value="Crear Usuario" class="btn btn-success">
						</td>
					</tr>
				</table>
				<p class="text-small">* Campos requeridos</p>
			</form>

			<hr>

			<h2>Listar (Read)</h2>
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Nombre Completo</th>
					<th>Correo Electrónico</th>
					<th>Contraseña</th>
					<th>Teléfono</th>
					<th>Fecha de creación</th>
					<th>Acciones</th>
				</tr>

				<?php  foreach ($usuarios as $usuario) { //print_r($usuario) ?>
					<tr>
						<td>
							<?php echo $usuario["id"] ?>
						</td>
						<td>
							<?php echo $usuario["nombre_completo"] ?>
						</td>
						<td>
							<?php echo $usuario["correo"] ?>
						</td>
						<td>
							<?php echo $usuario["contrasena"] ?>
						</td>
						<td>
							<?php echo $usuario["telefono"] ?>
						</td>
						<td>
							<?php echo $usuario["created_at"] ?>
						</td>
						<td>
							<a href="usuario-edit.php?id=<?php echo $usuario['id'] ?>&action=edit" class="btn btn-mini btn-info">Editar</a>
							<a href="usuario-delete.php?id=<?php echo $usuario['id'] ?>&action=delete" class="btn btn-mini btn-danger">Borrar</a>
						</td>
					</tr>
						
				<?php 	} //Fin del Foreach?>


			</table>


		
			
			<hr>
			<p>
				<a href="../index.php" class="btn btn-secondary">Regresar</a>
			</p>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>