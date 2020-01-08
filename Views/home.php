<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Quiniela la liga</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <style type="text/css">
  	body {
	 background-image: url("estadio-futbol.jpg");
	 background-repeat: no-repeat;
	 background-size:100% 100%;
	}

	.top-front{
		padding-top: 15px;
	}

	.left-nav{
		padding-left: 10px;
	}
  </style>
</head>

<body class="bg-dark">

<?php include('main_layout/layout/nav-bar-front.php'); ?>

  <div class="container top-front">
   	
   	<?php 

   		if (isset($_GET['view']) && $_GET['view'] == 'edit_user') 
		{
			
			$include = '../Controllers/UserController.php';
			$controller = 'UserController';
			$method = 'crudUser';
			
		}elseif (isset($_GET['view']) && $_GET['view'] == 'all_players-goals') 
		{
			$include = '../Controllers/PlayerController.php';
			$controller = 'PlayerController';
			$method = 'TopGoalsPlayers';
			
		}elseif (isset($_GET['view']) && $_GET['view'] == 'all_players-asists') 
		{
			$include = '../Controllers/PlayerController.php';
			$controller = 'PlayerController';
			$method = 'TopAsistsPlayers';

		}elseif (isset($_GET['view']) && $_GET['view'] == 'all_results') {
			$include = '../Controllers/GameController.php';
			$controller = 'GameController';
			$method = 'showMatchesAndResults';
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
