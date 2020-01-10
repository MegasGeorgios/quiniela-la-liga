<?php

require_once('BaseController.php');
require_once('../Models/User.php');
require_once('../Models/Team.php');

/**
 * Controlador de autentificacion
 */
class AuthController extends BaseController
{
	// Login usuario
	public function loginUser()
	{	
		session_start();

		$user['logged'] = false;
		if (isset($_POST) && !empty($_POST['email']) && !empty($_POST['pass'])) 
		{
			$userModel = new User();
			$user = $userModel->loginUser($_POST['email'], md5($_POST['pass']));
		}

		// $user['logged'] sera falso si no se encuentra un usuario en la bd con las credenciales dadas
		if ($user['logged'])
		{		 	
		 	$_SESSION['user_id'] = $user['userData']['user_id'];
		 	$_SESSION['user_name'] = $user['userData']['name'];
		 	$_SESSION['user_rol'] = $user['userData']['rol'];
		 	$_SESSION['status'] = 'logged';

		 	// TODO: cambiar redireccion para usuarios no administradores 
		 	if ($user['userData']['rol'] == 'Administrador') 
		 	{
		 		header('Location:../Views/page_admin.php?view=dashboard');
		 	}else{
		 		header('Location:../Views/home.php?view=all_players-goals');
		 	}

		}else{
			$_SESSION['status'] = 'failed';
		} 
	}

	// Cerrar sesion
	public function logout()
	{
		session_destroy();
		header('Location:../Views/login.php');
	}

	// Registrar usuario
	public function registreUser()
	{
		unset($_SESSION['status']);

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
			$rol_id = 2; // rol por defecto (no admin)
			
			$userModel = new User();
			session_start();

			// validamos si ya existe un usuario registrado con el DNI o EMAIL en bd
			/*if ( $userModel->validateDniAndEmail($dni, $email) == true ) 
			{*/
				$userID = $userModel->storeUser($name, $lastName, $dni, $phone, $email, $pass, $created, $rol_id);

			 	$_SESSION['user_id'] = $userID;
			 	$_SESSION['user_name'] = $name;
			 	$_SESSION['user_rol'] = 'Suscriptor';
			 	$_SESSION['status'] = 'logged';

				header('Location:../Views/home.php');

			/*}else{
				$_SESSION['status'] = 'failedExist';
			}*/

		}elseif($_POST['pass'] != $_POST['confirmPass'])
		{	
			$_SESSION['status'] = 'failedPass';
		}else
		{
			die('Ha ocurrido un error fatal al intentar registrarse!');
		}
	}

}



 ?>