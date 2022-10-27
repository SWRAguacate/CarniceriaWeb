<?php

$usuario = null;
session_start();
if(isset($_SESSION["usuario_logueado"])) {
    $usuario = $_SESSION["usuario_logueado"];
    $id_usuario; $username; $nombre; $email; $contra; $telefono;
    foreach ($usuario as $renglon) { foreach ($renglon as $columna => $valor) { 
        if ($columna == "id_usuario" && $valor != null) {  $id_usuario = $valor; }
        if ($columna == "usuario" && $valor != null) {  $username = $valor; }
        if ($columna == "nombre" && $valor != null) {  $nombre = $valor; }
        if ($columna == "email" && $valor != null) {  $email = $valor; }
        if ($columna == "contra" && $valor != null) {  $contra = $valor; }
        if ($columna == "telefono" && $valor != null) {  $telefono = $valor; }
        } }
} else {
    header('Location: index.php');
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Cart/cart.php");