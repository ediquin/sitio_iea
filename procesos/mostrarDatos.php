<?php
    require_once "../conexion.php";

    $sql = "SELECT * FROM usuarios WHERE NOT nombres='' ORDER BY id ASC";

    $query = $pdo->prepare($sql);
    $query->execute();
    $datos=$query->fetchAll();

    $tabla=
    '<table class= "table table-responsive table-bordered table-dark">
    <thead>
                    <TR>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Puesto</th>
                    <th>ID - huella digital</th>
                    <th>Foto</th>
                    </TR>
    </thead>
    <tbody>';
  $datosTabla = "";

  foreach($datos as $key => $value){
      $datosTabla=$datosTabla.'<tr>
                                <td>'.$value['id'].'</td>
                                <td>'.$value['apellidos']." ".$value['nombres'].'</td>
                                <td>'.$value['correo'].'</td>
                                <td>'.$value['puesto'].'</td>
                                <td>'.$value['id_huella'].'</td>
                                <td><img class="img-thumbnail" width="100px" src="imagen/'.$value['foto'].'"></td>
    
                            </tr>';
  }

  echo $tabla.$datosTabla.'</tbody></table>';
?>