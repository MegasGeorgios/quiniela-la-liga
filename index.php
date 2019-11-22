<?php 
session_start();

if (isset($_SESSION['user_id'])) 
{
	header("Location:./Views/index.php");
}else
{
	header("Location:./Views/login.php");
}


?>