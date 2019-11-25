<?php $title= "SB Admin - Blank";?>
<?php include_once('main_layout/main_ini.php'); 

	if (isset($_GET['view']) && ($_GET['view'] == 'add_user' || $_GET['view'] == 'edit_user'))
	{
		include_once('components/crud_user.php');

	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_result' || $_GET['view'] == 'edit_result'))
	{
		include_once('components/crud_result.php');

	}elseif (isset($_GET['view']) && ($_GET['view'] == 'add_team' || $_GET['view'] == 'edit_team'))
	{
		include_once('components/crud_team.php');

	}elseif (isset($_GET['view']) && $_GET['view'] == 'add_match')
	{
		include_once('components/add_match.php');

	}elseif (isset($_GET['view']) && $_GET['view'] == 'positions_users')
	{
		include_once('components/positions_users.php');

	}elseif (isset($_GET['view']) && $_GET['view'] == 'all_users')
	{
		include_once('components/all_users.php');

	}elseif (isset($_GET['view']) && $_GET['view'] == 'all_teams')
	{
		include_once('components/all_teams.php');

	}elseif (isset($_GET['view']) && $_GET['view'] == 'all_results')
	{
		include_once('components/all_results.php');

	}else{
		include_once('404.php');
		//echo "<h1>Blank Page</h1> <hr> <p>This is a great starting point for new custom pages.</p>";
	}

include_once('main_layout/main_end.php'); ?>