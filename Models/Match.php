<?php 

require_once('ConnectDB.php');

/**
 * Modelo partido
 */
class Match extends ConnectDB
{
    
    public function __construct()
    {
        parent::__construct();
    }

    // Obtener todos los partidos y resultados
    public function getMatchesWithResults()
    {        
        $result = $this->conn->query("SELECT qn_match.id as match_id, qn_match.id_team_home, qn_match.id_team_visit, qn_match.name_team_home, qn_match.name_team_visit, qn_match.fixture, qn_match.match_date, qn_result.id as result_id, qn_result.score_home, qn_result.score_visit FROM qn_match LEFT JOIN qn_result ON qn_match.id=qn_result.match_id ORDER BY fixture ASC") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener partido de un equipo en una determinada jornada
    public function getMatchTeamByFixture($team_id, $fixture)
    {
        $result = $this->conn->query("SELECT qn_match.id as match_id, qn_match.id_team_home, qn_match.id_team_visit, qn_match.name_team_home, qn_match.name_team_visit, qn_match.fixture, qn_match.match_date, qn_result.id as result_id, qn_result.score_home, qn_result.score_visit FROM qn_match LEFT JOIN qn_result ON qn_match.id=qn_result.match_id WHERE qn_match.fixture=$fixture AND (qn_match.id_team_home=$team_id OR qn_match.id_team_visit=$team_id) ORDER BY fixture ASC") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener partidos por jornada
    public function getMatchesByFixture($fixture)
    {        
        $result = $this->conn->query("SELECT qn_match.id as match_id, qn_match.id_team_home, qn_match.id_team_visit, qn_match.name_team_home, qn_match.name_team_visit, qn_match.fixture, qn_match.match_date, qn_result.id as result_id, qn_result.score_home, qn_result.score_visit FROM qn_match LEFT JOIN qn_result ON qn_match.id=qn_result.match_id WHERE qn_match.fixture=$fixture ORDER BY fixture ASC") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener partidos por equipo
    public function getMatchesByTeam($team_id)
    {        
        $result = $this->conn->query("SELECT qn_match.id as match_id, qn_match.id_team_home, qn_match.id_team_visit, qn_match.name_team_home, qn_match.name_team_visit, qn_match.fixture, qn_match.match_date, qn_result.id as result_id, qn_result.score_home, qn_result.score_visit FROM qn_match LEFT JOIN qn_result ON qn_match.id=qn_result.match_id WHERE qn_match.id_team_home=$team_id OR qn_match.id_team_visit=$team_id ORDER BY fixture ASC") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Almacenar un partido en bd
    public function storeMatch($id_team_home, $id_team_visit, $name_team_home, $name_team_visit, $fixture, $match_date)
    {        
        $this->conn->query("INSERT INTO qn_match (id_team_home, id_team_visit, name_team_home, name_team_visit, fixture, match_date) VALUES ($id_team_home, $id_team_visit, '$name_team_home', '$name_team_visit', $fixture, '$match_date')");
       
        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Partidos añadidos!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }    
    }

    // Almacenar un resultado en bd
    public function storeResult($score_home, $score_visit, $match_id)
    {        
        $this->conn->query("INSERT INTO qn_result (score_home, score_visit, match_id) VALUES ($score_home, $score_visit, $match_id)");
       
        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Resultados añadidos!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }    
    }

    public function getResultById($id)
    {
        $result = $this->conn->query("SELECT  qn_match.name_team_home, qn_match.name_team_visit, qn_result.id as result_id, qn_result.score_home, qn_result.score_visit FROM qn_match LEFT JOIN qn_result ON qn_match.id=qn_result.match_id WHERE qn_result.id=$id") or die($this->conn->error);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }
}


 ?>