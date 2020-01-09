<?php

// Ruta escritorio (dashboard)
if (isset($_GET['view']) && $_GET['view'] == 'dashboard')
{
	$title= 'Admin - Dashboard';
	$include = '../Controllers/AuthController.php';
	$controller = 'AuthController';
	$method = 'index';

// Rutas para usuarios
}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_user' || $_GET['view'] == 'edit_user' || $_GET['view'] == 'store_user' || $_GET['view'] == 'delete_user' || $_GET['view'] == 'update_user' || $_GET['view'] == 'all_users' /*|| $_GET['view'] == 'positions_users'*/))
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
	}/*elseif ($_GET['view'] == 'positions_users') {
		$title = 'Admin - Posiciones';
		$method = 'positionsUsers';
	}*/

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
}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_team' || $_GET['view'] == 'edit_team' || $_GET['view'] == 'store_team' || $_GET['view'] == 'delete_team' || $_GET['view'] == 'update_team' || $_GET['view'] == 'all_teams' || $_GET['view'] == 'positions_teams'))
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
	}elseif ($_GET['view'] == 'positions_teams') {
		$title = 'Admin - Clasificación';
		$method = 'positionsTeams';
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

// Rutas login, registro y recuperacion de contraseña. 
}elseif (isset($_GET['view']) && ($_GET['view'] == 'login_user' || $_GET['view'] == 'registre_user' || $_GET['view'] == 'logout'))
{
	$title = '';
	$include = '../Controllers/AuthController.php';
	$controller = 'AuthController';

	if ($_GET['view'] == 'login_user') {
		$method = 'loginUser';
		// call_user_func desde aqui para poder hacer el header location en el controlador
		include_once($include);
		$controller = new $controller;
		call_user_func( array( $controller, $method ) );
	}elseif ($_GET['view'] == 'registre_user') {
		$method = 'registreUser';
		include_once($include);
		$controller = new $controller;
		call_user_func( array( $controller, $method ) );
	}elseif ($_GET['view'] == 'logout') {
		$method = 'logout';
		// call_user_func desde aqui para poder hacer el header location en el controlador
		include_once($include);
		$controller = new $controller;
		call_user_func( array( $controller, $method ) );
	}

// Rutas resultados y partidos
}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_result' || $_GET['view'] == 'store_result' || $_GET['view'] == 'edit_result' || $_GET['view'] == 'update_result' || $_GET['view'] == 'delete_result' || $_GET['view'] == 'add_match' || $_GET['view'] == 'store_match' ||  $_GET['view'] == 'all_results'))
{
	$title = $_GET['view'] == 'add_result' ? 'Admin - Añadir Resultados' : 'Admin - Editar Resultado';
	$include = '../Controllers/GameController.php';
	$controller = 'GameController';

	if ($_GET['view'] == 'add_result' || $_GET['view'] == 'edit_result') {
		$method = 'crudResult';
	}elseif ($_GET['view'] == 'store_result') {
		$method = 'storeResult';
	}elseif ($_GET['view'] == 'delete_result') {
		$method = 'deleteResult';
	}elseif ($_GET['view'] == 'update_result') {
		$method = 'updateResult';
	}elseif ($_GET['view'] == 'add_match') {
		$method = 'crudMatch';
	}elseif ($_GET['view'] == 'store_match') {
		$method = 'storeMatch';
	}elseif ($_GET['view'] == 'all_results') {
		$method = 'showMatchesAndResults';
	}

}else{
	$title = 'Admin - No encontrada';
	$include = '404.php';
}

include_once('main_layout/main_ini.php');

include_once($include);

if ($include != '404.php') 
{
	$controller = new $controller;
	call_user_func( array( $controller, $method ) );
}

include_once('main_layout/main_end.php'); ?>