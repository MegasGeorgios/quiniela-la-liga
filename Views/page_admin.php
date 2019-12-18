<?php

	if (isset($_GET['view']) && ($_GET['view'] == 'add_user' || $_GET['view'] == 'edit_user' || $_GET['view'] == 'store_user' || $_GET['view'] == 'delete_user'))
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
		}
	    
	}elseif (isset($_GET['view']) && ($_GET['view'] == 'roles' || $_GET['view'] == 'store_rol' || $_GET['view'] == 'delete_rol'))
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
		}
		

	}elseif (isset($_GET['view']) && $_GET['view'] == 'awards')
	{
		$title= 'Admin - Premios';
		$include = 'components/crud_awards.php';

	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_result' || $_GET['view'] == 'edit_result'))
	{
		$title = $_GET['view'] == 'add_result' ? 'Admin - Añadir Resultados' : 'Admin - Editar Resultado';
		$include = 'components/crud_result.php';

	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_team' || $_GET['view'] == 'edit_team'))
	{
		$title = $_GET['view'] == 'add_team' ? 'Admin - Añadir Equipo' : 'Admin - Editar Equipo';
		$include = 'components/crud_team.php';

	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_player' || $_GET['view'] == 'edit_player'))
	{
		$title = $_GET['view'] == 'add_player' ? 'Admin - Añadir Jugador' : 'Admin - Editar Jugador';
		$include = 'components/crud_player.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'add_match')
	{
		$title = 'Admin - Añadir Partido';
		$include = 'components/add_match.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'positions_users')
	{
		$title = 'Admin - Posiciones';
		$include = 'components/positions_users.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'positions_teams')
	{
		$title = 'Admin - Clasificación';
		$include = 'components/positions_teams.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'all_users')
	{
		$title = 'Admin - Todos los usuarios';
		$include = '../Controllers/UserController.php';
		$controller = 'UserController';
		$method = 'allUsers';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'all_teams')
	{
		$title = 'Admin - Todos los equipos';
		$include = 'components/all_teams.php';

	}elseif (isset($_GET['view']) && $_GET['view'] == 'all_results')
	{
		$title = 'Admin - Todos los resultados';
		$include = 'components/all_results.php';

	}elseif (isset($_GET['view']) && ($_GET['view'] == 'all_players-goals' || $_GET['view'] == 'all_players-asists'))
	{
		$title = 'Admin - Top Jugadores';
		$include = 'components/positions_players.php';

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