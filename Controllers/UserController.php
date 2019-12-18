<?php

require_once('BaseController.php');
require_once('../Models/User.php');
require_once('../Models/Rol.php');

/**
 * Controlador User
 */
class UserController extends BaseController
{
	// Retornar la vista para añadir/editar/eliminar usuario 
	public function crudUser()
	{	
		if (isset($_GET['user_id'])) 
		{
			$userID = $_GET['user_id'];
			$user = new User();
			$user = $user->getUserById($userID);
		}

		$rol = new Rol();
		$roles = $rol->getRoles();
		
		$include = '../Views/components/crud_user.php';
		require_once($include);
	}

	// Almacenar en db un nuevo usuario
	public function storeUser()
	{
		if (isset($_POST)) 
		{
			$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
			$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
			$dni = filter_var($_POST['dni'], FILTER_SANITIZE_STRING);
			$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$pass = md5(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
			$created = date("Y-m-d H:i:s");
			$rol_id = (int) $_POST['rol_id'];

			$user = new User();
			$userID = $user->storeUser($name, $lastName, $dni, $phone, $email, $pass, $created, $rol_id);
			header('Location:../Views/page_admin.php?view=edit_user&user_id='.$userID);
		}else{
			BaseController::msgDanger('Ha ocurrido un error al intentar añadir el usuario!');
			die();
		}

		
	}

	// Eliminar un usuario
	public function deleteUser()
	{
		if (isset($_GET['user_id'])) 
		{
			$user = new User();
			$id = filter_var($_GET['user_id'], FILTER_VALIDATE_INT);
			$response = $user->deleteUser($id);

			BaseController::msgValidate($response);
		}

		$this->allUsers();
	}

	// Listar todos los usuarios
	public function allUsers()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}
		
		$user = new User();
		$users = $user->getUsers();
		$include = '../Views/components/all_users.php';
		require_once($include);
	}
}



 ?>