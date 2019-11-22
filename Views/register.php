<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registarse</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="name" name="name" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="name">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name" required="required">
                  <label for="lastname">Apellidos</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" required="required" autofocus="autofocus">
                  <label for="dni">DNI</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="phone" name="phone" class="form-control" placeholder="Móvil" required="required">
                  <label for="phone">Móvil</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required">
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
          <a class="btn btn-primary btn-block" href="login.php">Registrar</a>
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
