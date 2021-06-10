<?php
require_once 'db.php';


class User extends DB {

    private $id;
    private $nombre; //usuario
    private $username; //nombre del campo de la tabla usuario

    public function userExists($user, $pass) {
        //desencriptar password con función md5
        $md5pass = md5($pass);

        $query = $this->connect()->prepare('Select * from usuario where nombre = :user and password = :pass ');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function setUser($user) {
        $query = $this->connect()->prepare('Select * from usuario where nombre = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->id = $currentUser['id'];
            $this->nombre = $currentUser['nombre']; //usuario valor que esta en la tabla
            $this->username = $currentUser['nombre']; //nombre del campo de la tabla q contiene usuario
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getId() {
        return $this->id;
    }

    public function insertUser($user, $apellido, $email, $pass, $rol) {
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('Insert into usuario (nombre, apellido, email, password, id_rol) VALUES (:user, :apellido, :email, :pass, :rol)');        

        if ($query->execute(['user' => $user, 'apellido' => $apellido, 'email' => $email, 'pass' => $md5pass, 'rol' => $rol])) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrarUser() {
        $query = $this->connect()->prepare('Select usuario.id, usuario.nombre, usuario.apellido, '
                . 'usuario.email, rol.nombre as rol from usuario inner join rol on usuario.id_rol =  rol.id');
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);        
        return $resultado;
    }

    public function mostrarRol() {
        $query = $this->connect()->prepare('Select id, nombre from rol order by id');
        $query->execute();
        //ver variable resultado
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $filas = count($resultado);
        // var_dump($filas);
        return $resultado;
    }

    public function eliminarUser($user) {
        $query = $this->connect()->prepare('Delete from usuario where id= :user');
        if ($query->execute(['user' => $user])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function editarUser($user) {       
        $query = $this->connect()->prepare('Select * from usuario where id= :user');
        $query->execute(['user' => $user]);
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
    
    public function actualizarUser($user, $apellido, $email, $rol, $id) {
        
            $query = $this->connect()->prepare('Update usuario set nombre = :user, apellido = :apellido, email = :email, id_rol = :rol Where id = :id');        

        if ($query->execute(['user' => $user, 'apellido' => $apellido, 'email' => $email, 'rol' => $rol, 'id' => $id])) {
            return true;
        } else {
            return false;
        }
    }

}
