<?php  
//Connect to database
require 'conexion.php';

if (isset($_POST['FingerID'])) {
	
	$fingerID = $_POST['FingerID'];

	$sql = "SELECT * FROM usuarios WHERE id_huella=?";
    $query = $pdo->prepare($sql);
    $query->execute([$fingerID]);
    $row = $query->fetch(PDO::FETCH_OBJ);
    if (!empty($row->nombres)){
        $nombre = $row->nombres;
        $apellido = $row->apellidos;
        $Uname = strtok($nombre, " ");
        $puesto = $row->puesto;
        $sql = "SELECT * FROM log_usuarios WHERE id_huella=? AND fecha=CURDATE() AND hora_salida='00:00:00'";
        $query = $pdo->prepare($sql);
        $query->execute([$fingerID]);
        $row = $query->fetch(PDO::FETCH_OBJ);
        if(!$row){
            $timeout= 0;
            $sql = "INSERT INTO log_usuarios (nombre_completo, puesto, id_huella, fecha, hora_entrada, hora_salida) VALUES (? ,?, ?, CURDATE(), CURTIME(), ?);";
            $query = $pdo->prepare($sql);
            $query->execute([$apellido." ".$nombre,$puesto,$fingerID,$timeout]);
            echo "login".$Uname;
            exit();
        }else{
            $sql="UPDATE log_usuarios SET hora_salida=CURTIME() WHERE id_huella=? AND fecha=CURDATE() AND hora_salida=0;";
            $query = $pdo->prepare($sql);
            $query->execute([$fingerID]);
            echo "logout".$Uname;
            exit();
        }
    }else{
        echo "Error con nombre del usuario, por favor vuelva a registrar al usuario";
    }
}
if (isset($_POST['Get_Fingerid'])) {
    
        if ($_POST['Get_Fingerid'] == "get_id") {
            $sql= "SELECT id_huella FROM usuarios WHERE add_fingerid=1";
            $query = $pdo->prepare($sql);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            if($row){
                echo "add-id".$row->id_huella;
                exit();
            }else{
                echo "Nothing";
                exit();
            }
        }else{
            exit();
        }
}
if (!empty($_POST['confirm_id'])) {
    
        $fingerid = $_POST['confirm_id'];
    
        $sql="UPDATE usuarios SET add_fingerid=0 WHERE id_huella=?";
        $query = $pdo->prepare($sql);
        $query->execute([$fingerid]);
        echo "La huella digital ha sido añadida";
        exit();
        
    }

if (isset($_POST['DeleteID'])) {

    if ($_POST['DeleteID'] == "check") {

        $sql = "SELECT id_huella FROM usuarios WHERE del_fingerid=1";
        $query = $pdo->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
        if($row){
            echo "del-id".$row->id_huella;
            $sql = "DELETE FROM usuarios WHERE del_fingerid=1";
            $query = $pdo->prepare($sql);
            $query->execute();
            exit();
        }else{
            echo "ninguna acción";
            exit();
        }
            
    }else{
        exit();
    }
}
if (isset($_POST['FingerID_t'])){
    $fingerID = $_POST['FingerID_t'];
    $temp = $_POST['temp'];
    $sql="UPDATE log_usuarios SET temperatura=? WHERE id_huella=? AND fecha=CURDATE() AND temperatura = 0;";
    $query = $pdo->prepare($sql);
    $query->execute([$temp, $fingerID]);
}

?>
