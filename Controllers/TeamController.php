<?php

require_once('BaseController.php');
require_once('../Models/Team.php');

/**
 * Controlador Equipo
 */
class TeamController extends BaseController
{
	// Retornar la vista para añadir/editar/eliminar equipo 
	public function crudTeam()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		if (isset($_GET['team_id'])) 
		{
			$teamID = $_GET['team_id'];
			$teamModel = new Team();
			$team = $teamModel->getTeamById($teamID);
		}
		
		$include = '../Views/components/crud_team.php';
		require_once($include);
	}

	// Almacenar en db un nuevo equipo
	public function storeTeam()
	{
		if (isset($_POST)) 
		{
			$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
			$slug = trim(filter_var($_POST['slug'], FILTER_SANITIZE_STRING));

			$teamModel = new Team();
			$teamID = $teamModel->storeTeam($name, $slug);
			header('Location:../Views/page_admin.php?view=edit_team&team_id='.$teamID);

		}else{
			BaseController::msgDanger('Ha ocurrido un error al intentar añadir el equipo!');
			die();
		}
	}

	// Eliminar un equipo
	public function deleteTeam()
	{
		if (isset($_GET['team_id'])) 
		{
			$teamModel = new Team();
			$id = filter_var($_GET['team_id'], FILTER_VALIDATE_INT);
			$response = $teamModel->deleteTeam($id);

			BaseController::msgValidate($response);
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar eliminar el equipo!');
			die();
		}

		$this->allTeams();
	}

	// Listar todos los equipos
	public function allTeams()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}
		
		$teamModel = new Team();
		$teams = $teamModel->getTeams();
		$include = '../Views/components/all_teams.php';
		require_once($include);
	}

	// Actualizar equipo
	public function updateTeam()
    {
    	if (isset($_POST) && isset($_GET['team_id'])) 
    	{
    		//obtener datos del formulario
    		$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
			$slug = trim(filter_var($_POST['slug'], FILTER_SANITIZE_STRING));
			$id = filter_var($_GET['team_id'], FILTER_VALIDATE_INT);

			$teamModel = new Team();
			$response = $teamModel->updateTeam($name, $slug, $id);
			BaseController::msgValidate($response);

			$this->crudTeam();
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar actualizar el equipo!');
			die();
		}
    }
}

?>