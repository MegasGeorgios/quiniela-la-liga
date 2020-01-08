<?php 

require_once('ConnectDB.php');

/**
 * Modelo Rol
 */
class Award extends ConnectDB
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // Obtener todos los premios
    public function getAwards()
    {        
        $result = $this->conn->query("SELECT * FROM qn_award") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Almacenar un rol en bd
    public function storeAward($award, $position)
    {        
        $this->conn->query("INSERT INTO qn_award (award, position) VALUES ($award, $position)");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Premio añadido!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }       
    }

    // Borrar usuario por id
    public function deleteAward($id)
    {        
        $this->conn->query("DELETE FROM qn_award WHERE id=$id");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Premio eliminado!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }
    }

    // Actualizar rol 
    public function updateAward($award, $position, $id)
    {   
        $this->conn->query("UPDATE qn_award SET award=$award, position=$position WHERE id=$id");
                
        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Premio actualizado!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }
    }
}


 ?>