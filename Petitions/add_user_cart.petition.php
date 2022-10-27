<?php
require_once ("./../Model/cart.model.php");

$_cart = new cart_model();

if(isset($_POST["petition"])) {
    $id_usuario = $_POST["id_usuario"];

    $_cart->addUserCart($id_usuario)
    echo (1);
}