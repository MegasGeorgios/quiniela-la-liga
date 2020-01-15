<?php 

require_once('ConnectDB.php');

/**
 * Modelo Quiniela
 */
class Pool extends ConnectDB
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // Obtener las quinielas de un usuario
    public function getPoolsByUser($user_id)
    {        
        $result = $this->conn->query("SELECT * FROM qn_football_pool WHERE user_id=$user_id") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener los resultados/pronosticos de una quiniela de un usuario
    public function getPoolResults($pool_id)
    {        
        $result = $this->conn->query("SELECT * FROM qn_football_pool_result INNER JOIN qn_match ON  qn_match.id=qn_football_pool_result.match_id LEFT JOIN qn_result ON qn_match.id=qn_result.match_id WHERE pool_id=$pool_id") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    public function createPool($user_id, $created)
    {        
        $this->conn->query("INSERT INTO qn_football_pool (user_id, created) VALUES ($user_id, '$created')") or die($this->conn->error);

        $pool_id = $this->conn->insert_id;

        return $pool_id;      
    }

    // Almacenar los pronosticos de una quiniela en bd
    public function storePool($pool_id, $pognostic, $match_id)
    {        
        $this->conn->query("INSERT INTO qn_football_pool_result (prognostic, pool_id, match_id) VALUES ('$pognostic', $pool_id, $match_id)");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Suerte!!!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }       
    }
}


 ?>