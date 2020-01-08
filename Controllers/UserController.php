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
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		if (isset($_GET['user_id'])) 
		{
			$userID = $_GET['user_id'];
			$userModel = new User();
			$user = $userModel->getUserById($userID);
		}

		$rol = new Rol();
		$roles = $rol->getRoles();
		
		$include = '../Views/components/crud_user.php';
		require_once($include);
	}

	// Almacenar en db un nuevo usuario
	public function storeUser()
	{
		if (isset($_POST) && !empty($_POST['pass']) && ($_POST['pass'] == $_POST['confirmPass'])) 
		{
			//obtener datos del formulario eliminar espacios al inicio/fin y sanitizar
			$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
			$lastName = trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
			$dni = strtoupper(trim(filter_var($_POST['dni'], FILTER_SANITIZE_STRING)));
			$phone = trim(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
			$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
			$pass = md5(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
			$created = date("Y-m-d H:i:s");

			if (isset($_POST['rol_id'])) {
				$rol_id = filter_var($_POST['rol_id'], FILTER_VALIDATE_INT);
			}else{
				$rol_id = 2; // rol por defecto (no admin)
			}
			
			$userModel = new User();
			$userID = $userModel->storeUser($name, $lastName, $dni, $phone, $email, $pass, $created, $rol_id);
			header('Location:../Views/page_admin.php?view=edit_user&user_id='.$userID);

		}elseif($_POST['pass'] != $_POST['confirmPass'])
		{
			BaseController::msgDanger('Las contraseñas no coinciden!');
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar añadir el usuario!');
			die();
		}
	}

	// Eliminar un usuario
	public function deleteUser()
	{
		if (isset($_GET['user_id'])) 
		{
			$userModel = new User();
			$id = filter_var($_GET['user_id'], FILTER_VALIDATE_INT);
			$response = $userModel->deleteUser($id);

			BaseController::msgValidate($response);
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar eliminar el usuario!');
			die();
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
		
		$userModel = new User();
		$users = $userModel->getUsers();
		$include = '../Views/components/all_users.php';
		require_once($include);
	}

	// Actualizar usuario
	public function updateUser()
    {
    	if (isset($_POST) && isset($_GET['user_id'])) 
    	{
    		//obtener datos del formulario eliminar espacios al inicio/fin y sanitizar
    		$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
			$lastName = trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
			$dni = trim(filter_var($_POST['dni'], FILTER_SANITIZE_STRING));
			$phone = trim(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
			$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
			$pass = md5(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
			$rol_id = filter_var($_POST['rol_id'], FILTER_VALIDATE_INT);

			if ($_SESSION['user_rol'] == "Administrador") 
			{
				$id = filter_var($_GET['user_id'], FILTER_VALIDATE_INT);
			}else
			{	
				$id = $_SESSION['user_id'];
			}

			$userModel = new User();

	    	//actualizar todos los datos del usuario incluida contraseña
	    	if (!empty($_POST['pass']) && ($_POST['pass'] == $_POST['confirmPass'])) 
			{
				$response = $userModel->updateUser($name, $lastName, $dni, $phone, $email, $pass, $rol_id, $id);
				
				BaseController::msgValidate($response);

			// Actualizar todo menos la contraseña
			}elseif(empty($_POST['pass']) && empty($_POST['confirmPass']))
			{
				$response = $userModel->updateUser($name, $lastName, $dni, $phone, $email, $pass='noUpdate', $rol_id, $id);
				BaseController::msgValidate($response);

			}elseif($_POST['pass'] != $_POST['confirmPass'])
			{
				BaseController::msgDanger('Las contraseñas no coinciden!');
			}

			$this->crudUser();
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar actualizar el usuario!');
			die();
		}
    }
}



 ?>