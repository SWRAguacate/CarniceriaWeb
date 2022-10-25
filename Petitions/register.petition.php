<?php
require_once ("./../Model/user.model.php");

$_usuario = new usuario_model();

if(isset($_POST["petition"])) {
    $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contra = $_POST["contra"];
    $telefono = $_POST["telefono"];
        
    $_usuario = new usuario_model();
    $user = $_usuario->validateUser($usuario, $email);
        
    if (Count($user) == 0) {
        $_usuario->signUp($usuario, $nombre, $email, $contra, $telefono);
        $user = $_usuario->signIn($usuario, $email, $contra);
        session_start();
        $_SESSION['usuario_logueado'] = $user;
        echo (1);
    } else {
        echo (0);
    }
}