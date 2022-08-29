<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

?>
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
      <a class="navbar-brand js-scroll-trigger" href="index.php">Instituto de Electrónica Aplicada</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menú
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="asistencia.php">Asistencia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="admin.php">Administración de usuarios</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link js-scroll-trigger">Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </div>
    <kbd> Logueado como <?php echo $_SESSION['user_name'];?> </kbd>
  </nav>

  <!-- Projects Section -->
  <section id="asistencia" class="about-section text-center">
    <!--User table-->
    <br> <br> <br> <br>
    <h1 class="text-white mb-4 ">Exportar asistencias</h1>
      <div class="container text-white mb-4 form-style-5 slideInDown animated">
        <form method="POST">
          <div class="form-row">
          <div class="form-group col-md-6 mb-6">
            <label for="date">Fecha inicial</label>
            <input type="date" class="form-control" name="date_start" id="date_start">
          </div>
          <div class="form-group col-md-6 mb-6">
            <label for="date">Fecha final</label>
            <input type="date" class="form-control" name="date_final" id="date_final"><br>
          </div>
          </div>
          <?php 
              require "conexion.php";
              $sql = "SELECT nombres, apellidos FROM usuarios WHERE puesto='Docente Investigador' ORDER BY id DESC";
              $query = $pdo->prepare($sql);
              $query->execute();
              $docentes=$query->fetchAll(\PDO::FETCH_ASSOC);
              $sql = "SELECT nombres, apellidos FROM usuarios WHERE puesto='Pasante' ORDER BY id DESC";
              $query = $pdo->prepare($sql);
              $query->execute();
              $pasantes = $query->fetchAll(\PDO::FETCH_ASSOC);
              $sql = "SELECT nombres, apellidos FROM usuarios WHERE puesto='Tesista' ORDER BY id DESC";
              $query = $pdo->prepare($sql);
              $query->execute();
              $tesistas = $query->fetchAll(\PDO::FETCH_ASSOC);

          ?>
          <div class="form-group col-md-12">
          <label for="nombre">Usuario</label>
          <select name="nombre" id="nombre" class="form-control" >
            <option selected>Todos</option>
            <optgroup label="Docente investigador">
            <?php foreach($docentes as $row){?>
              <option value="<?php echo $row['apellidos']." ".$row['nombres'];?>"><?php echo $row['nombres']." ".$row['apellidos'];?></option>
              <?php } ?>
            </optgroup>
            
            <optgroup label="Pasante">
            <?php foreach($pasantes as $row){?>
              <option value="<?php echo $row['apellidos']." ".$row['nombres'];?>"><?php echo $row['nombres']." ".$row['apellidos'];?></option>
              <?php } ?>
            </optgroup>
            <optgroup label="Tesista">
            <?php foreach($tesistas as $row){?>
              <option value="<?php echo $row['apellidos']." ".$row['nombres'];?>"><?php echo $row['nombres']." ".$row['apellidos'];?></option>
              <?php } ?>
            </optgroup>
          </select>
          
          </div>
          <?php $docentes = null; $pasantes = null; $tesistas = null ?>
          <div class="form-row">
          <div class="form-group col-md-6">
            <button type="button" class="btn btn-primary" name="user_log" id="user_log">Mostrar</button>
          </div>
          <div class="form-group col-md-6">
            <button type="button" class="btn btn-primary" name="exportar" id="exportar" onclick="tableToExcel()">Exportar Tabla</button>
          </div>
          </div>
          
        </form>
      </div>

    <div class="tbl-header slideInRight animated">
      <br>
      <div  id="userslog"></div>
      <br> <br> <br> <br> <br> <br> <br>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer small text-center text-black-50">
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
  <script src="js/user_log.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/table2excel.js"></script>
<script>
  function tableToExcel (){
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("table.table"));
  }
</script>




</body>

</html>
<?php }else{
    header("Location: login.php");
} ?>