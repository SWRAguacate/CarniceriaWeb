<?php
require_once ("./../Model/user.model.php");

$_usuario = new usuario_model();

if(isset($_POST["petition"])) {
    $id_usuario = $_POST["id_usuario"];
    $usuarioOriginal = $_POST["usuarioOriginal"];
    $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $emailOriginal = $_POST["emailOriginal"];
    $email = $_POST["email"];
    $contra = $_POST["contra"];
    $telefono = $_POST["telefono"];
        
    if($usuarioOriginal != $usuario){
        $usrParam = $usuario;
    } else {
        $usrParam = null;
    }

    if($emailOriginal != $email){
        $emailParam = $email;
    } else {
        $emailParam = null;
    }
    $user = $_usuario->validateUser($usrParam, $emailParam);
        
    if (Count($user) == 0) {
        $_usuario->update($id_usuario, $usuario, $nombre, $email, $contra, $telefono);
        echo (1);
    } else {
        echo (0);
    }
}