<?php
	session_start();
	include_once('../conexion.php');

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		try{
			$sql = "UPDATE usuarios SET del_fingerid = 1 WHERE id = ?";
			//if-else statement in executing our query
			$db = $pdo->prepare($sql);
			$_SESSION['message'] = ( $db->execute([$id]) ) ? 'Empleado Borrado' : 'Hubo un error al borrar empleado';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$pdo = null;

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: ../admin.php');

?>