<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/favicon.ico">

  <title>Registrar usuario</title>

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
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registarse</div>
      <div class="card-body">
        <?php if (isset($_GET['registered']) && $_GET['registered'] == 'failedPass'): ?>
          <?php echo '<div class="alert alert-danger" role="alert">'.'Las contraseñas no coinciden!'.'</div>';  ?>
        <?php endif ?>
        <?php if (isset($_GET['registered']) && $_GET['registered'] == 'failedExist'): ?>
          <?php echo '<div class="alert alert-danger" role="alert">'.'Ya existe un usuario registrado con este DNI o Email!'.'</div>';  ?>
        <?php endif ?>
        <form action="page_admin.php?view=registre_user" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" autocomplete="off" required="required" autofocus="autofocus">
                  <label for="name">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Apellido" autocomplete="off" required="required">
                  <label for="lastName">Apellidos</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" autocomplete="off" required="required" autofocus="autofocus">
                  <label for="dni">DNI</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="phone" name="phone" class="form-control" placeholder="Móvil" autocomplete="off" required="required">
                  <label for="phone">Móvil</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required="required">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required="required">
                  <label for="pass">Contraseña</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPass" name="confirmPass" class="form-control" placeholder="Confirmar contraseña" required="required">
                  <label for="confirmPass">Confirmar contraseña</label>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Registrar">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Iniciar sesión</a>
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
