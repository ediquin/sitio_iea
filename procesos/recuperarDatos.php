<?php
    
    require_once "../conexion.php";
    session_start();
    if (isset($_POST['log_date'])) {
        if ($_POST['date_sel'] != 0) {
            $_SESSION['seldate'] = $_POST['date_sel'];
        }
        else{
            $_SESSION['seldate'] = date("Y-m-d");
        }
      }
      
      if ($_POST['select_date'] == 1) {
          $_SESSION['seldate'] = date("Y-m-d");
      }
      else if ($_POST['select_date'] == 0) {
          $seldate = $_SESSION['seldate'];
      }
    $sql = "SELECT * FROM log_usuarios WHERE fecha='$seldate' ORDER BY id DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $datos=$query->fetchAll();
    $tabla=
    '<table cellpadding="3" cellspacing="5" border="0">
    <thead class="project-section text-center text-white my-0 text-uppercase">
                    <TR>
                    <TD>ID</TD>
                    <TD>Usuario</TD>
                    <TD>Cargo</TD>
                    <TD>ID de huella digital</TD>
                    <TD>Fecha</TD>
                    <TD>Hora de ingreso</TD>
                    <TD>Hora de salida</TD>
                    </TR>
    </thead>
    <tbody class="text-white mb-4">';
  $datosTabla = "";

  foreach($datos as $key => $value){
      $datosTabla=$datosTabla.'<tr>
                                <td>'.$value['id'].'</td>
                                <td>'.$value['nombre_completo'].'</td>
                                <td>'.$value['puesto'].'</td>
                                <td>'.$value['id_huella'].'</td>
                                <td>'.$value['fecha'].'</td>
                                <td>'.$value['hora_entrada'].'</td>
                                <td>'.$value['hora_salida'].'</td>
                            </tr>';
  }

  echo $tabla.$datosTabla.'</tbody></table>';
?>