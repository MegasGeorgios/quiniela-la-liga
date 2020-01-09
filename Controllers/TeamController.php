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

	// Listar todos los equipos por posiciones
	public function positionsTeams()
	{	
		$standing = [];
		$teamModel = new Team();
		$teams = $teamModel->getTeams();

		foreach ($teams as $team) 
		{
			$points = 0;
			$winsLocal = 0;
			$drawsLocal =  0;
			$losesLocal = 0;
			$winsVisit = 0;
			$drawsVisit =  0;
			$losesVisit =   0;
			$goalsF =  0;
			$goalsC =  0;
			$diffGoals = 0;
			$games = 0;

			// resultados por equipo
			$teamsResults = $teamModel->teamResults($team['id']);
			$games = count($teamsResults);

			foreach ($teamsResults as $result) 
			{
				// Victoria como local
				if ($team['id'] == $result['id_team_home'] && $result['score_home'] > $result['score_visit']) 
				{
					$points = $points+3;
					$winsLocal = $winsLocal+1;
					$goalsF = $goalsF+$result['score_home']; 
					$goalsC = $goalsC+$result['score_visit'];
					$diffGoals = $diffGoals+($result['score_home']-$result['score_visit']);
				
				// Victoria como visitante
				}elseif ($team['id'] == $result['id_team_visit'] && $result['score_visit'] > $result['score_home']) 
				{
					$points = $points+3;
					$winsVisit = $winsVisit+1;
					$goalsF = $goalsF+$result['score_visit']; 
					$goalsC = $goalsC+$result['score_home'];
					$diffGoals = $diffGoals+($result['score_visit']-$result['score_home']);

				// Derrota como local	
				}elseif ($team['id'] == $result['id_team_home'] && $result['score_home'] < $result['score_visit']) 
				{
					$losesLocal = $losesLocal+1;
					$goalsF = $goalsF+$result['score_home']; 
					$goalsC = $goalsC+$result['score_visit'];
					$diffGoals = $diffGoals+($result['score_home']-$result['score_visit']);
				
				// Derrota como visitante
				}elseif ($team['id'] == $result['id_team_visit'] && $result['score_visit'] > $result['score_home']) 
				{
					$losesVisit = $losesVisit+1;
					$goalsF = $goalsF+$result['score_visit']; 
					$goalsC = $goalsC+$result['score_home'];
					$diffGoals = $diffGoals+($result['score_visit']-$result['score_home']);
				
				// Empate como local
				}elseif ($team['id'] == $result['id_team_home'] && $result['score_home'] == $result['score_visit']) 
				{
					$points = $points+1;
					$drawsLocal = $drawsLocal+1;
					$goalsF = $goalsF+$result['score_home']; 
					$goalsC = $goalsC+$result['score_visit'];
				
				// Empate como visitnte
				}elseif ($team['id'] == $result['id_team_visit'] && $result['score_visit'] == $result['score_home']) 
				{
					$points = $points+1;
					$drawsVisit = $drawsVisit+1;
					$goalsF = $goalsF+$result['score_visit']; 
					$goalsC = $goalsC+$result['score_home'];
				}
			}

			$standing[] = [
				'teamName' => $team['name'],
				'points' => $points,
				'games' => $games,
				'wins' => $winsLocal+$winsVisit,
				'draws' => $drawsLocal+$drawsVisit,
				'loses' => $losesLocal+$losesVisit,
				'winsLocal' => $winsLocal,
				'drawsLocal' => $drawsLocal,
				'losesLocal' => $losesLocal,
				'winsVisit' => $winsVisit,
				'drawsVisit' => $drawsVisit,
				'losesVisit' => $losesVisit,
				'goalsF' => $goalsF,
				'goalsC' => $goalsC,
				'diffGoals' => $diffGoals
			];
			 	
		}

		// ordenar los equipos por puntuacion
		foreach ($standing as $key => $row) {
		    $aux[$key] = $row['points'];
		}

		array_multisort($aux, SORT_DESC, $standing);

		$include = '../Views/components/positions_teams.php';
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