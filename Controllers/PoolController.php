<?php

require_once('BaseController.php');
require_once('../Models/Pool.php');
require_once('../Models/Match.php');
require_once('../Models/Award.php');

/**
 * Controlador Quiniela
 */
class PoolController extends BaseController
{
	private $user_id;

	public function __construct()
	{
		$this->user_id = $_SESSION['user_id'];
	}

	// Retornar la vista para añadir quiniela
	public function addPool()
	{	
		if (BaseController::$msg) 
		{
			BaseController::msgSuccess(BaseController::$msg);
		}
		
		$matchModel = new Match();
		$fixture = $matchModel->getFixtureByDate(date('Y-m-d'))['fixture'];

		if (!empty($fixture)) 
		{
			$matches = $matchModel->getMatchesByFixture($fixture);

			// comprobar que no se jugo ningun partido en esa jornada
			// si ya se ha jugado al menos 1 partido obtenemos los partidos de la siguente jornada
			foreach ($matches as $match) 
			{
				if ($match['match_date'] < date('Y-m-d H:i:s')) 
				{
					$fixture++;
					$matches = $matchModel->getMatchesByFixture($fixture);
					break;
				}
			}
		}
		
		$include = '../Views/components/crud_pool.php';
		require_once($include);
	}

	// Obtener quinielas de un usuario 
	public function getPoolsByUser()
	{	
		$pools = [];
		$poolModel = new Pool();

		if (isset($_GET['view']) && $_GET['view']=='show_pools') 
		{
			$user_id = $_GET['user_id'];
		}else{
			$user_id = $this->user_id;
		}

		$q_pools = $poolModel->getPoolsByUser($user_id);
		$awardModel = new Award();
		$awards = $awardModel->getAwards();

		foreach ($q_pools as $q_pool) 
		{
			// aciertos
			$successes = 0;

			$r = $poolModel->getPoolResults($q_pool['id']);

			foreach ($r as $q) 
			{
				if (isset($q['score_home']) && isset($q['score_visit'])) 
				{
					// si acierta que gano el equipo local
					if ($q['score_home'] > $q['score_visit'] && $q['prognostic'] == 1) 
					{
						$successes++;

					// si acierta que gano el equipo visitante
					}elseif ($q['score_home'] < $q['score_visit'] && $q['prognostic'] == 2) 
					{
						$successes++;

					// si acierta que los equipos empataron
					}elseif ($q['score_home'] == $q['score_visit'] && $q['prognostic'] == 'x') 
					{
						$successes++;
					}

					$state = 'CERRADA';

				}else{
					$state = 'ABIERTA';
				}
			}

			// Premios si obtuvo el numero de aciertos requeridos
			foreach ($awards as $award) 
			{
				if ($award['position'] == $successes) 
				{
					$user_award = $award['award'].'€';
				}else
				{
					$user_award = '0€';
				}
			}
			

			$pools[] = [
				'pool_id'	=> $q_pool['id'],
				'created'	=> $q_pool['created'],
				'successes' => $successes,
				'num_matches' => 10,
				'state'		=> $state,
				'award'		=> $user_award
			];

		}

		$include = '../Views/components/all_pools.php';
		require_once($include);		
	}

	// Mostrar resultados de una quiniela
	public function showPool()
	{
		if (isset($_GET['pool_id'])) 
		{
			$poolModel = new Pool();
			$poolResults = $poolModel->getPoolResults($_GET['pool_id']);
		}

		$include = '../Views/components/crud_pool.php';
		require_once($include);
	}

	// Almacenar en db un nuevo rol
	public function storePool()
	{
		if (isset($_POST)) 
		{
			$pool_results = $_POST['pool_results'];
			$matches_ids = $_POST['matches_ids'];

			$poolModel = new Pool();

			$pool_id = $poolModel->createPool($this->user_id, date("Y-m-d H:i"));

			for ($i=0; $i < count($pool_results); $i++) 
			{				
				$response = $poolModel->storePool($pool_id, $pool_results[$i], $matches_ids[$i]);
			}		

			BaseController::msgValidate($response);
		}

		$this->addPool();
	}

}



 ?>