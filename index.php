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
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Instituto de Electrónica Aplicada</a>
      
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
  
  <!-- Header -->
  <header class="masthead">
  
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Asistencia Biométrica</h1> <br> <br> <br>
        <a href="#usuarios" class="btn btn-primary js-scroll-trigger text-center">Ver usuarios</a>
        <br> <br> <br> 

      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="usuarios" class="about-section text-center bg-black">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">Usuarios registrados</h2>
          <div class="tbl-header slideInRight animated">
            <div id="tablaDatos"></div>
          </div>
      <br> <br>     
      <img src="img/ipad.png" class="img-fluid" alt="">
      <br> <br> <br> <br>
    </div></div></div>
  </section>


  <!-- Contact Section -->
  <section class="contact-section bg-black">
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
<?php }else{
    header("Location: login.php");
} ?>