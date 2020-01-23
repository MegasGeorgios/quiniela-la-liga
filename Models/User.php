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

    // validar si el dni o email existe ya en bd
    public function validateDniAndEmail($dni, $email)
    {
        $register = true;

        $result = $this->conn->query("SELECT * FROM qn_user WHERE email='$email' OR dni='$dni'") or die($this->conn->error);
        
        if ($result->num_rows == 1) 
        {
            $register = false;
        }

        return $register;
    }

    // Validar credenciales para loguearse
    public function loginUser($email, $pass)
    {
        $result = $this->conn->query("SELECT qn_user.id as user_id, qn_user.name, qn_rol.rol FROM qn_user INNER JOIN qn_rol ON qn_user.rol_id=qn_rol.id WHERE email='$email' AND pass='$pass'") or die($this->conn->error);
        
        if ($result->num_rows == 1) 
        {
            $userData = $result->fetch_assoc();
            $user['logged'] = true;
            $user['userData'] = $userData;

            return $user;
        }
        
        $user['logged'] = false;

        return $user;
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

    // Obtener usuario por id
    public function getUserById($id)
    {        
        $result = $this->conn->query("SELECT * FROM qn_user INNER JOIN qn_rol ON qn_user.rol_id=qn_rol.id WHERE qn_user.id=$id") or die($this->conn->error);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }

    // Obtener usuario por email
    public function getUserByEmail($email)
    {        
        $result = $this->conn->query("SELECT * FROM qn_user INNER JOIN qn_rol ON qn_user.rol_id=qn_rol.id WHERE qn_user.email='$email'") or die($this->conn->error);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }

    // Almacenar un usuario en bd e inicializar puntuacion a 0
    public function storeUser($name, $lastName, $dni, $phone, $email, $pass, $created, $rol_id)
    {        
        $this->conn->query("INSERT INTO qn_user (name, lastName, dni, phone, email, pass, created, rol_id) VALUES ('$name', '$lastName', '$dni', '$phone', '$email', '$pass', '$created', $rol_id)");

        $result = $this->conn->query("SELECT * FROM qn_user WHERE email='$email'") or die($this->conn->error);
        
        $user = $result->fetch_assoc();
        
        return $user['id'];        
    }

    // Borrar usuario por id
    public function deleteUser($id)
    {        
        $this->conn->query("DELETE FROM qn_user WHERE id=$id");

        if (!$this->conn->error) 
        {
            return ["error" => false, "msg" => "Usuario eliminado!"];   
        }else{
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
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
            return ["error" => true, "msg" => "Ha ocurrido un error!"];
        }
    }

    // guardar token para resetear contraseña
    public function saveToken($token, $email)
    {
        
        $this->conn->query("UPDATE qn_user SET token='$token' WHERE email='$email'"); 
    }

    // Validar que existe un usuario con un token especifico 
    public function validateToken($token)
    {
        $result = $this->conn->query("SELECT * FROM qn_user WHERE token='$token'");
        
        if ($result->num_rows == 1) 
        {
            return true;
        }

        return false;
    }

    // almacenar la nueva contraseña
    public function saveNewPass($token, $pass)
    {   
        $resp = $this->validateToken($token);

        // si existe el usuario con el token en bd
        if ($resp) 
        {
            $this->conn->query("UPDATE qn_user SET pass='$pass' WHERE token='$token'");

            if (!$this->conn->error) 
            {
                return ["error" => false, "msg" => "Contraseña actualizada!"];   
            }else{
                return ["error" => true, "msg" => "Ha ocurrido un error!"];
            }

        }else{
            return ["error" => true, "msg" => "No se ha podido restablecer la contraseña!"];
        }
    }
}


 ?>