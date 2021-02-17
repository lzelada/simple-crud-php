<?php
$check=0;
//inicializo el session
session_start();

if(isset($_SESSION['usuario_id'])){
    header('Location: /stampy_mail');
}

require 'database.php';

//chequeo que los datos no esten vacios
if(!empty($_POST['email']) && !empty($_POST['password'])){
    //consulta a la base de datos
    $records = $conn->prepare('SELECT id, email, password, usuario FROM usuario WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    //obtengo los datos del usuario
    $results= $records->fetch(PDO::FETCH_ASSOC);
	$pass_front=$_POST['password'];
	$pass_back=$results['password'];

    //verifico si el usuario es correcto
    if($results && password_verify($_POST['password'], $results['password'])){
        //asigno en memoria
        $_SESSION['usuario_id'] = $results['id'];
        //lo redirecciono a la pagina principal
        header('Location: /stampy_mail/listaUsuarios.php');
    }else{
       echo '<script type="text/javascript">alert("Las credenciales son incorrectas")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>STAMPY MAIL</title>
	<link rel="stylesheet" type="text/css" href="css/estilosLogin.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/stampymail_logo.png">
		</div>
		<div class="login-content">
			<form action="login.php" onsubmit="return validarUsuario()" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Bienvenidos</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" id="email" name="email" placeholder="Email o Usuario">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" id="password" name="password" placeholder="Password">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
			
        </div>
		<div id="snackbar" class="snackbar"></div>
</body>
</html>

