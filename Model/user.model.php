<?php

class usuario_model {

    private $db;
    private $usuarios_model;

    public function __construct() {
        require_once 'connection.model.php';
        $this->db = conectar::conexion();
        $this->usuarios_model = array();
    }

    public function signUp($usuario, $nombre, $email, $contra, $telefono) {
        $sql = "insert into usuario (usuario, nombre, email, contra, telefono) values (:usuario, :nombre, :email, :contra, :telefono)";
        $result = $this->db->prepare($sql);
        $result->execute(array(":usuario" => $usuario, ":nombre" => $nombre, ":email" => $email, ":contra" => $contra, ":telefono" => $telefono));
    }

    public function signIn($usuario, $email, $contra) {
        $this->usuarios_model = array();
        $sql = "select * from usuario where (usuario = :usuario or email = :email) and contra = :contra";
        $result = $this->db->prepare($sql);
        $result->execute(array(":usuario" => $usuario, ":email" => $email, ":contra" => $contra));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->usuarios_model[] = $filas;
        }
        return $this->usuarios_model;
    }

    public function update($id, $usuario, $nombre, $email, $contra, $telefono) {
        $sql = "update usuario set "
        . "usuario = IFNULL (:usuario, usuario),"
        . "nombre = IFNULL (:nombre, nombre)," 
        . "email = IFNULL (:email, email)," 
        . "contra = IFNULL (:contra, contra)," 
        . "telefono = IFNULL (:telefono, telefono),"
        . "where id_usuario = :id_usuario";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_usuario" => $id, ":id_usuario" => $id, ":usuario" => $usuario, ":nombre" => $nombre, ":email" => $email, ":contra" => $contra, ":telefono" => $telefono));
    }
    
    public function validateUser($usuario, $email) {
        $this->usuarios_model = array();
        $sql = "select * from usuario where usuario = :usuario or email = :email";
        $result = $this->db->prepare($sql);
        $result->execute(array(":usuario" => $usuario, ":email" => $email));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->usuarios_model[] = $filas;
        }
        return $this->usuarios_model;
    }

}
