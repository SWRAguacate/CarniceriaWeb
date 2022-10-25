<?php
require_once ("./../Model/user.model.php");

$_usuario = new usuario_model();

if(isset($_POST["petition"])) {
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];

    $user = $_usuario->signIn($usuario, $contra);

    if (Count($user) != 0) {
        session_start();
        $_SESSION["usuario_logueado"] = $user;
        echo (1);
    } else {
        echo (0);
    }
}