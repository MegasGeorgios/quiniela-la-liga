<?php 
session_start(); 

// error credenciales al iniciar sesion
if ($_SESSION['status'] == 'failed') 
{
  header('Location:login.php?logged=failed');

// las contraseñas no coinciden
}elseif($_SESSION['status'] == 'failedPass')
{
  header('Location:register.php?registered=failedPass');

// ya existe un usuario registrado en bd con ese DNI o EMAIL
}elseif($_SESSION['status'] == 'failedExist')
{
  header('Location:register.php?registered=failedExist');

// El email de recuperacion de contraseña ha sido enviado
}elseif($_SESSION['status'] == 'emailSent')
{
  header('Location:login.php?logged=emailSent');

// Si no ha iniciado sesion redirigir al login
}elseif (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0)
{
  header('Location:login.php');

// si no es admin redirigir a home
}elseif ($_SESSION['user_rol'] != 'Administrador') 
{
  header('Location:home.php');
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

  <title><?php echo $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php include_once('layout/nav-bar.php'); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('layout/sidebar.html'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php //include_once('layout/breadcrumb.html'); ?>