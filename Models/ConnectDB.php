<?php 

/**
 * Conectar con la base de datos
 */
class ConnectDB
{
	public $conn;

	public function __construct()
	{
		require_once('../config.php');
		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die($this->conn->error); 
	}
}

?>