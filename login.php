<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/grayscale.min.css" rel="stylesheet">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center bg-secondary" style="min-height: 100vh;"> 
        
        <form class="p-5 rounded shadow bg-light" action="auth.php" method="POST">
        <h1 class="text-center pb-5 display-4">Iniciar sesión</h1>
        <?php if(isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
        </div>
        <?php } ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary align-content-center">Enviar</button> <br><br>
  <a role="button" href="presentacion.php" class="btn btn-success">Ir al modo de presentación</a>
</form>
    </div>
</body>
</html>