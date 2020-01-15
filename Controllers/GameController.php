<?php

require_once('BaseController.php');
require_once('../Models/Team.php');
require_once('../Models/Match.php');

/**
 * Controlador 
 */
class GameController extends BaseController
{
	// Retornar la vista para añadir/editar/eliminar partido 
	public function crudMatch()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		$teamModel = new Team();
		$teams = $teamModel->getTeams();
		
		$include = '../Views/components/crud_match.php';
		require_once($include);
	}

	// Retornar la vista para añadir/editar/eliminar resultado 
	public function crudResult()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		$matchModel = new Match();

		if (isset($_GET['result_id'])) 
		{
			$resultID = $_GET['result_id'];
			$result = $matchModel->getResultById($resultID);
		}

		if (isset($_POST['fixture'])) 
		{
			$fixture = filter_var($_POST['fixture'], FILTER_VALIDATE_INT);
			$matches = $matchModel->getMatchesByFixture($fixture);			
		}
				
		$include = '../Views/components/crud_result.php';
		require_once($include);
	}

	// Almacenar en db un nuevo partido
	public function storeMatch()
	{
		if (isset($_POST)) 
		{
			$homeTeams = $_POST['homeTeams'];
			$visitTeams = $_POST['visitTeams'];
			$fixture = $_POST['fixture'];
			$match_dates = $_POST['match_dates'];
			$match_times = $_POST['match_times'];

			if ($fixture == 0) 
			{
				BaseController::msgDanger("Debes seleccionar una jornada !");

				return;
			}

			$matchModel = new Match();

			for ($i=0; $i < count($homeTeams); $i++) 
			{
				// formato id-teamName, explode con delimitador '-' y obtenemos en posicion 0 el id y en pos 1 el nombre del equipo
				$homeTeam[$i] = explode('-',$homeTeams[$i]);
				$visitTeam[$i] = explode('-',$visitTeams[$i]);
				$dateTime = $match_dates[$i].' '.$match_times[$i];

				$response = $matchModel->storeMatch($homeTeam[$i][0], $visitTeam[$i][0], $homeTeam[$i][1], $visitTeam[$i][1], $fixture, $dateTime);
			}		

			BaseController::msgValidate($response);
		}

		$this->crudMatch();
	}

	// Almacenar en db un nuevo resultado
	public function storeResult()
	{
		if (isset($_POST)) 
		{
			$score_home = $_POST['score_home'];
			$score_visit = $_POST['score_visit'];
			$matches_ids = $_POST['matches_ids'];

			$matchModel = new Match();

			for ($i=0; $i < count($score_home); $i++) 
			{				
				$response = $matchModel->storeResult($score_home[$i], $score_visit[$i], $matches_ids[$i]);
			}		

			BaseController::msgValidate($response);
		}

		$this->crudResult();
	}

	// Actualizar resultado
	public function updateResult()
    {
    	if (isset($_POST)) 
    	{
    		//obtener datos del formulario
    		$score_home = filter_var($_POST['score_home'], FILTER_VALIDATE_INT);
    		$score_visit = filter_var($_POST['score_visit'], FILTER_VALIDATE_INT);
			$id = filter_var($_POST['result_id'], FILTER_VALIDATE_INT);

			$matchModel = new Match();
			$response = $matchModel->updateResult($score_home, $score_visit, $id);
			BaseController::msgValidate($response);

			$this->crudResult();
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar actualizar el resultado!');
			die();
		}
    }

	// Eliminar un resultado
	public function deleteResult()
	{
		if (isset($_GET['result_id'])) 
		{
			$matchModel = new Match();
			$id = filter_var($_GET['result_id'], FILTER_VALIDATE_INT);
			$response = $matchModel->deleteResult($id);

			BaseController::msgValidate($response);
		}else
		{
			BaseController::msgDanger('Ha ocurrido un error al intentar eliminar el resultado!');
			die();
		}

		$this->showMatchesAndResults();
	}

	// Mostrar los partidos y resultados
	public function showMatchesAndResults()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}

		$teamModel = new Team();
		$matchModel = new Match();

		$teams = $teamModel->getTeams();

		// si la jornada o id del equipo son distintos a 0, filtrar.
		if (isset($_POST['fixture']) && isset($_POST['team_id']) && ($_POST['fixture'] != 0 || $_POST['team_id'] != 0))
		{
			$fixture = $_POST['fixture'];
			$team_id = $_POST['team_id'];
			
			if ($fixture != 0 && $team_id != 0)
			{
				$matches = $matchModel->getMatchTeamByFixture($team_id, $fixture);	
			}elseif ($fixture != 0 && $team_id == 0) 
			{
				$matches = $matchModel->getMatchesByFixture($fixture);
			}elseif ($fixture == 0 && $team_id != 0) 
			{
				$matches = $matchModel->getMatchesByTeam($team_id);
			}
		}else
		{
			$matches = $matchModel->getMatchesWithResults();
		}

		$include = '../Views/components/all_results.php';
		require_once($include);
	}
}

?>