<?php include('main_layout/main_front_ini.php'); ?>

  <div class="container top-front">
   	
   	<?php 

   		// ruta editar perfil
   		if (isset($_GET['view']) && ($_GET['view'] == 'edit_user' || $_GET['view'] == 'update_user')) 
		{
			$include = '../Controllers/UserController.php';
			$controller = 'UserController';
			
			if ($_GET['view'] == 'update_user') 
			{
				$method = 'updateUser';
			}else{
				$method = 'crudUser';
			}
		
		// ruta ver goleadores de la liga
		}elseif (isset($_GET['view']) && $_GET['view'] == 'all_players-goals') 
		{
			$include = '../Controllers/PlayerController.php';
			$controller = 'PlayerController';
			$method = 'TopGoalsPlayers';
			
		// ruta ver asistidores de la liga
		}elseif (isset($_GET['view']) && $_GET['view'] == 'all_players-asists') 
		{
			$include = '../Controllers/PlayerController.php';
			$controller = 'PlayerController';
			$method = 'TopAsistsPlayers';

		// ruta ver los resultados de los partidos
		}elseif (isset($_GET['view']) && $_GET['view'] == 'all_results') 
		{
			$include = '../Controllers/GameController.php';
			$controller = 'GameController';
			$method = 'showMatchesAndResults';

		// ruta ver la tabla de clasificaion de la liga
		}elseif (isset($_GET['view']) && $_GET['view'] == 'positions_teams' || !isset($_GET['view'])) 
		{
			$include = '../Controllers/TeamController.php';
			$controller = 'TeamController';
			$method = 'positionsTeams';

		// ruta mis quinielas
		}elseif (isset($_GET['view']) && ($_GET['view'] == 'pools' || $_GET['view'] == 'pool' || $_GET['view'] == 'store_pool' || $_GET['view'] == 'add_pool')) 
		{	
			$include = '../Controllers/PoolController.php';
			$controller = 'PoolController';
			
			if ($_GET['view'] == 'pools') 
			{
				$method = 'getPoolsByUser';
			}elseif ($_GET['view'] == 'pool')
			{
				$method = 'showPool';
			}elseif ($_GET['view'] == 'store_pool')
			{
				$method = 'storePool';
			}else{
				$method = 'addPool';
			}

		}else
		{	
			$include = '404.php';
		}

		include_once($include);

		if ($include != '404.php') 
		{	
			$controller = new $controller;
			call_user_func( array( $controller, $method ) );
		}
   	?>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
