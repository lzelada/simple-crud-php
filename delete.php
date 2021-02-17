<?php 

	include_once 'database.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$conn->prepare('DELETE FROM usuario WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: listaUsuarios.php');
	}else{
		header('Location: listaUsuarios.php');
	}
 ?>