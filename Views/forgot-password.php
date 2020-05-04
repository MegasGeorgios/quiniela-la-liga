<?php 

if (isset($_POST['token'])) 
{
  include_once('../Controllers/AuthController.php');

  $resp = AuthController::saveNewPass($_POST['token'], md5($_POST['pass']));

  if ($resp['error']) 
  {
    BaseController::msgDanger($resp['msg']);
  }else{
    header('Location:login.php?logged=passReset');
  }
  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/favicon.ico">

  <title>Recuperar contraseña</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <style type="text/css">
    body {
     background-image: url("img/estadio-futbol.jpg");
     background-repeat: no-repeat;
     background-size:100% 100%;
    }
  </style>

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Restablecer la contraseña</div>
      <div class="card-body">
        <?php if (isset($_GET['token'])) { ?>
          <div class="text-center mb-4">
            <h4>Ingrese su nueva contraseña</h4>
          </div>
          <form action="forgot-password.php?token=<?= $_GET['token']; ?>" method="POST">
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="pass" id="inputpass" class="form-control" placeholder="Contraseña" required="required" autofocus="autofocus">
                <label for="inputpass">Contraseña</label>
              </div>
            </div>
            <input type="hidden" name="token" value="<?= $_GET['token']; ?>">
            <input type="submit" class="btn btn-primary btn-block" value="Restablecer contraseña">
          </form>
        <?php }else{ ?>
          <div class="text-center mb-4">
            <h4>Olvidaste tu contraseña?</h4>
            <p>Ingrese su dirección de correo electrónico y le enviaremos instrucciones sobre cómo restablecer su contraseña.En caso de no recibir el email, rivise su bandeja de spam.</p>
          </div>
          <form action="page_admin.php?view=reset_pass" method="POST">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
                <label for="inputEmail">Email</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Restablecer contraseña">
          </form>
        <?php } ?>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Registrarse</a>
          <a class="d-block small" href="login.php">Iniciar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
