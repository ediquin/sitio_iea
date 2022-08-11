<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IEA</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.html">Instituto de Electrónica Aplicada</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menú
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html#usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="asistencia.html">Asistencia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="admin.php">Administración de usuarios</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 
  
  <!-- Signup Section -->
  <section id="signup" class="signup-section">
      <div class="container">
        <div class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1">Agregar usuario</div>
  <?php include('modal.php'); ?> 
      </div> 
        
        <!--- insertar --->
      <div class="w-75 p-3 mx-auto text-center">
            <h3 class="text-white mb-5 text-center">Usuarios registrados</h3> 
              <table class="table table-bordered table-dark table-responsive">
                <thead>
                   <tr>
                     <th scope="col">id</th>
                     <th scope="col">Apellido</th>
                     <th scope="col">Nombre</th>
                     <th scope="col">Correo</th>
                     <th scope="col">Puesto</th>
                     <th scope="col"># ID - huella</th>
                   </tr>
                 </thead>
                 <tbody>
                    <?php
		              	//incluimos el fichero de conexion
		              	include_once "conexion.php";
		              	$db = $pdo;
		              	try{	
		              		$sql = 'SELECT * FROM usuarios';
		              		foreach ($db->query($sql) as $row) {
		              			?>
		              			<tr>
		              				<td scope="row"><?php echo $row['id']; ?></td>
		              				<td><?php echo $row['apellidos']; ?></td>
		              				<td><?php echo $row['nombres']; ?></td>
		              				<td><?php echo $row['correo']; ?></td>
		              				<td><?php echo $row['puesto']; ?></td>
		              				<td><?php echo $row['id_huella']; ?></td>
                        
		              				<td>
		              					<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
		              					<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
		              				</td>
		              				<?php include('BorrarEditarModal.php'); ?>
		              			</tr>
		              			<?php 
		              		}
		              	}
		              	catch(PDOException $e){
		              		echo "Hubo un problema en la conexión: " . $e->getMessage();
		              	}

			              //Cerrar la Conexion
			              $db = null;

		                ?>
                    </tbody>
                  </table>
        </div>
  </section>
  
  
  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container">
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      -----------------------
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>
  <script src="js/crud.js"></script>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
  mostrar();
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
</script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/user_log.js"></script>

</body>

</html>