<?php 
	include_once 'database.php';
	
	if(isset($_POST['guardar'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$usuario=$_POST['usuario'];
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];

        if(!empty($_POST['email']) && !empty($_POST['password'])){
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}
                $sql = "INSERT INTO usuario (email, password, usuario, nombre, apellido, telefono) VALUES (:email, :password, :usuario, :nombre, :apellido, :telefono)";
                //consulta de sql
                $stmt = $conn->prepare($sql);
                //vinculo los datos
                $stmt->bindParam(':email',$_POST['email']);
				$stmt->bindParam(':password',$_POST['password']);
				$stmt->bindParam(':usuario',$_POST['usuario']);
                $stmt->bindParam(':nombre',$_POST['nombre']);
				$stmt->bindParam(':apellido',$_POST['apellido']);
                $stmt->bindParam(':telefono',$_POST['telefono']);
                //CIFRO LA PASSWORD
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $stmt->bindParam(':password',$password);
            
                if($stmt->execute()){
                    echo "<script> alert('Usuario creado correctamente');</script>";
                }else{
                    echo "<script> alert('Usuario no creado correctamente');</script>";
                }
	    }
    }

?>
<!DOCTYPE html>
<html lang="es"> 

<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/stylesForm.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

</head>
<body>

		<form action="insert.php" onsubmit="return validar()" class="form-register" method="POST">
		   <h4>Crear Usuario</h4>
		   	<input type="text" id="email" name="email" placeholder="Ingrese su email" class="controls">
			<input type="text" id="password" name="password" placeholder="Ingrese su password" class="controls">
			<input type="text" id="usuario" name="usuario" placeholder="Usuario" class="controls">
			<input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre">
			<input class="controls" type="text" name="apellido" id="apellido" placeholder="Ingrese su Apellido">
			<input class="controls" type="text" name="telefono" id="telefono" placeholder="Ingrese su telefono">
			<input class="botons" name="guardar" type="submit" value="Registrar">
			<center><a href="listaUsuarios.php" class="controls">Cancelar</a></center>
			<div id="mensaje" class="error"></div>
		</form>
	<div id="snackbar" class="snackbar"></div>
	<script src="js/main.js"></script>
</body> 
</html>