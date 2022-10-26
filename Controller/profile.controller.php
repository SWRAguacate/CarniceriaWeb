<?php

$usuario = null;
session_start();
if(isset($_SESSION["usuario_logueado"])) {
    $usuario = $_SESSION["usuario_logueado"];
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Profile/form_update.php");
require_once ("View/Profile/history.php");