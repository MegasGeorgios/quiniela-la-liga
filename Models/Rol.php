<?php 

require_once('ConnectDB.php');

/**
 * Modelo Rol
 */
class Rol extends ConnectDB
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // Obtener todos los roles
    public function getRoles()
    {        
        $result = $this->conn->query("SELECT * FROM qn_rol") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Almacenar un rol en bd
    public function storeRol($rol)
    {        
        $result = $this->conn->query("INSERT INTO qn_rol (rol) VALUES ('$rol')") or die($this->conn->error);       
    }
}


 ?>