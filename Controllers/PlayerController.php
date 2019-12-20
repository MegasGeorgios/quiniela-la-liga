<?php

require_once('BaseController.php');
require_once('../Models/Team.php');
require_once('../Models/Player.php');

/**
 * Controlador jugador
 */
class PlayerController extends BaseController
{
	// Retornar la vista para añadir/editar/eliminar jugador 
	public function crudPlayer()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		if (isset($_GET['player_id']) && $_GET['view'] != 'delete_player') 
		{
			$playerID = $_GET['player_id'];
			$playerModel = new Player();
			$player = $playerModel->getPlayerById($playerID);
		}

		$teamModel = new Team();
		$teams = $teamModel->getTeams();
		
		$include = '../Views/components/crud_player.php';
		require_once($include);
	}

	// Almacenar en db un nuevo jugador
	public function storePlayer()
	{
		if (isset($_POST)) 
		{
			$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
			$dorsal = filter_var($_POST['dorsal'], FILTER_VALIDATE_INT);
			$goals = filter_var($_POST['goals'], FILTER_VALIDATE_INT);
			$asists = filter_var($_POST['asists'], FILTER_VALIDATE_INT);
			$team_id = filter_var($_POST['team_id'], FILTER_VALIDATE_INT);

			$playerModel = new Player();
			$playerID = $playerModel->storePlayer($name, $dorsal, $goals, $asists, $team_id);
			header('Location:../Views/page_admin.php?view=edit_player&player_id='.$playerID);

		}else{
			BaseController::msgDanger('Ha ocurrido un error al intentar añadir el jugador!');
			die();
		}
	}

	// Eliminar un jugador
	public function deletePlayer()
	{
		if (isset($_GET['player_id'])) 
		{
			$playerModel = new Player();
			$id = filter_var($_GET['player_id'], FILTER_VALIDATE_INT);
			$response = $playerModel->deletePlayer($id);

			BaseController::msgValidate($response);
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar eliminar el jugador!');
			die();
		}

		$this->crudPlayer();
	}

	// Listar top goleadores
	public function TopGoalsPlayers()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}
		
		$playerModel = new Player();
		$players = $playerModel->getTopGoalsPlayers();
		$include = '../Views/components/top_players.php';
		require_once($include);
	}

	// Listar top asistidores
	public function TopAsistsPlayers()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}
		
		$playerModel = new Player();
		$players = $playerModel->getTopAsistsPlayers();
		$include = '../Views/components/top_players.php';
		require_once($include);
	}

	// Actualizar jugador
	public function updatePlayer()
    {
    	if (isset($_POST) && isset($_GET['player_id'])) 
    	{
    		//obtener datos del formulario eliminar espacios al inicio/fin y sanitizar
    		$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
			$dorsal = filter_var($_POST['dorsal'], FILTER_VALIDATE_INT);
			$goals = filter_var($_POST['goals'], FILTER_VALIDATE_INT);
			$asists = filter_var($_POST['asists'], FILTER_VALIDATE_INT);
			$team_id = filter_var($_POST['team_id'], FILTER_VALIDATE_INT);
			$id = filter_var($_GET['player_id'], FILTER_VALIDATE_INT);

			$playerModel = new Player();
			$response = $playerModel->updatePlayer($name, $dorsal, $goals, $asists, $team_id, $id);
			BaseController::msgValidate($response);

			$this->crudPlayer();
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar actualizar el jugador!');
			die();
		}
    }
}

?>