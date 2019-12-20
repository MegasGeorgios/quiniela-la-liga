<?php 

require_once('ConnectDB.php');

/**
 * Modelo User
 */
class User extends ConnectDB
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // Obtener todos los usuarios
    public function getUsers()
    {        
        $result = $this->conn->query("SELECT * FROM qn_user") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obterner usuarios por puntuacion
    public function getPositionsUsers()
    {        
        $result = $this->conn->query("SELECT * FROM qn_user INNER JOIN qn_scorer ON qn_scorer.user_id=qn_user.id ORDER BY points DESC") or die($this->conn->error);
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    // Obtener usuario por id
    public function getUserById($id)
    {        
        $result = $this->conn->query("SELECT * FROM qn_user INNER JOIN qn_rol ON qn_user.rol_id=qn_rol.id WHERE qn_user.id=$id") or die($this->conn->error);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }

    // Almacenar un usuario en bd e inicializar puntuacion a 0
    public function storeUser($name, $lastName, $dni, $phone, $email, $pass, $created, $rol_id)
    {        
        $this->conn->query("INSERT INTO qn_user (name, lastName, dni, phone, email, pass, created, rol_id) VALUES ('$name', '$lastName', '$dni', '$phone', '$email', '$pass', '$created', $rol_id)");

        $userID = $this->conn->insert_id;
        
         $this->conn->query("INSERT INTO qn_scorer (points, user_id) VALUES (0, $userID)");

        return $userID;        
    }

    // Borrar usuario por id
    public function deleteUser($id)
    {        
        $this->conn->query("DELETE FROM qn_user WHERE id=$id");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Usuario eliminado!"];   
        }else{
            return ["error" => true, "msg" => $this->conn->error];
        }
    }

    // Actualizar usuario 
    public function updateUser($name, $lastName, $dni, $phone, $email, $pass, $rol_id, $id)
    {   

        if ($pass == 'noUpdate') 
        {
            $this->conn->query("UPDATE qn_user SET name='$name', lastName='$lastName', dni='$dni', phone='$phone', email='$email', rol_id=$rol_id WHERE id=$id");
        }else
        {
            $this->conn->query("UPDATE qn_user SET name='$name', lastName='$lastName', dni='$dni', phone='$phone', email='$email', pass='$pass', rol_id=$rol_id WHERE id=$id");
        }    
        
        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Usuario actualizado!"];   
        }else{
            return ["error" => true, "msg" => $this->conn->error];
        }
    }
}


 ?>