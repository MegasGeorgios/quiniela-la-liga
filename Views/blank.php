<?php $title= "SB Admin - Blank";?>
<?php include_once('main_layout/main_ini.php'); 

	if (isset($_GET['view']) && $_GET['view'] == 'add_user')
	{
		include_once('components/add_user.php');

	}elseif (isset($_GET['view']) && $_GET['view'] == 'add_result')
	{
		include_once('components/add_result.php');
	}elseif (isset($_GET['view']) && $_GET['view'] == 'add_team')
	{
		include_once('components/add_team.php');
	}else{
		echo "<h1>Blank Page</h1> <hr> <p>This is a great starting point for new custom pages.</p>";
	}

include_once('main_layout/main_end.php'); ?>