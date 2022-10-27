<?php
require_once ("./../Model/cart.model.php");

$_cart = new cart_model();

if(isset($_POST["petition"])) {
    $id_carrito = $_POST["id_carrito"];
    $id_usuario = $_POST["id_usuario"];

    $productos = $_cart->getCartItems($id_carrito);
        
    if (Count($productos) > 0) {
        $_cart->checkOutCart($id_carrito, $id_usuario, $productos);
        echo (1);
    } else {
        echo (0);
    }
}