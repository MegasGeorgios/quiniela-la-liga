<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/favicon.ico">

  <title>Iniciar sesión</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Iniciar sesión</div>
      <?php if (isset($_GET['logged']) && $_GET['logged'] == 'failed'){ ?>
        <?php echo '<div class="alert alert-danger" role="alert">'.'Email o contraseña inválido!'.'</div>';  ?>
      <?php }elseif(isset($_GET['logged']) && $_GET['logged'] == 'passReset'){ ?>
        <?php echo '<div class="alert alert-success" role="alert">'.'Contraseña restablecida!'.'</div>';  ?>
      <?php }elseif(isset($_GET['logged']) && $_GET['logged'] == 'emailSent'){ ?>
        <?php echo '<div class="alert alert-success" role="alert">'.'Email de recuperación de contraseña enviado!'.'</div>';  ?>
      <?php } ?>
      <div class="card-body">
        <form action="page_admin.php?view=login_user" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required="required">
              <label for="pass">Contraseña</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Iniciar sesión">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Registrarse</a>
          <a class="d-block small" href="forgot-password.php">Has olvidado tu contraseña?</a>
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
