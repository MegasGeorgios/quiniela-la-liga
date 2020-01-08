<?php 

require_once('ConnectDB.php');

/**
 * Modelo Jugador
 */
class Player extends ConnectDB
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // Obtener top goleadores de la liga
    public function getTopGoalsPlayers()
    {        
        $result = $this->conn->query("SELECT qn_player.id, qn_player.name, qn_player.dorsal, qn_player.goals, qn_player.asists, qn_player.team_id, qn_team.name as name_team FROM qn_player INNER JOIN qn_team ON qn_player.team_id=qn_team.id ORDER BY goals DESC LIMIT 10") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener top asistidores de la liga
    public function getTopAsistsPlayers()
    {        
        $result = $this->conn->query("SELECT qn_player.id, qn_player.name, qn_player.dorsal, qn_player.goals, qn_player.asists, qn_player.team_id, qn_team.name as name_team FROM qn_player INNER JOIN qn_team ON qn_player.team_id=qn_team.id ORDER BY asists DESC LIMIT 10") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener jugador por id
    public function getPlayerById($id)
    {        
        $result = $this->conn->query("SELECT qn_player.id, qn_player.name, qn_player.dorsal, qn_player.goals, qn_player.asists, qn_player.team_id, qn_team.name as name_team FROM qn_player INNER JOIN qn_team ON qn_player.team_id=qn_team.id WHERE qn_player.id=$id") or die($this->conn->error);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }

    // Almacenar un jugador en bd
    public function storePlayer($name, $dorsal, $goals, $asists, $team_id)
    {        
        $this->conn->query("INSERT INTO qn_player (name, dorsal, goals, asists, team_id) VALUES ('$name', $dorsal, $goals, $asists, $team_id)");

        return $this->conn->insert_id;        
    }

    // Borrar jugador por id
    public function deletePlayer($id)
    {        
        $this->conn->query("DELETE FROM qn_player WHERE id=$id");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Jugador eliminado!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }
    }

    // Actualizar jugador 
    public function updatePlayer($name, $dorsal, $goals, $asists, $team_id, $id)
    {   
        $this->conn->query("UPDATE qn_player SET name='$name', dorsal=$dorsal, goals=$goals, asists=$asists, team_id=$team_id WHERE id=$id");
        
        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Jugador actualizado!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }
    }
}


 ?>