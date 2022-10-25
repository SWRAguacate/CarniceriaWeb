<?php

require_once ("./../Model/user.model.php");

$usuario = $_POST["usuario"];
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$contra = $_POST["contra"];
$telefono = $_POST["telefono"];
    
$_usuario = new usuario_model();
$user = $_usuario->validateUser($usuario, $email);
    
if (Count($user) != 0) {
    $_usuario->signUp($usuario, $nombre, $email, $contra, $telefono);
    $user = $_usuario->signIn($usuario, $contra);
    session_start();
    $_SESSION["usuario_logueado"] = $user;
    header('Location: ../index.php');
    die();
} else {
    echo "<script> alert('Correo o usuario ya en uso, favor de volver a intentar'); window.location.href='../sesion.php'; </script>";
    die();
}