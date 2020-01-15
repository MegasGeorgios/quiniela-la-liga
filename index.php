<?php 
session_start();

// si el usuario no esta logueado redirigir al login 
if (!isset($_SESSION['user_id'])) 
{
	header("Location:./Views/login.php");
}


?>