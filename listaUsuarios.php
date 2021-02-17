<?php
	include_once 'database.php';

	$sentencia_select=$conn->prepare('SELECT *FROM usuario ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conn->prepare('
			SELECT *FROM usuario WHERE email LIKE :campo OR password LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="contenedor">
		<h2>LISTA DE USUARIOS</h2>
		<div class="controls">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o email" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" id="nuevo" class="btn btn__nuevo">Nuevo</a>
				<a href="loginout.php" class="btn btn__salir">Salir</a>
			</form>
		</div>
		<table>
			<tr class="form-register-encabezado">
				<td>Id</td>
				<td>Email</td>
				<td>Usuario</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Telefono</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td class="form-register"><?php echo $fila['id']; ?></td>
					<td class="form-register"><?php echo $fila['email']; ?></td>
					<td class="form-register"><?php echo $fila['usuario']; ?></td>
					<td class="form-register"><?php echo $fila['nombre']; ?></td>
					<td class="form-register"><?php echo $fila['apellido']; ?></td>
					<td class="form-register"><?php echo $fila['telefono']; ?></td>
					<td class="form-register"><a href="edit.php?id=<?php echo $fila['id']; ?>"  class="controls" >Editar</a></td>
					<td class="form-register"><a href="delete.php?id=<?php echo $fila['id']; ?>" class="controls">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>