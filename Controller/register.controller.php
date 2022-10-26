<?php

session_start();
if(isset($_SESSION["usuario_logueado"])) {
    header('Location: index.php');
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Login/register.php");