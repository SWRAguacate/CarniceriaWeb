<?php

$usuario = null;

if(isset($_SESSION["usuario_logueado"])) {
    $usuario = $_SESSION["usuario_logueado"];
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Login/login.php");