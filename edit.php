<?php
	include_once 'database.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$conn->prepare('SELECT * FROM usuario WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: listaUsuarios.php');
	}


	if(isset($_POST['guardar'])){
		$email=$_POST['email'];
		$usuario=$_POST['usuario'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$telefono=$_POST['telefono'];
		$id=(int) $_GET['id'];

		if(!empty($email) && !empty($usuario) && !empty($apellido) && !empty($nombre) && !empty($telefono)){
			
				$consulta_update=$conn->prepare(' UPDATE usuario SET  
					email=:email,
					usuario=:usuario,
					nombre=:nombre,
					apellido=:apellido,
					telefono=:telefono
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':email' =>$email,
					':usuario' =>$usuario,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':telefono' =>$telefono,
					':id' =>$id
				));
				echo "<script> alert('Usuario editado correctamente');</script>";
				header('Location: listaUsuarios.php');
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Usuarios</title>
	<link rel="stylesheet" href="css/stylesForm.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>

<div class="contenedor">
	<form action="	" class="form-register" method="post">
		   <h4>Editar usuario</h4>
		   
			<input type="text" id="email" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="controls">
			<input type="text" id="usuario" name="usuario" value="<?php if($resultado) echo $resultado['usuario']; ?>" class="controls">
			<input type="text" id="nombre" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="controls">
			<input type="text" id="apellido" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="controls">
			<input type="text" id="telefono" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="controls">
			<input class="botons" name="guardar" type="submit" value="Guardar">
			<center> <a href="listaUsuarios.php" class="controls" >Cancelar</a> </center>
		</form>
</div>
</body>
</html>