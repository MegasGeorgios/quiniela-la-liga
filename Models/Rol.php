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
        $this->conn->query("INSERT INTO qn_rol (rol) VALUES ('$rol')");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Rol añadido!"];   
        }else{
            return ["error" => true, "msg" => $this->conn->error];
        }       
    }

    // Borrar usuario por id
    public function deleteRol($id)
    {        
        $this->conn->query("DELETE FROM qn_rol WHERE id=$id");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Rol eliminado!"];   
        }else{
            return ["error" => true, "msg" => $this->conn->error];
        }
    }
}


 ?>