<?php 

require_once('ConnectDB.php');

/**
 * Modelo Equipo
 */
class Team extends ConnectDB
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // Obtener todos los equipos
    public function getTeams()
    {        
        $result = $this->conn->query("SELECT * FROM qn_team ORDER BY name ASC") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener equipo por id
    public function getTeamById($id)
    {        
        $result = $this->conn->query("SELECT * FROM qn_team WHERE id=$id") or die($this->conn->error);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }

    // Almacenar un equipo en bd
    public function storeTeam($name, $slug)
    {        
        $this->conn->query("INSERT INTO qn_team (name, slug) VALUES ('$name', '$slug')");

        return $this->conn->insert_id;        
    }

    // Borrar equipo por id
    public function deleteTeam($id)
    {        
        $this->conn->query("DELETE FROM qn_team WHERE id=$id");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Equipo eliminado!"];   
        }else{
            return ["error" => true, "msg" => $this->conn->error];
        }
    }

    // Actualizar equipo 
    public function updateTeam($name, $slug, $id)
    {   
        $this->conn->query("UPDATE qn_team SET name='$name', slug='$slug' WHERE id=$id");
        
        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Equipo actualizado!"];   
        }else{
            return ["error" => true, "msg" => $this->conn->error];
        }
    }
}


 ?>