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
        
        $users = array();
        
        while ($user = $result->fetch_assoc()) {
            $users[] = $user;
        }
        
        return $users;
    }

    // Obtener usuario por id
    public function getUserById($id)
    {        
        $result = $this->conn->query("SELECT * FROM qn_user INNER JOIN qn_rol ON qn_user.rol_id=qn_rol.id WHERE qn_user.id=$id") or die($this->conn->error);
        
        $user = $result->fetch_assoc();
        
        return $user;
    }

    // Almacenar un usuario en bd
    public function storeUser($name, $lastName, $dni, $phone, $email, $pass, $created, $rol_id)
    {        
        $this->conn->query("INSERT INTO qn_user (name, lastName, dni, phone, email, pass, created, rol_id) VALUES ('$name', '$lastName', '$dni', '$phone', '$email', '$pass', '$created', $rol_id)") or die($this->conn->error);

        return $this->conn->insert_id;        
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
}


 ?>