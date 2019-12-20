<?php

require_once('BaseController.php');
require_once('../Models/Award.php');

/**
 * Controlador para los premios de usuarios
 */
class AwardController extends BaseController
{
	// Retornar la vista para añadir/editar/eliminar premio 
	public function crudAward()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		$awardModel = new Award();
		$awards = $awardModel->getAwards();

		$include = '../Views/components/crud_awards.php';
		require_once($include);
	}

	// Almacenar en db un nuevo premio
	public function storeAward()
	{
		if (isset($_POST)) 
		{
			$award = filter_var($_POST['award'], FILTER_VALIDATE_INT);
			$position = filter_var($_POST['position'], FILTER_VALIDATE_INT);

			$awardModel = new Award();
			$response = $awardModel->storeAward($award, $position);

			BaseController::msgValidate($response);
		}

		$this->crudAward();
	}

	// Eliminar un premio
	public function deleteAward()
	{
		if (isset($_GET['award_id'])) 
		{
			$awardModel = new Award();
			$id = filter_var($_GET['award_id'], FILTER_VALIDATE_INT);
			$response = $awardModel->deleteAward($id);

			BaseController::msgValidate($response);
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar eliminar el premio!');
			die();
		}

		$this->crudAward();
	}

	// Actualizar premio
	public function updateAward()
    {
    	if (isset($_POST)) 
    	{
    		//obtener datos del formulario
    		$award = filter_var($_POST['award'], FILTER_VALIDATE_INT);
    		$position = filter_var($_POST['position'], FILTER_VALIDATE_INT);
			$award_id = filter_var($_POST['award_id'], FILTER_VALIDATE_INT);

			$awardModel = new Award();
			$response = $awardModel->updateAward($award, $position, $award_id);
			
			BaseController::msgValidate($response);
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar actualizar el premio!');
			die();
		}

		$this->crudAward();
    }

}

?>