<?php
session_start();
include_once('../conexion.php');

if(isset($_POST)){

	$db = $pdo;
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$cargo = $_POST['cargo'];
	$id_huella = $_POST['id_huella'];
	$imagen = $_FILES['foto']["name"];
	
	$fecha = new DateTime();
	$nombreArchivo = ($imagen!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"imagen.jpg";
	$tmpFoto = $_FILES["foto"]["tmp_name"];
	if($tmpFoto!=""){
		move_uploaded_file($tmpFoto, "../imagen/".$nombreArchivo);
	}


	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO usuarios (apellidos, nombres, correo, puesto, id_huella, add_fingerid, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute([$apellidos, $nombres, $correo, $cargo, $id_huella, 1, $nombreArchivo]) ) ? 'Usuario guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
		print_r($stmt);
		print_r($_SESSION['message']);
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$db = null;
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: ../admin.php');
	
?>