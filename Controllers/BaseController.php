<?php 

/**
 * Controlador Base
 */
class BaseController
{
	static $msg = false;

	// Mensaje operacion realizada con exito
	public static function msgSuccess($msg) 
	{
		echo '<div class="alert alert-success" role="alert">'.$msg.'</div>'; 
	}

	// Mensaje operacion no se pudo realizar debido a un error
	public static function msgDanger($msg) 
	{
		echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>'; 
	}

	// validar si existe un error y dependiendo de esto lanzar el mensaje
	public static function msgValidate($response) {
		if ($response['error']) 
		{
			self::msgDanger($response['msg']);
			die();
		}else
		{
			self::$msg = $response['msg'];
		}
	}
}








 ?>