<?php
    
    require "../conexion.php";
    $seldate = date("Y-m-d");
    $sql = "SELECT * FROM log_usuarios WHERE fecha='$seldate' ORDER BY id DESC";

    if(($_POST['date_start']!='' and $_POST['date_final'] !='') and $_POST['nombre']=='Todos'){
        $inicio = $_POST['date_start'];
        $final = $_POST['date_final'];
        $sql = "SELECT * FROM log_usuarios WHERE fecha BETWEEN '$inicio' and '$final' ORDER BY id DESC";
    }
    else if(($_POST['date_start']!='' and $_POST['date_final'] !='') and $_POST['nombre']!='Todos'){
        $inicio = $_POST['date_start'];
        $final = $_POST['date_final'];
        $nombre = $_POST['nombre'];
        $sql = "SELECT * FROM log_usuarios WHERE nombre_completo = '$nombre' AND fecha BETWEEN '$inicio' and '$final' ORDER BY id DESC";
    }
    else if(($_POST['date_start']=='' and $_POST['date_final'] =='') and $_POST['nombre']!='Todos'){
        $nombre = $_POST['nombre'];
        $sql = "SELECT * FROM log_usuarios WHERE nombre_completo = '$nombre' AND fecha='$seldate' ORDER BY id DESC";
    } 
    $query = $pdo->prepare($sql);
    $query->execute();
    $datos=$query->fetchAll();

    $tabla=
    '<table class="table table-responsive row d-flex justify-content-center" cellpadding="3" cellspacing="5" border="0">
    <thead class="project-section text-center text-white my-0 text-uppercase">
                    <TR>
                    <TD>ID</TD>
                    <TD>Usuario</TD>
                    <TD>Cargo</TD>
                    <TD>ID de huella digital</TD>
                    <TD>Fecha</TD>
                    <TD>Hora de ingreso</TD>
                    <TD>Hora de salida</TD>
                    <TD>Temperatura</TD>
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
                                <td>'.$value['temperatura'].'</td>
                            </tr>';
  }

  echo $tabla.$datosTabla.'</tbody></table>';
?>