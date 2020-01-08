<?php 
session_start();

if (isset($_SESSION['user_id'])) 
{
	header("Location:./Views/page_admin.php?view=dashboard");
}else
{
	header("Location:./Views/login.php");
}


?>