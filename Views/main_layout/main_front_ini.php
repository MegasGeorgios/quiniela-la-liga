<?php session_start(); 

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0)
{
  header('Location:login.php');
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

  <title>Quiniela la liga</title>

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

  .top-front{
    padding-top: 15px;
  }

  .left-nav{
    padding-left: 10px;
  }
  </style>
</head>

<body class="bg-dark">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    
    <a class="navbar-brand mr-1" href="home.php">Bienvenido <?php echo $_SESSION['user_name']; ?> !</a>
    <a class="navbar-brand mr-1 left-nav" href="home.php?view=positions_teams">La Liga</a>
    <a class="navbar-brand mr-1 left-nav" href="home.php?view=all_results">Calendario</a>
    <a class="navbar-brand mr-1 left-nav" href="home.php?view=all_players-goals">Goleadores</a>
    <a class="navbar-brand mr-1 left-nav" href="home.php?view=all_players-asists">Asistidores</a>
    <a class="navbar-brand mr-1 left-nav" href="#">Mis quinielas</a>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-12">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="home.php?view=edit_user&user_id=<?= $_SESSION['user_id']; ?>">Perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="page_admin.php?view=logout">Cerrar sesión</a>
        </div>
      </li>      
    </ul>

  </nav>