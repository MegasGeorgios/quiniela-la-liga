<?php

require_once('../Models/User.php');
require_once('../Models/Rol.php');

/**
 * Controlador User
 */
class UserController
{
	
	// Retornar la vista para añadir/editar/eliminar usuario 
	public function crudUser($userID = NULL)
	{	
		if (isset($_GET['user_id'])) 
		{
			$userID = $_GET['user_id'];
		}

		if (!is_null($userID)) 
		{
			$user = new User();
			$user = $user->getUserById($userID);
		}else{
			$rol = new Rol();
			$roles = $rol->getRoles();
		}

		$include = '../Views/components/crud_user.php';
		require_once($include);
	}

	// Almacenar en db un nuevo usuario
	public function storeUser()
	{
		if (isset($_POST)) 
		{
			// https://www.w3schools.com/php/php_filter.asp
			$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
			$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
			$dni = filter_var($_POST['dni'], FILTER_SANITIZE_STRING);
			$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$pass = md5(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
			$rol_id = (int) $_POST['rol_id'];

			$user = new User();
			$userID = $user->storeUser($name, $lastName, $dni, $phone, $email, $pass, $rol_id);
		}

		$this->crudUser($userID);
	}

	// Listar todos los usuarios
	public function allUsers()
	{
		$user = new User();
		$users = $user->getUsers();
		$include = '../Views/components/all_users.php';
		require_once($include);
	}
}



 ?>