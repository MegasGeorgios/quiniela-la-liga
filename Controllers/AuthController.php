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

		 	if ($user['userData']['rol'] == 'Administrador') 
		 	{
		 		header('Location:../Views/page_admin.php?view=dashboard');
		 	}else{
		 		header('Location:../Views/home.php');
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
		session_start();
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
			

			// validamos si ya existe un usuario registrado con el DNI o EMAIL en bd
			if ( $userModel->validateDniAndEmail($dni, $email) == true ) 
			{
				$userID = $userModel->storeUser($name, $lastName, $dni, $phone, $email, $pass, $created, $rol_id);

			 	$_SESSION['user_id'] = $userID;
			 	$_SESSION['user_name'] = $name;
			 	$_SESSION['user_rol'] = 'Suscriptor';
			 	$_SESSION['status'] = 'logged';

				header('Location:../Views/home.php');

			}else{
				$_SESSION['status'] = 'failedExist';
			}

		}elseif($_POST['pass'] != $_POST['confirmPass'])
		{	
			$_SESSION['status'] = 'failedPass';
		}else
		{
			die('Ha ocurrido un error fatal al intentar registrarse!');
		}
	}

	// crear token para recuperar contraseña y enviar email con el link de recuperacion
	public function resetPass()
	{
		if (isset($_POST['email'])) 
		{
			$token = md5(uniqid(rand(), true));
			$email = $_POST['email'];

			$userModel = new User();
			$userModel->saveToken($token, $email);
			$url = 'http://www.quiniela-laliga.com/Views/forgot-password.php?token='.$token;

			$to = $email;
			$from = "admin@quiniela-laliga.com";
			$subject = 'Recuperar contraseña';
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
			 
			// Create email headers
			$headers .= 'From: '.$from."\r\n".
			    'Reply-To: '.$from."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			//$headers = 'From: admin@quiniela-laliga.com';

			$message = '<html><body>';
			$message .= '<b>Link para recuperar contraseña</b><br>';
			$message .= '<a href='.$url.' target="_blank">Click aquí</a>';
			$message .= '</body></html>';
			
			$retval = mail($to,$subject,$message,$headers);

			session_start();
			$_SESSION['status'] = 'emailSent';
		}

	}

	// almacenar nueva contraseña en bd
	public static function saveNewPass($token, $pass)
	{
		$userModel = new User();

		$response = $userModel->saveNewPass($token, $pass);

		return $response;
	}

}



 ?>