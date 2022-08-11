<?php
	session_start();
	include_once('../conexion.php');

	if(isset($_POST)){
		try{
			$id = $_GET['id'];
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$correo = $_POST['correo'];
			$puesto = $_POST['puesto'];
			
			$imagen = $_FILES['foto']["name"];
			$fecha = new DateTime();
			$nombreArchivo = ($imagen!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"imagen.jpg";
			$tmpFoto = $_FILES["foto"]["tmp_name"];
			if($tmpFoto!=""){
				move_uploaded_file($tmpFoto, "../imagen/".$nombreArchivo);
			}


			$sql = "UPDATE usuarios SET apellidos = ?, nombres = ?, correo = ?, puesto = ?, foto = ? WHERE id = ?";
			$db = $pdo->prepare($sql);
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->execute([$apellidos, $nombres, $correo, $puesto, $nombreArchivo, $id]) ) ? 'usuario actualizado correctamente' : 'No se puso actualizar empleado';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$db= null;
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../admin.php');

?>