<?php

	// Rutas para usuarios
	if (isset($_GET['view']) && ($_GET['view'] == 'add_user' || $_GET['view'] == 'edit_user' || $_GET['view'] == 'store_user' || $_GET['view'] == 'delete_user' || $_GET['view'] == 'update_user' || $_GET['view'] == 'all_users' || $_GET['view'] == 'positions_users'))
	{
		$title= $_GET['view'] == 'add_user' ? 'Admin - Añadir Usuario' : 'Admin - Editar Usuario';
		$include = '../Controllers/UserController.php';
		$controller = 'UserController';

		if ($_GET['view'] == 'add_user' || $_GET['view'] == 'edit_user') {
			$method = 'crudUser';
		}elseif ($_GET['view'] == 'store_user') {
			$method = 'storeUser';
			// call_user_func desde aqui para poder hacer el header location en el controlador
			include_once($include);
			$controller = new $controller;
			call_user_func( array( $controller, $method ) );
		}elseif ($_GET['view'] == 'delete_user') {
			$method = 'deleteUser';
		}elseif ($_GET['view'] == 'update_user') {
			$method = 'updateUser';
		}elseif ($_GET['view'] == 'all_users') {
			$title = 'Admin - Todos los usuarios';
			$method = 'allUsers';
		}elseif ($_GET['view'] == 'positions_users') {
			$title = 'Admin - Posiciones';
			$method = 'positionsUsers';
		}
	
	//Rutas para roles
	}elseif (isset($_GET['view']) && ($_GET['view'] == 'roles' || $_GET['view'] == 'store_rol' || $_GET['view'] == 'delete_rol' || $_GET['view'] == 'update_rol'))
	{
		$title= 'Admin - Roles';
		$include = '../Controllers/RolController.php';
		$controller = 'RolController';

		if ($_GET['view'] == 'roles') {
			$method = 'crudRol';
		}elseif ($_GET['view'] == 'store_rol') {
			$method = 'storeRol';
		}elseif ($_GET['view'] == 'delete_rol') {
			$method = 'deleteRol';
		}elseif ($_GET['view'] == 'update_rol') {
			$method = 'updateRol';
		}
		
	// Rutas para premios
	}elseif (isset($_GET['view']) && ($_GET['view'] == 'awards' || $_GET['view'] == 'store_award' || $_GET['view'] == 'delete_award' || $_GET['view'] == 'update_award'))
	{
		$title= 'Admin - Premios';
		$include = '../Controllers/AwardController.php';
		$controller = 'AwardController';

		if ($_GET['view'] == 'awards') {
			$method = 'crudAward';
		}elseif ($_GET['view'] == 'store_award') {
			$method = 'storeAward';
		}elseif ($_GET['view'] == 'delete_award') {
			$method = 'deleteAward';
		}elseif ($_GET['view'] == 'update_award') {
			$method = 'updateAward';
		}

	// Rutas para equipo
	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_team' || $_GET['view'] == 'edit_team' || $_GET['view'] == 'store_team' || $_GET['view'] == 'delete_team' || $_GET['view'] == 'update_team' || $_GET['view'] == 'all_teams'))
	{
		$title = $_GET['view'] == 'add_team' ? 'Admin - Añadir Equipo' : 'Admin - Editar Equipo';
		$include = '../Controllers/TeamController.php';
		$controller = 'TeamController';

		if ($_GET['view'] == 'add_team' || $_GET['view'] == 'edit_team') {
			$method = 'crudTeam';
		}elseif ($_GET['view'] == 'store_team') {
			$method = 'storeTeam';
			// call_user_func desde aqui para poder hacer el header location en el controlador
			include_once($include);
			$controller = new $controller;
			call_user_func( array( $controller, $method ) );
		}elseif ($_GET['view'] == 'delete_team') {
			$method = 'deleteTeam';
		}elseif ($_GET['view'] == 'update_team') {
			$method = 'updateTeam';
		}elseif ($_GET['view'] == 'all_teams') {
			$title = 'Admin - Todos los equipos';
			$method = 'allTeams';
		}

	// Rutas para jugador
	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_player' || $_GET['view'] == 'edit_player' || $_GET['view'] == 'store_player' || $_GET['view'] == 'delete_player' || $_GET['view'] == 'update_player' || $_GET['view'] == 'all_players-goals' || $_GET['view'] == 'all_players-asists'))
	{
		$title = $_GET['view'] == 'add_player' ? 'Admin - Añadir Jugador' : 'Admin - Editar Jugador';
		$include = '../Controllers/PlayerController.php';
		$controller = 'PlayerController';

		if ($_GET['view'] == 'add_player' || $_GET['view'] == 'edit_player') {
			$method = 'crudPlayer';
		}elseif ($_GET['view'] == 'store_player') {
			$method = 'storePlayer';
			// call_user_func desde aqui para poder hacer el header location en el controlador
			include_once($include);
			$controller = new $controller;
			call_user_func( array( $controller, $method ) );
		}elseif ($_GET['view'] == 'delete_player') {
			$method = 'deletePlayer';
		}elseif ($_GET['view'] == 'update_player') {
			$method = 'updatePlayer';
		}elseif ($_GET['view'] == 'all_players-goals') {
			$title = 'Admin - Top jugadores';
			$method = 'TopGoalsPlayers';
		}elseif ($_GET['view'] == 'all_players-asists') {
			$title = 'Admin - Top jugadores';
			$method = 'TopAsistsPlayers';
		}

	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_result' || $_GET['view'] == 'edit_result'))
	{
		$title = $_GET['view'] == 'add_result' ? 'Admin - Añadir Resultados' : 'Admin - Editar Resultado';
		$include = 'components/crud_result.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'add_match')
	{
		$title = 'Admin - Añadir Partido';
		$include = 'components/add_match.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'positions_teams')
	{
		$title = 'Admin - Clasificación';
		$include = 'components/positions_teams.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'all_results')
	{
		$title = 'Admin - Todos los resultados';
		$include = 'components/all_results.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'charts')
	{
		$title = 'Admin - Estadisticas';
		$include = 'components/charts.php';

	}else{
		$title = 'Admin - No encontrada';
		$include = '404.php';
		//echo "<h1>Blank Page</h1> <hr> <p>This is a great starting point for new custom pages.</p>";
	}
include_once('main_layout/main_ini.php');

include_once($include);
$controller = new $controller;
call_user_func( array( $controller, $method ) );

include_once('main_layout/main_end.php'); ?>