<?php

require_once('BaseController.php');
require_once('../Models/Rol.php');

/**
 * Controlador User
 */
class RolController extends BaseController
{
	// Retornar la vista para añadir/editar/eliminar rol 
	public function crudRol()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		$rol = new Rol();
		$roles = $rol->getRoles();

		$include = '../Views/components/crud_roles.php';
		require_once($include);
	}

	// Almacenar en db un nuevo rol
	public function storeRol()
	{
		if (isset($_POST)) 
		{
			$name = filter_var($_POST['rol'], FILTER_SANITIZE_STRING);

			$rol = new Rol();
			$response = $rol->storeRol($name);

			BaseController::msgValidate($response);
		}

		$this->crudRol();
	}

	// Eliminar un rol
	public function deleteRol()
	{
		if (isset($_GET['rol_id'])) 
		{
			$rol = new Rol();
			$id = filter_var($_GET['rol_id'], FILTER_VALIDATE_INT);
			$response = $rol->deleteRol($id);

			BaseController::msgValidate($response);
		}

		$this->crudRol();
	}

}



 ?>